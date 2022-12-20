<?php

class Vue{
  
  public $param;

  public function __construct() 
  {
    $this->param = array();
  }

  public function assign($varName,$value) 
  {
    $this->param[$varName] = $value;
  }

  public function display($filename) 
  {
    
    $filePath = ("./vue/".$filename);
    foreach ($this->param as $key => $value) 
    {
      $$key = $value;
    }
    require($filePath);
    
    exit(0);
  }
	
}

 ?>