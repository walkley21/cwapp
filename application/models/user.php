<?php
require_once 'ParentModel.php';
class User extends ParentModel{
    
    
    public $controller = 'users';
    
   
  
    public   $has_many = array(
        'related_project' => array(
            'class' => 'project',
            'other_field' => 'project',
            'reciprocal' => false,
            'join_table' => 'projects_projects'
        ),
        'project' => array(
            'other_field' => 'related_project',
            'join_self_as'=>'project',
            
        )
        
    );
     
    public $has_one=array();
    
    public $level;
   
    public $base_table = 'projects';
    public $child_field ="project_id";
    public $parent_field = "related_project_id";
    public $link_table="projects_projects";
    public $model_name = "project";
    
    function __construct($id = NULL) {
        parent::__construct($id);
       
    }
    
    
    function getStartDate()
    {
       return $this->created;    
    }
    
    function getEndDate()
    {
      return $this->created;  
    }
    
    
    function getStatus()
    {
      return $this->created;  
    }
    function getAproval()
    {
        return $this->approval;
    }
    
    function getPriority()
    {
        return $this->priority;
    }
    
    
  
    
}