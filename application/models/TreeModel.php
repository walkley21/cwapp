<?php
abstract class TreeModel extends ParentModel{
    
    public $except_id; 
    
    
    /*children have to configure this */
    
    public $level;
   
   // public $base_table = 'contents';
    
    
    //public $child_field ="content_id";
    //public $external_parent_field ="course_id"; /*in tassks_tasks external parent is project */
    
    //public $parent_field = "related_content_id";
    //public $link_table="contents_contents";
    //public $model_name = "Content";
    //public $parent_table = "contents_courses"; /*for example parent : project child tasks*/
    //public $parent_name = 'courses';
    
    
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    
    function getTree($excep_id = null,$parent=null,$parent_id=null)
    {
        
        //p($this->parent_name);
        
        
        
        $except ='';
        if (!empty($excep_id))
        $except = " AND {$this->base_table}.id !=  '{$excep_id}' ";
        
        $left_join='';
        $and_parent='';
        
        /*select only the ones whose parent is a*/
        
        if (!empty($parent))
        {
            //echo "[$parent]";
            
            $left_join="
            LEFT JOIN {$this->parent_table} ON

            {$this->base_table}.id = {$this->parent_table}.{$this->child_field} ";
            /*separated---------------------------------------------------------------------*/
            $and_parent = " AND {$this->parent_table}.{$this->external_parent_field} = '{$parent_id}' ";
        }    
        
        
        /*select ONLY parents */ /*selec those who don't exists on the left column*/
        $sql = "SELECT  {$this->base_table}.id as id FROM {$this->base_table}
            
                $left_join
                
                where not exists
                (select * from  {$this->link_table} WHERE {$this->base_table}.id = {$this->link_table}.{$this->child_field})
                
         $except
         
         $and_parent

                "; 
        
       // echo "[$sql]";
        $a = $this->db->query($sql);
        $rows = $a->result_array();
      
       
       $r= array();
       $tree = array();
       $used = array();
       foreach ($rows as $row)
       {
           
               // p($row);
            
                $cid  = $row['id'];
                $sql2 = "SELECT {$this->child_field} from {$this->link_table} WHERE {$this->child_field} = '$cid'
                limit 1
                 ";
                /// arturo , if 0 the item doesn't appear 
                
                $esHija = $this->db->query($sql2);
                $r2 = $esHija->result();
                //p($r2);
                
                //echo $sql2;
               // echo "<br />";
                if (!empty($r2))
                {
                    // echo $sql2;
               // echo "child id is [$cid] <br />";    
                    continue;
                
                }
                
                $p = new $this->model_name($row['id']);
                
                //echo $p->name;
                
                $this->insertToTree($r,$p,$used);
                
               
               
       }
        
    // p($r);
   
     return $r; 
        
        
       
        
        
        
        
        
        
    }
    /*
     * creates an array of objects ,not tree, but rectangular (table) array
     */
    function buildTree($nodes,&$r,$level=0)
    {
        $level++;
        $Model = $this->model_name;
        
        foreach($nodes as $node)
        {
            $id = $node['id'];
            $p = new $Model($id);
            $p->level=$level;
            //echo "p level is {$p->level}";
            $r[]=$p;
            if (isset($node['children']))
            {
                
                //echo "{$element->name} has children";
                $this->buildTree($node['children'],$r,$level);
                
            }
            
        }
        
    }
    
    function  getTreeTable($except_id = NULL,$parent=null,$parent_id=null)
    {
        $this->except_id = $except_id;
        
        $all = $this->getTree($except_id,$parent,$parent_id);
        $r = array();
        $this->buildTree($all,  $r,0);
        return $r;
       
    }
    /*
     * creates a tree array, where children are a nested array
     */
    function insertToTree(& $r,$element,& $used)
    {
        
        if (array_key_exists($element->id, $used))
        {
            return ;
        }
        else
        {
            $used[$element->id]='1';
        }
        /*
         * $except_id all except this id and its children so it can choose a suitable parent
         */
        if (!array_key_exists($element->id, $r) and ($element->id!=$this->except_id) )
        {
            $r[$element->id]['name']=$element->name; 
            $r[$element->id]['id']=$element->id; 
            
            $related_model = strtolower($this->model_name);
           
           
                $children = $element->$related_model->get()->all;
                if (count($children))
                {
                //$r[$element->id]['childrenN']=count($children);
                    $r[$element->id]['children']=array();
                
                    foreach($children as $child)
                    {
                        $this->insertToTree($r[$element->id]['children'], $child,$used);
                    }
                
                 }
           
        }
    }
    /*
     * creates the --> for subchildren
     */
    function getLevelString($dash = false)
    {
        $l="";
        
        for($i=1;$i<$this->level;$i++)
        {
            if ($dash)
            $l.="-";    
            else
            $l.='<i style="padding-left:2px;padding-right:6px;" class="icon-angle-right"></i>';
        }
        return $l;
    }
    
    
    function getDropdownParent()
    {
        $rows = $this->getTreeTable($this->id);
        $array = array();
        $array['']="(Ninguno)";
        foreach($rows as $row)
        {
            $array[$row->id]=$row->getLevelString(true)." ".$row->name;
            
        }
       
        $d = new Dropdown("parent_id",$array);    
        
        $d->setClass('uniform');
        echo $d;
            
        
        
    }
    
   
    function configureTree() {
       
    $this->base_table = $this->getBaseTable();
    $this->child_field =$this->getChildField();
    $this->external_parent_field = $this->getExternalParentField();//"course_id"; /*in tassks_tasks external parent is project_id */
    
    $this->parent_field = $this->getParentField();//"related_content_id";
    $this->link_table=$this->getLinkTable();//"contents_contents";
    $this->model_name = $this->getModelName();//"Content";
    $this->parent_table = $this->getParentTable();//"contents_courses"; /*for example parent : project child tasks*/
    $this->parent_name = $this->getParentName();//'courses' /*projects*/; 
        
        
    } 
     
    abstract function getExternalParentField(); /*in tassks_tasks external parent is project_id */
    abstract function getParentField();//"example related_content_id or related_task_id ";
    abstract function getLinkTable();//"contents_contents or tasks_tasks";
    abstract function getModelName();//zbS "Content";
    abstract function getParentTable();//
    abstract function getParentName();//contents_courses //// zB /*projects taskss*/ 
    /*example "tasks" in tasks -- (sub) tasks relationship */
    abstract function getBaseTable();
     /*example "task_id" in tasks -- (sub) tasks relationship */
    abstract function getChildField();
    
    
    /*inner array for self-relationship*/
    
    abstract function getRelated();
    abstract function getSelf();
    
}