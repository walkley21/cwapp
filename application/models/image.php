<?php

class Image extends ParentModel
{
    public $has_many = array("course",'post');
    function __construct($id = null)
    {
        
        parent::__construct($id);
        
    }
    
    
    
}