<?php
require_once 'ParentModel.php';
class Post extends ParentModel
{
    public $has_many =array("image");
    
    
    function __construct($id = NULL,$parent=null) {
        parent::__construct($id,$parent);
    }
    
    
    function getPostDate()
    {
        return @date("d / m / Y",strtotime($this->created));
        
    }
    
    
}