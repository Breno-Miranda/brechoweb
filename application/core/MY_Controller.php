<?php 

class MY_Controller extends CI_Controller {
   
    public function __construct() {
      parent::__construct();
      date_default_timezone_set('America/Sao_Paulo');
      ini_set('date.timezone', 'America/Sao_Paulo');
      # LOAD BIBLIOTECAS 
      $this->load->library('library/Decodificar');
      $this->load->library('encrypt');
      # LOAD MODEL 
      $this->load->model('MY_Model');
  	}

  	public function layout( Array $config){

  	$this->pagination($config);

    if(!empty($config['c_id_where_blogs'])): $dados_view['id_where'] = $config['c_id_where_blogs']; endif;
	$dados_view['metodo'] = $config['c_metodo'];
	$dados_view['tabela'] = tabelasBD($config['c_class']);
	$dados_view['campos'] = $this->Modulos_Model->tabela($dados_view['tabela']);
	$dados_view['Blogs_static_site_view'] = $this->Modulos_Model->crud($dados_view , null);

    if(!empty($config['c_id_where_paginas'])): $dados_view['id_where'] = $config['c_id_where_paginas']; endif;
    $dados_view['metodo'] = $config['c_metodo'];
    $dados_view['tabela'] = tabelasBD($config['c_class']);
    $dados_view['campos'] = $this->Modulos_Model->tabela($dados_view['tabela']);
    $dados_view['Videos_static_site_view'] = $this->Modulos_Model->crud($dados_view , null);

    $dados['limit'] = 5; 
    $dados['metodo'] = $config['c_metodo'];
    $dados['tabela'] = tabelasBD("blogs");
    $dados['campos'] = $this->Modulos_Model->tabela($dados['tabela']);
    $dados['Blogs_static_site_limit'] = $this->Modulos_Model->crud($dados , null);

    $dados['limit'] = 5; 
    $dados['metodo'] = $config['c_metodo'];
    $dados['tabela'] = tabelasBD("politica");
    $dados['campos'] = $this->Modulos_Model->tabela($dados['tabela']);
    $dados['Politica_static_site_limit'] = $this->Modulos_Model->crud($dados , null);
    
   
    $dados_view_site['limit'] = 4; 
    $dados_view_site['order_by'] = 'tb_blogs.id';
    $dados_view_site['order_by_dados'] = 'desc';
    $dados_view_site['metodo'] = $config['c_metodo'];
    $dados_view_site['tabela'] = tabelasBD("blogs");
    $dados_view_site['campos'] = $this->Modulos_Model->tabela($dados_view_site['tabela']);
    $dados_view_site['blog_limit_noticias'] = $this->Modulos_Model->crud($dados_view_site , null);
    
    
    $dados['produto']['limit'] = 50;
    $dados['produto']['order_by'] = 'tb_produtos.id';
    $dados['produto']['order_by_dados'] = 'desc';
    $dados['produto']['metodo'] = $config['c_metodo'];
    $dados['produto']['tabela'] = tabelasBD("produtos");
    $dados['produto']['campos'] = $this->Modulos_Model->tabela($dados['produto']['tabela']);
    $dados['produto']['produtos_limits'] = $this->Modulos_Model->crud($dados['produto'], null);

    $dados[$config['c_pagination']] = $this->pagination->create_links();
    $dados['limit'] = 4; 
	$dados['metodo'] = $config['c_metodo'];
	$dados['tabela'] = tabelasBD("blogs");
	$dados['campos'] = $this->Modulos_Model->tabela($dados['tabela']);
	$dados['Blogs_static_site'] = $this->Modulos_Model->crud($dados , null);


    // Painel 
    if(isset($config['c_id_where'])):$dados_view_padrao['id_where'] = $config['c_id_where'];  endif;
    $dados_view_padrao['offset'] = isset($_GET['per_page']) ? $_GET['per_page'] : false;
    $dados_view_padrao['limit'] = $config['c_limit']; 
    $dados_view_padrao['metodo'] = $config['c_metodo'];
    $dados_view_padrao['tabela'] = tabelasBD($config['c_class']);
    $dados_view_padrao['campos'] = $this->Modulos_Model->tabela($dados_view_padrao['tabela']);
    $dados_view_padrao['dados_view_padrao'] = $this->Modulos_Model->crud($dados_view_padrao , null);

    
    // PADRÃO 
    if(isset($config['c_padrao_dados'])):
    $dados['offset'] = isset($_GET['per_page']) ? $_GET['per_page'] : false;
    $dados['limit'] = $config['c_limit']; 
    $dados['order_by'] ='tb_'. strtolower($config['c_class']).'.id';
    $dados['metodo'] = $config['c_metodo'];
    $dados['tabela'] = tabelasBD($config['c_class']);
    $dados['campos'] = $this->Modulos_Model->tabela($dados['tabela']);
    $dados[$config['c_padrao_dados']] = $this->Modulos_Model->crud($dados , null);
    endif;

    foreach($dados['campos'] as $campos_form):
        if($campos_form->default == 1):
            $data[$campos_form->name] = $this->Modulos_Model->dropdownMult($campos_form);
        endif;
    endforeach;


		$data['titulo'] = $this->config->item('titulo').' | '.$config['c_class'];

		$data['pagina'] = PaginaView(
			$config['c_class'], 
			$config['c_metodo'], 
			$config['c_diretorio_pagina'], 
			$config['c_layout']
		);


		$this->load->view(
			$config['c_diretorio'],
			 array_merge(
			 	$data,
			 	$dados,
			 	$dados['produto'],
			 	$dados_view,
        $config,
        $dados_view_site,
        $dados_view_padrao
		));

  	}

