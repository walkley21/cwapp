<?php


class admin_parent_controller extends MY_Controller
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
        
        
        if (!empty($parent))
        {
            $parentObject = new $parent($parent_id);
            $parentObject->save($record);
            
            
        }    
       
        
        //die(p($_POST));
       /**/ 
       redirect(admin_url("/".$this->getControllerName()));
        
    }
    
    function __toString() {
        return $this->getControllerName();
    }
    
    
    function  form($id=null)
    {
        
        $this->id = $id;
        $this->view = 'form';
       
        $this->index();
    }
    
    
}