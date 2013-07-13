<?php
require_once 'parent_controller.php';

class tasks extends parent_controller{
    
    
    public $form_action = '/save/';        
    public $model_name='Task';
    public $new_label = "Crear una Tarea Nueva";
    public $id = null;
    function __construct() {
        parent::__construct();
        
       
    }
    
    
    function Content()
    {
        switch ($this->view)
        {
            case 'form':
            return $this->load->view("/{$this->getControllerName()}/form",  $this->getFormData(),TRUE);
            break;
        
            case 'rows':
            return $this->load->view("/{$this->getControllerName()}/rows",  $this->getRowsData(),TRUE);
            break;
        
        }
        
    }
    function getRowsData()
    {
        $model = $this->model_name;
        $p = new $model(null,$this);
        
        
       // echo " $this->parent, $this->parent_id ";
       // die();
        
        $records =  $p->getTreeTable($except_id = null , $this->parent, $this->parent_id);
       
        $new_record_url = base_url("{$this->getControllerName()}/form/0/");
        
        $i = new I();
        $i->setClass("icon-plus");
        $new_record = new Anchor("{$i} {$this->new_label}", $new_record_url);
        $new_record->setClass('btn');
        $new_record->setClass('btn-blue');
        
        return array('title'=>'',
                     'form_title'=>'',
                     'subtitle'=>'',
                     'records'=>$records,
                     'new_record'=>$new_record,
                     'form_enctype'=>''
            
            
            );
        
    }
    function getFormData()
    {
       $action = base_url("{$this->getControllerName()}/save/{$this->id}");
       
       $record = new $this->model_name($this->id);
       
       return array('title'=>'',
                     'form_title'=>'',
                     'subtitle'=>'',
                     'form_action'=>$action,
                     'form_enctype'=>'',
                     'record'=>$record
            
            
            );
        
        
    }
    function getControllerName()
    {
        return __CLASS__;
    }
    
    function  rows()
    {
       
        
       
        
      
        
        $this->view='rows';
        $this->index();
        
    }
    
    function  form($id=null)
    {
        
        $this->id = $id;
        $this->view = 'form';
       
        $this->index();
    }
    
    
    
    function test()
    {
        
        $p = new Project();
        $rows = $p->getTreeTable();
         $table = new Table();
            
         
        $p->getDropdownParent();
        
        return ;
        foreach($rows as $row)
        {
            
          
            
            $label = '';
            for($i=1;$i<$row->level;$i++)
            {
                $label.="-- ";
            }
            $td = new Td("$label".$row->name);
            $tr = new Tr($td);
            $table->add($tr);
        }
        echo $table;
        
        
    }
    
    
    
    function save($id=null,$parent='project',$parent_id='1')
    {
        
        $link_table ="tasks_tasks";
        $table_field = "task_id";
        $table_related_field='related_task_id';
       
        $model_name = $this->model_name;
        $p = new $model_name($id);
        $p->saveFromPost();
        
        //delete any old parent
        
        if (!empty($_POST['parent_id'])){
        $this->db->where( $table_field,$p->id);
        $this->db->delete($link_table);
        
        $parent_data[$table_field]=$p->id;
        $parent_data[$table_related_field]=$_POST['parent_id'];
        
        
        $this->db->insert($link_table,$parent_data);
        }
        
        if (!empty($parent))
        $extra = "/parent/{$parent}/{$parent_id}";
        
        
        redirect($this->getControllerName()."{$extra}");
        
    }
    
    
    
    function parent($parent_name,$parent_id)
    {   
            
        
            $this->parent = $parent_name;
            $this->parent_id = $parent_id;
            
            //echo " $this->parent_name $this->parent_id ";
            $this->index();
    }
}