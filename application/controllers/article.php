<?php
require_once 'parent_controller.php';

class article extends parent_controller{
    
    public $friendurl = '';
    public $id; 
    function __construct() {
        parent::__construct();
    }
    
    
    function Content() {
        
       $p = new Post($this->id);
       $data['post']=$p;
       $v = $this->load->view(theme_dir("/article/article"),$data,true);
       
       
       return $v; 
        
    }
    
    function _remap($param)
    {
        $p = new Post();
        $p->where('friendlyurl',$param)->get();
        if($p->id)
        {
            $this->id= $p->id;
          
            $this->index();
        }
        else
        redirect("/posts");
    }
}