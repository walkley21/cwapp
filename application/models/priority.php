<?php


class Priority extends ParentModel
{
    public $table = 'priorities';
    public $has_one=array('project');
    function __construct($id = NULL) {
        parent::__construct($id);
    }
   
}