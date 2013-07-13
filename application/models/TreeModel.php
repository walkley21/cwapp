<?php
class TreeModel extends ParentModel{
    
    public $except_id; 
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    
    function getTree($excep_id = null,$parent=null,$parent_id=null)
    {
        $except ='';
        if (!empty($excep_id))
        $except = " AND {$this->base_table}.id !=  '{$excep_id}' ";
        
        $left_join='';
        $and_parent='';
        if (!empty($parent))
        {
            $left_join="
            LEFT JOIN projects_tasks ON

            tasks.id = projects_tasks.task_id ";
            
            $and_parent = " AND projects_tasks.project_id = 1 ";
        }    
        
        
        /*select ONLY parents */
        $sql = "SELECT  {$this->base_table}.id as id FROM {$this->base_table}
            
                $left_join
                
                where not exists
                (select * from  {$this->link_table} WHERE {$this->base_table}.id = {$this->link_table}.{$this->child_field})
                
         $except
         
         $and_parent

                "; 
        
       //echo "[$sql]";
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
    
    
}