<?php 
	
class Site extends MY_Controller{
		
	function __construct() 
	{
		parent::__construct();
		autorizacao_login();
	}
	
	public function index()
	{
        
    }


}