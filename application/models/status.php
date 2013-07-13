<?php


class Status extends ParentModel
{
    public $table= 'statuses';
    
    public $has_one=array('project');
    function __construct($id = NULL) {
        parent::__construct($id);
    }
   
}