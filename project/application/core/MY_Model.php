<?php

class MY_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

}

class Ysd_Model extends MY_Model 
{
	function __construct()
	{
		parent::__construct();
		
		//读写分离连接句柄
		 $this->writedb = $this->load->database('writedb', true);
         $this->readdb = $this->load->database('readdb', true);
		
	}
}