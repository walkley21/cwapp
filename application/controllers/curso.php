<?php
require_once("parent_controller.php");

class curso extends parent_controller{
    
    
    function __construct() {
        parent::__construct();
    }
    
   function Content() {
        
       $p = new Course($this->id);
       $data['curso']=$p;
       $v = $this->load->view(theme_dir("/cursos/curso"),$data,true);
       
       
       return $v; 
        
    }
    
    function _remap($param)
    {
        $p = new Course();
        $p->where('friendlyurl',$param)->get();
        if($p->id)
        {
            $this->id= $p->id;
          
            $this->index();
        }
        else
        redirect("/cursos");
    }
    
}