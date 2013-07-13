<?php

require_once("ParentModel.php");

class Incidence extends ParentModel{
    
    public $has_one=array("task");
   // public $has_many=array("commentimage");
    
    
    function __construct($id = null) {
        parent::__construct($id);
        $this->default_order_by=array('created'=>'desc');
        
        
      
    }
        
    
    function getImages()
    {
        
        $all_images = $this->commentimage->get()->all;
        return $all_images;
        
        
    }
    
    function getUser()
    {
        $u  = new User($this->user_id);
        return $u->getFullName();
        
    }
	
	
    function time_elapsed_string($ptime) {
    $etime = time() - $ptime;
    
    if ($etime < 1) {
        return '0 seconds';
    }
    
    $a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
                );
    
    foreach ($a as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . ' ' . $str . ($r > 1 ? 's' : '');
        }
    }
}


     function edit_link()
    {
        
        
        return base_url("$this->controller/form/{$this->id}");
        
    }
    
}