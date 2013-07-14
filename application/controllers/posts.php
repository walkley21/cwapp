<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once("parent_controller.php");
class posts extends parent_controller {

    
    function __construct() {
        parent::__construct();
    }
	
    
     function Content()
    {
         
         $courses = new Post();
         
         $all = $courses->get(3)->all;
         $data['cursos']=$all;
         $view = $this->load->view(THEME_DIR."/home/home",$data,true);
         
         
         return $view;
        
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */