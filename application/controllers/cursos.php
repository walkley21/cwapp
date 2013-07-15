<?php
require_once("parent_controller.php");

class cursos extends parent_controller{
    
    
    function __construct() {
        parent::__construct();
    }
    
    function Content()
    {
        $c  = new Course();
        $all = $c->get();
        $data['cursos']=$all;
        $v = $this->load->view(theme_dir("cursos/cursos"),$data,true);
        
        return $v;
        
    }
    
}