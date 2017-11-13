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
		
		$link = $instagram->getLoginUrl(
		array(
			'basic',
			'likes',
			'relationships'
		));

		$conta = $this->MY_Model->get_api_instagram();
			
		if(!empty( $conta )):
			$instagram->setAccessToken($conta);
			$midia = $instagram->getUserMedia();
		endif;

		$total_likes = 0;
		$total_comments = 0;

		foreach($midia->data as $index => $result):
			$total_likes += $result->likes->count;
			$total_comments += $result->comments->count;
		endforeach;


		$config = array(
			'c_class' => get_class(),
			'c_metodo' => get_class_methods(get_class())[1],
			'c_diretorio_pagina' => 'painel/pagina/redesocial/instagram',
			'c_layout' => 'painel',
			'titulo' =>  get_class(),
			'link' => array('titulo' => 'Entrar Instagram' , 'url' => $link),
			'midia' => $midia,
			'conta' => $conta,
			'total_likes' => $total_likes,
			'total_comments' => $total_comments
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

		$token_instagram = $instagram->getOAuthToken($_GET['code']);

		if(!empty( $token_instagram )):
			if($this->MY_Model->insert_api_instagram(  $token_instagram )):
				redirect(base_url('painel/redesocial/instagram/'));
			endif;
		endif;

	}

	public function check()
	{
		echo $this->session->userdata('id-login');
	}


}