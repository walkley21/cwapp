<?php

class ParentModel extends DataMapper{
    
    public $controller;
    public $CI;
    public $default_order_by=array('created');
            function __construct($id = NULL) {
        parent::__construct($id);
        $this->CI = &get_instance();
    }
    
    function delete_link()
    {
        
        return base_url("$this->controller/delete/{$this->id}");
        
    }
    function edit_link()
    {
        
        
        return base_url("$this->controller/form/{$this->id}");
        
    }
     function edit_link_field($thefield)
    {
         
        
        $a = new Anchor($this->$thefield,  site_url("{$this->controller}/form/{$this->id}"));
        
       return "$a";
        
        
    }
    
    function saveFromPost()
    {
        //p($_POST);
        foreach($_POST as $key =>$field)
        {
            $val = $this->checkDate($this->CI->input->post($key));
            $this->$key = $val;
           // echo "[$key] [$val]";
        }
        $this->save();
      // die();
    }
    
    
    function checkDate($val)
    {
        
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
    
}