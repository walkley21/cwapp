<?php
require_once 'ParentModel.php';
class Course extends ParentModel
{
    public $has_many =array("image",'content');
    
    
    function __construct($id = NULL,$parent=null) {
        parent::__construct($id,$parent);
    }
    
     function getContents()
    {
       $tasks = $this->content->get()->result_count(); 
       $a = new Anchor("Contents {$tasks}",  admin_url("/contents/parent/course/{$this->id}")); 
       return  $a;
        
    }
  
    
    
}