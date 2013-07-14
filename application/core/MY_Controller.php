<?php

class MY_Controller extends CI_Controller
{
    
    
    function __construct() {
        parent::__construct();
    }
    
    
    
    function uploads()
       {        
           
               // echo "<pre>"; 
                //print_R($_FILES);
                
                //die();
                $ret = array();
         
           
                $this->load->library('upload');
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|pdf|zip|psd|xls|rar';
		//$config['max_size']	= '10000';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';

		 foreach ($_FILES as $key => $value)
                 {
                       // print_r($value);
                       
                       
                        if (!empty($value['name']))
                        {
                            // echo "--inside ---{$value['name']}";   

                            $this->upload->initialize($config);
                            if (!$this->upload->do_upload($key))
                            {

                                $errors = $this->upload->display_errors();
								var_dump($errors);
								die();

                            }
                            else
                            {
                                $ret[]= $this->upload->data();
                            }
                        }
                    }   

		
	return $ret;
           
           
       }
	
    
}