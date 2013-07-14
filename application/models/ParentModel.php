<?php

class ParentModel extends DataMapper{
    
    public $controller;
    public $CI;
    
    
    public $default_order_by=array('created');
    public $admin_dir='';
    function __construct($id = NULL,$controller=null) {
        parent::__construct($id);
        
        
        $this->controller = $controller;
        $this->CI = &get_instance();
        
        $this->admin_dir = $this->config->item("admin_dir"); 
        
    }
    
    function delete_link()
    {
        
        return base_url("$this->controller/delete/{$this->id}");
        
    }
    function edit_link()
    {
        
        
        return base_url("{$this->admin_dir}/$this->controller/form/{$this->id}");
        
    }
     function edit_link_field($thefield)
    {
         
        
        $a = new Anchor($this->$thefield,  admin_url("/{$this->controller}/form/{$this->id}"));
        
       return "$a";
        
        
    }
    
    function saveFromPost($array = null)
    {
        //p($_POST);
        //p($array,"en sabe ");
        if ($array == null)
        $array = $_POST;    
        
        foreach($array as $key =>$val)
        {
            $val1 = $this->CI->input->post($key);
            if (!empty($val1))
            $val = $this->checkDate($val1);
            
            $this->$key = $val;
            
            
            //echo "[$key] [$val]";
        }
        $this->save();
       //die();
    }
    
    
    function checkDate($val,$field_name='')
    {
        if (empty($val)) return  ; 
        
        
        if ( 1 === preg_match('~^[0-9]{1,2}/[0-9]{1,2}/[0-9]{4}~', $val))
        {
          
            @list($d,$m,$y)=split("/",$val);
        
            $val = "$y-$m-$d";
            //echo $val;
        }
        return $val; 
    }
    
    function selectParent($parent = "")
    {
        $c = new $parent();
        $all = $c->get()->all;
        $array['']='Seleccione';
        foreach ($all as $record) {
            $array[$record->id]=$record->name;
        }
        
       
        $d = new Dropdown("{$parent}_id",$array,'','uniform');
        
        return "$d";
    }
    
    
    function fdate($field,$format="d/m/Y")
    {
        if (empty($this->$field))
            return ;
        
        $date = $this->$field;  // a mysql date 
     
        
        
        $date = strtotime($date);
        return @date($format,$date);
        
                
    }
    
    
    function toDropdown()
    {
        $array = array();
        foreach($this->get()->all  as $item )
        {
            $array[$item->id]=$item->name;
        }
        return $array;
    }
    
    
     function getImage()
    {
        
        $image = $this->image->order_by('created','desc')->get(1)->file_name;
        
        $i = new Img(base_url("uploads/$image"));
      
        return "$i";        
    }
    
}