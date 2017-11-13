<?php 
require_once 'vendor/Twitter/TwitterOAuth.php';

class Twitter extends MY_Controller{

	private $config_api = array(
		'CONSUMER_KEY' => '' ,
		'CONSUMER_SECRET' => '' ,
		'ACCESS_TOKEN' => '-' ,
		'ACCESS_TOKEN_SECRET' => '' ,
	);
		
	function __construct() 
	{
		parent::__construct();
		autorizacao_login();
	}
	
	public function index()
	{
		$connection = new TwitterOAuth\TwitterOAuth(
			$this->config_api['CONSUMER_KEY'],
			$this->config_api['CONSUMER_SECRET'],
			$this->config_api['ACCESS_TOKEN'],
			$this->config_api['ACCESS_TOKEN_SECRET']
		);

		$twitter['timeline'] = $connection->get("statuses/home_timeline");
	
		$config = array(
			'c_class' => get_class(),
			'c_metodo' => get_class_methods(get_class())[1],
			'c_diretorio_pagina' => 'painel/pagina/redesocial/twitter',
			'c_layout' => 'painel',
			'titulo' => 'twitter'
		);

		$data['pagina'] = PaginaView(
			$config['c_class'], 
			$config['c_metodo'], 
			$config['c_diretorio_pagina'], 
			$config['c_layout']
		);

		$this->load->view('layout/painel/index' , array_merge($data ,$config , $twitter));
	}
	
	public function push()
	{
		$connection = new TwitterOAuth\TwitterOAuth(
			$this->config_api['CONSUMER_KEY'],
			$this->config_api['CONSUMER_SECRET'],
			$this->config_api['ACCESS_TOKEN'],
			$this->config_api['ACCESS_TOKEN_SECRET']
		);
		
		$statues = $connection->post("statuses/update", ["status" => "twitter api"]);

		echo '<pre>';
		print_r($statues);
		
	}


}