<?php
require_once('parent_controller.php');
class dashboard extends parent_controller
{
    
    
    function __construct() {
        parent::__construct();
    }
    
    
    function Content()
    {
        
        $v = $this->load->view("dashboard",null,true);
        return $v;
    }
    
}