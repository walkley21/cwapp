<?php



class parent_controller extends CI_Controller
{
    public $data;
    
    function __construct() {
        parent::__construct();
    }
    
    
    function  index()
    {
        
        echo $this->buildPage();
        
    }
    
    
    function buildPage()
    {
        $this->data['header']=$this->Header();
        $this->data['content']=$this->Content();
        
        $this->data['base_url']=  base_url();
        
        $view = $this->load->view(THEME_DIR."/layout",$this->data,true);
        
        return $view;
        
    }
    
    function Content()
    {
        
        
        
    }
    
    function Header()
    {
        
        return array("title"=>"MyFlowerStore");
        
    }
    
}