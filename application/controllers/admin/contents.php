<?php
require_once 'admin_parent_controller.php';

class contents extends admin_parent_controller
{
    
    public $parent;
    public $parent_id;
    public $model_name = "Content";
    
    
     
    
    
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
    
    function getControllerName()
    {
        
        return __CLASS__;
    }
    
}