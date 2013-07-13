<?php
require_once 'ParentModel.php';
class Task extends TreeModel{
    
    
    public $controller = 'tasks';
    
  
  
    public   $has_many = array(
        'related_task' => array(
            'class' => 'task',
            'other_field' => 'task',
            'reciprocal' => false,
            'join_table' => 'tasks_tasks'
        ),
        'task' => array(
            'other_field' => 'related_task',
            'join_self_as'=>'task',
            
        )
        ,
        'comment',
        'incidence'
        
    );
     
    public $has_one=array('project');
    
    public $level;
   
    public $base_table = 'tasks';
    public $child_field ="task_id";
    public $parent_field = "related_task_id";
    public $link_table="tasks_tasks";
    public $model_name = "task";
    
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
    
    function getComments()
    {
        $comments= $this->comment->get()->result_count();
        $a = new Anchor("Comentarios $comments",  site_url("comments/parent/task/{$this->id}"));
        return $a;
    }
      function getIncidences()
    {
        $comments= $this->incidence->get()->result_count();
        $a = new Anchor("Incidencias $comments",  site_url("incidences/parent/task/{$this->id}"));
        return $a;
    }
  
    
}