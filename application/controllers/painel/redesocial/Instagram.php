<?php 

require_once 'vendor/Instagram/Instagram.php';


class Instagram extends MY_Controller{
		
	function __construct() 
	{
		parent::__construct();
		autorizacao_login();
	}
	
	public function index()
	{

        $instagram = new Instagram\Instagram(array(
			'apiKey' => '84a33496f49c48b1974cbff77286262e',
			'apiSecret' => '41ffc29633444682b257fb46032ddcf0',
			'apiCallback' => base_url('painel/redesocial/instagram/callback') // must point to success.php
		));
		// create login URL
		$link = $instagram->getLoginUrl();

		echo '<a class="login" href="'.$link.'">» Login with Instagram</a>';

	}
	

	public function callback()
	{
		$instagram = new Instagram\Instagram(array(
			'apiKey' => '84a33496f49c48b1974cbff77286262e',
			'apiSecret' => '41ffc29633444682b257fb46032ddcf0',
			'apiCallback' => base_url('painel/redesocial/instagram/callback') // must point to success.php
		));
		$token = $instagram->getOAuthToken($_GET['code']);

		 print_r($token);
	}


}