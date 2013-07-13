<?php

require_once 'parent_controller.php';

class comments extends parent_controller
{
    
    public $view = 'rows';
    public  $parent_id;
    public $model_name='Comment';
    protected $parent_controller_name='tasks';
    
    protected $project_id ; 
    protected $project_object = null;
    
    function __construct()
    {
        
        parent::__construct();
       // echo "excecutin oarent";
     
       $this->parent_id = $this->uri->segment(5);
       //echo "parent_id   $this->parent_id ";
       
       
      
       
        
    }
    
   
    
    
    function form($id = null)
    {
        $this->view = 'form';
        $this->id = $id;
        $this->index();
    }
   
    
    function getFormData()
    {
        
        $model = $this->model_name;    
        $p = new $model($this->id);
        //echo "parent_id is $this->parent_id";
        return array('record'=>$p,'parent_id'=>$this->parent_id);
        
        
    }
    function getRowsData() {
     
          return array('records'=>$this->getRows(),
                        'new_record'=>"New ",
                       'title'=>"Title"); 
      
    }
    
    function getRows()
    {
            $model = $this->model_name;
            $p = new $model();
            $projectId = NULL;
            $task_name = null;
            $project_name = '';
            $project_description='';
            $task_description='';
            $project_attachments  = array();
            $task_attachments  = array();
            
            if (!empty($this->parent_id)){
                $p->where_related('task','id',$this->parent_id);
                
                $task = new Task($this->parent_id);
                
//                $task_attachments = $task->taskimage->get()->all;
                $task_name = $task->name;
                $task_description = $task->description;
                
                $project = $task->project->get();
             //   echo $project->id;
                $this->project_id= $project->id;
                
            //    $project_attachments = $project->projectimage->get()->all;
                
                $projectId =  $project->id;
                $project_name =  $project->name;
                $project_description =  $project->description;
                
            }
            
            $all = $p->where('deleted !=',1)->get()->all;
            
            
            /*get associated images*/
            
        
            return array('rows'=>$all,
                         'parent'=>'task',
                         'task_name'=>$task_name,
                         'task_description'=>$task_description,
                         'task_attachments'=>$task_attachments,
                         'project_name'=>$project_name,
                         'project_attachments'=>$project_attachments,
                         'project_description'=>$project_description,
                
                         'controller'=>__CLASS__,
                         'EntityName'=>$this->model_name,
                         'project_id'=>$projectId,
                         'parent_id'=>$this->parent_id);
        
        
        
    }
    function save($id=null,$parent=null,$parent_id=null)
    {
     
        
       $user_id  = $this->session->userdata("user_id"); 
		
		
       $p = new Comment($id);
	   $p->user_id = $user_id;
       $p->saveFromPost();
       
       if (!empty($parent) and !(empty($parent_id)))
       {
           $parent = ucfirst($parent);
           $pa = new $parent($parent_id);
           $pa->save($p);
       }
      
       $extra = '';
       if(!empty($parent_id))
       {
           $extra = "parent/{$this->parent_controller_name}/$parent_id/";
       }    
       $task = new Task($parent_id);
       
       $project= $task->project->get();
       $company = $project->company->get();
      
       
       $data = $this->uploads();
       
       //print_r($data);
       
       if (!empty($data))
           foreach($data as $image)
           {
                $img = new Commentimage();
                $img->file_name = $image['file_name'];
                $img->file_type = $image['file_type'];
                $img->save();
                $p->save($img);
           }
       
       $url = site_url("/clients/comments/parent/tasks/{$parent_id}");
       $message = 
               "A new comment has been post. To see it, please go to $url ";
       $n = new Notification($subject='new comment for project', $message);
       
      
       $recipients = $company->user->get()->all;
       $send=array();
       foreach($recipients as $recipient)
       {
          $send[] = $recipient->email; 
       }
       
       //print_R($send);
       $n->setRecipients($send);
       $n->send();
       
       //die();
       redirect("clients/{$this->getControllerName()}/$extra");

    }
    
    
    function parent($parent,$id = null)
    {
        $this->parent_id= $id;
        $this->index();
    }
    
    function getControllerName()
    {
        return __CLASS__;
    }
    
    
    function paypal()
    {
        
        $this->load->library('merchant');
        $this->merchant->load('paypal_express');
        
        $settings = array(
        'username' => 'seller123a_api1.gmail.com',
        'password' => '1367085154',
        'signature' => 'AYBRfv3uzXZsMOMrTKthIB100Qy1AJ3JZ2RXaJFR8z.t7POwtXfK6IGS',
        'test_mode' => true);

        $this->merchant->initialize($settings);
        
        $params = array(
        'description'=>"100 hrs programming",    
        'amount' => 100.00,
        'currency' => 'USD',
        'return_url' => site_url("/clients/comments/paypal_return"),
        'cancel_url' => site_url("/clients/projects")
        );    
        
        $this->merchant->purchase($params);
        
        
        
    }
    
    function paypal_return()
    {
        
         $params = array(
        'description'=>"100 hrs programming",    
        'amount' => 100.00,
        'currency' => 'USD',
        'return_url' => site_url("/clients/comments/paypal_return"),
        'cancel_url' => site_url("/clients/projects")
        );  
         $settings = array(
        'username' => 'seller123a_api1.gmail.com',
        'password' => '1367085154',
        'signature' => 'AYBRfv3uzXZsMOMrTKthIB100Qy1AJ3JZ2RXaJFR8z.t7POwtXfK6IGS',
        'test_mode' => true);
        $this->load->library('merchant');
        $this->merchant->load('paypal_express');
        $this->merchant->initialize($settings);
        $response = $this->merchant->purchase_return($params);
        echo "<pre>";
            
            print_r($response);
        
        echo "</pre>";
    }
    
    
	function delete ($comment_id)
	{
		
		$c = new Comment($comment_id);
		$c->deleted=1;
		$c->save();
	    echo "OK";
		
	}
	
	function createComments()
	{
		/*
		$task = new Task(12);
		$lorem = ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
		for($i = 0; $i<100;$i++){
		$c = new Comment();
		$c->user_id= 1;	
		$c->body = "<p>{$lorem}</p>";
		$c->save();
		$task->save($c);
		}*/
		
	}
}