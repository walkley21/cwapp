<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once("parent_controller.php");
class posts extends parent_controller {

    
    function __construct() {
        parent::__construct();
    }
	
    
     function Content()
    {
         
        $p = new Post();
        $all = $p->get(5)->order_by('updated','asc')->all;
        $data['posts']=$all;
        $v = $this->load->view(theme_dir("posts/posts"),$data,true);
         return $v;
         
    }
    
    
    /*function _remap($param)
    {
        
       if ($param=='index')
       $this->index();    
        
    }*/
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */