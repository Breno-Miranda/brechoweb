<?php 
class Site extends MY_Controller{

	function construct()
	{
	  parrent::Controller();
        notificacoes();
	}

	public function index()
	{
		$this->layout(array(
            'c_diretorio' => 'layout/site/index',
            'c_class' => get_class(),
            'c_metodo' => get_class_methods(get_class())[1],
            'c_diretorio_pagina' => 'site',
            'c_layout' => 'site',
            'c_pagination' => 'pagination_blogs',
            'c_limit' => 5,
            'c_class_pagination' =>
            	array(
				'c_tabela' => 'Blogs'),
            'c_id_where_blogs' =>  ($this->uri->segment(4)) ? $this->uri->segment(4) : 0
		));
	}






}