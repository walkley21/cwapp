<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once("parent_controller.php");
class home extends parent_controller {

    
    function __construct() {
        parent::__construct();
    }
	
    
     function Content()
    {
         
         $courses = new Course();
         
         $all = $courses->get(3)->all;
         $data['cursos']=$all;
         
         $posts = new Post();
         $all = $posts->order_by('updated','desc')->get(3)->all;
         $data['posts']=$all;
         
         
         
         $view = $this->load->view(THEME_DIR."/home/home",$data,true);
         
         
         return $view;
        
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */