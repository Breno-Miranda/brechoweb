<?php 
	
class Facebook extends MY_Controller{
		
	function __construct() 
	{
		parent::__construct();
		autorizacao_login();
	}
	
	public function index()
	{
        
    }


}