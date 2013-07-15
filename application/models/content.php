<?php

require_once 'TreeModel.php';

class Content extends TreeModel
{
    
    public $has_one=array("course");
    
    public $has_many=array();
     public $controller = 'contents';
    
  
  
    
    
    
   
    
  //  public $parent_name = 'courses';
   // public $parent_name = 'courses';
   
    
    
    function __construct($id = NULL) {
        
         $this->configureTree();
        $this->has_many= array(
        "related_".  strtolower($this->getModelName()) => $this->getRelated(),
        "".strtolower($this->getModelName())."" => $this->getSelf()
        ,
       
        
    );
        /*first configure, then call parent*/
       
        parent::__construct($id);
    }
    
    
   
    
    function getBaseTable() {
        return "contents";
    }
    
    function getExternalParentField()/*in tassks_tasks external parent is project_id */
    {
        return 'course_id';
    }
    
    function getParentField()//"example related_content_id or related_task_id ";
    {
      return 'related_content_id';    
        
    }
    function getLinkTable()//"contents_contents or tasks_tasks";
    {
        return "contents_contents";
    }
    function getModelName()//zbS "Content oder Task";
    {
        return 'Content';
    }
    function getParentTable()//
    {
        return "contents_courses"; // zB /*projects taskss*/ 
    }
     
    
   function getParentName()
   {
       return "courses";
   } 
    
     /*example "task_id" in tasks -- (sub) tasks relationship */
    function getChildField()
    {
        return "content_id";
        
    }
    function getRelated() {
       return array(
            'class' => strtolower($this->getModelName()),
            'other_field' =>  strtolower($this->getModelName()),
            'reciprocal' => false,
            'join_table' => $this->getLinkTable()
        );
       
    }
    
    function getSelf() {
        return array(
            'other_field' => "related_".strtolower($this->getModelName()),
            'join_self_as'=>strtolower($this->getModelName()),
            
        );
                
    }
    
}