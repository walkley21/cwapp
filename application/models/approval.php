<?php


class Approval extends ParentModel
{
    
    public $has_one=array('project');
    function __construct($id = NULL) {
        parent::__construct($id);
    }
   
}