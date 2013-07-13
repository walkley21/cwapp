<?php


class admin_parent_controller extends CI_Controller
{
    public $view = 'rows';
    public $model_name;
    
    public $site_name='';
    
    public $parent='';
    public $parent_id='';
    
    public $title = '';
    public $new_label='override this label (new_label) ';
    public $form_title = '';
            
    function __construct() {
        parent::__construct();
        
        $this->site_name=$this->config->item('site_name');
        
    }
    
    
    function index()
    {
       echo $this->buildPage();
    }
    
    
     
    function Content()
    {
        switch ($this->view)
        {
            case 'form':
            return $this->load->view("/{$this->getControllerName()}/form",  $this->getFormData(),TRUE);
            break;
        
            case 'rows':
            return $this->load->view("/{$this->getControllerName()}/rows",  $this->getRowsData(),TRUE);
            break;
        
        }
        
    }
    
    
    function buildPage()
    {
      
       return $page = $this->Template();
        
    }
    
    
    function Template()
    {

            $this->data['navigation']= "";//$this->Navigation();

            $this->data['content'] = $this->Content();
            
            $this->data['site_name'] = $this->site_name;
            
           // $this->data['bar'] = $this->Bar();



            $view = $this->parser->parse("layout",$this->data,true);


            return $view;
    }
    
    
    function save($id,$parent=null,$parent_id=null)
    {
       
        $model = $this->model_name;
        $record = new $model($id);
        
        $record->saveFromPost();
        
        redirect("{$this->getControllerName()}");
        
    }
    
    
}