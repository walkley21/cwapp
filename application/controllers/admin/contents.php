<?php
require_once 'admin_parent_controller.php';

class contents extends admin_parent_controller
{
    
    public $parent;
    public $parent_id;
    public $model_name = "Content";
    
    public $new_label = "Crear un nuevo contenido";
     
    
    
    function __construct() {
        parent::__construct();
    }
    
    
    
   function parent($parent_name,$parent_id)
    {   
            
        
            $this->parent = $parent_name;
            $this->parent_id = $parent_id;
            
            //echo " $this->parent_name $this->parent_id ";
            $this->index();
    }
    
    
    
    function getRowsData()
    {
        $model = $this->model_name;
      
        $p = new $model(null,$this);
        
        
        //echo " [$this->parent], id = [$this->parent_id] ";
        //die();
        
        $records =  $p->getTreeTable($except_id = null , $this->parent, $this->parent_id);
       
        //p($records);
        
        $new_record_url = admin_url("/{$this->getControllerName()}/form/0/{$this->parent}/{$this->parent_id}");
        
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
         
        //echo "[[$this->parent]"; 
         
       $id = empty($this->id)?'0':  $this->id;  
         
       $action = admin_url("/{$this->getControllerName()}/save/{$id}/course/2");
       $enctype = 'multipart/form-data';
       $record = new $this->model_name($this->id);
       
       return array('title'=>'',
                     'form_title'=>  $this->form_title,
                     'subtitle'=>'',
                     'form_action'=>$action,
                     'form_enctype'=>$enctype,
                     'record'=>$record
            
            
            );
        
        
    }
    
    
    function getControllerName()
    {
        
        return __CLASS__;
    }
    
}