  	public function pagination($config){


  		$config_pagination = array(
            "base_url" => '',
            "per_page" =>  $config['c_limit'],
            "num_links" => $config['c_limit'],
            "uri_segment" => 25,
            'page_query_string' => true,
            "total_rows" => $this->Modulos_Model->count_query(tabelasBD($config['c_class_pagination']['c_tabela'])),
            "full_tag_open" => "<div class='pagination'>",
            "full_tag_close" => "</div>",
            "first_link" => FALSE,
            "last_link" => FALSE,
            "first_tag_open" => "<a>",
            "first_tag_close" => "</a>",
            "prev_link" => "Anterior",
            "prev_tag_open" => "<a class='prev'>",
            "prev_tag_close" => "</a>",
            "next_link" => "Próxima",
            "next_tag_open" => "<a class='next'>",
            "next_tag_close" => "</a>",
            "last_tag_open" => "<a>",
            "last_tag_close" => "</a>",
            "cur_tag_open" => "<a class='active'>",
            "cur_tag_close" => "</a>",
            "num_tag_open" => "<a>",
            "num_tag_close" => "</a>"
        );


        $this->pagination->initialize($config_pagination);
    
  	}


    public function email()
    {
        
    }
    
    public function ultima_url()
    {
        redirect(base_url($_SERVER['REQUEST_URI']));
    }

    public function permissao( $dados )
    {
        if( $dados )
        {   
            $result = $this->MY_Model->get_permissoes( $dados );

            $metodo = strval($dados['metodo']);

            switch($metodo)
            {
                case 'index':
                    if( (int) !$result->view):  $this->session->set_flashdata('msm', 'Você não tem PERMISSÃO ao modulo - '.$dados['modulo']); redirect(base_url('painel'));  endif;
                break;

                case 'salvar':
                    if( (int) !$result->$metodo):  $this->session->set_flashdata('msm', 'Você não tem PERMISSÃO ao modulo - '.$dados['modulo']); redirect(base_url('painel'));  endif;
                break;

                case 'editar':
                    if( (int) !$result->$metodo):  $this->session->set_flashdata('msm', 'Você não tem PERMISSÃO ao modulo - '.$dados['modulo']); redirect(base_url('painel'));  endif;
                break;

                case 'deletar':
                    if( (int) !$result->$metodo):  $this->session->set_flashdata('msm', 'Você não tem PERMISSÃO ao modulo - '.$dados['modulo']); redirect(base_url('painel'));  endif;
                break;

                default:
                    redirect(base_url('painel'));
                break;
            }
        } else {
            return false;
        }
    }




}