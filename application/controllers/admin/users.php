<?php
require_once 'parent_controller.php';

class users extends parent_controller{
    
    
    public $form_action = '/save/';        
    public $model_name='User';
    public $id = null;
    public $title = "Usuarios";
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
        $records =  $p->get()->all;
       
        $new_record_url = base_url("{$this->getControllerName()}/form/0/");
        
        $i = new I();
        $i->setClass("icon-plus");
        $new_record = new Anchor("{$i} Crear un Proyecto Nuevo", $new_record_url);
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
       
       return array('title'=>  $this->title,
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
    
    
    
    function save($id=null)
    {
        $model_name = $this->model_name;
        $p = new $model_name($id);
        $p->saveFromPost();
        
        
        
        redirect($this->getControllerName());
        
    }
}