<?php 

require_once 'vendor/Instagram/Instagram.php';


class Instagram extends MY_Controller{

	private $config_api = array(
		'apiKey' => '',
		'apiSecret' => '',
		'apiCallback' => 'http://localhost/brechoweb/painel/redesocial/instagram/callback' 
	);
		
	function __construct() 
	{
		parent::__construct();
		autorizacao_login();
	}
	
	public function index()
	{

		$instagram = new Instagram\Instagram($this->config_api);
		
		$link = $instagram->getLoginUrl(array(
			'basic',
			'likes',
			'relationships'
		  ));

		$link = '<a class="btn btn-lg btn-success" class="login" href="'.$link.'">» Login with Instagram</a>';

		$config = array(
			'c_class' => get_class(),
			'c_metodo' => get_class_methods(get_class())[1],
			'c_diretorio_pagina' => 'painel/pagina/redesocial/instagram',
			'c_layout' => 'painel',
			'titulo' =>  get_class(),
			'link' => $link
		);

		$data['pagina'] = PaginaView(
			$config['c_class'], 
			$config['c_metodo'], 
			$config['c_diretorio_pagina'], 
			$config['c_layout']
		);

		$this->load->view('layout/painel/index' , array_merge($data ,$config ));

	}
	

	public function callback()
	{
		$instagram = new Instagram\Instagram($this->config_api);

		$token = $instagram->getOAuthToken($_GET['code']);

		 print_r($token);
	}


}