<?php
require_once 'ParentModel.php';
class Project extends ParentModel{
    
    
    public $controller = 'projects';
    
  
  
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
       
    }
    
    
    function getStartDate()
    {
       return @date("d M Y",  @date(strtotime($this->startdate  )));    
    }
    
    function getEndDate()
    {
       return @date("d M Y",  @date(strtotime($this->enddate)));    
    }
    function startdate()
    {
        
        return $this->fdate('startdate');
        
    }
    function enddate()
    {
        
        return $this->fdate('enddate');
        
    }
    
    
    
   
    
    
    function getStatus()
    {
        $status = new Status();
        
        
        $s = $this->status->get(1);
        
      
        $select = new Dropdown("status_id",$status->toDropdown(),$s->id);
        $select->setAttr('class','uniform');
        return $select;
        
    }
    
      function getStatusLabel()
    {
       
        
       
       
        return 'test';
        
    }
    
    function getAproval()
    {
        $status = new Approval();
        
        
        $s = $this->approval->get(1);
        
      
        $select = new Dropdown("approval_id",$status->toDropdown(),$s->id);
        $select->setAttr('class','uniform');
        return $select;
        
    }
    
    function getApprovalLabel()
    {
       
        return "";
        
        
    }
    
    function getPriority()
    {
      
        return '';
        
    }
    
    function getPrioritylLabel()
    {
      
        
    }
    
    function getTasks()
    {
       
        
    }
  
    
}