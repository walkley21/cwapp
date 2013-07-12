<?php
require_once 'parent_controller.php';
class contact extends parent_controller{
    
    function __construct() {
        parent::__construct();
    }
    
    
    function Content() {
        return "at contact us";
    }
    
}