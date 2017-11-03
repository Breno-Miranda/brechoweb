<?php 
class Contato extends MY_Controller{

    private $flashdata = array(
        'sucesso' => array('item'=> 'flashdata' ,'status' => 'success' , 'msm' => 'Enviado com sucesso !'),
        'error' => array('item'=> 'flashdata' ,'status' => 'danger' , 'msm' => 'Error, não foi possivel enviar'),
    );

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
            'c_diretorio_pagina' => 'site/pagina/'.get_class(),
            'c_layout' => 'site',
            'c_pagination' => 'pagination',
            'c_limit' => 5,
            'c_replace_label' => array('r_original' => 'Slug' , 'r_novo' => 'Nome'),
            'c_class_pagination' =>
                array(
                'c_tabela' => get_class()),
            'c_padrao_dados' => get_class(),
            'action' => BaseController(get_class() ,get_class_methods(get_class())[3] ,null, 'site')
        ));
    }


    public function view()
    {
         $this->layout(array(
            'c_diretorio' => 'layout/site/index',
            'c_class' => get_class(),
            'c_metodo' => get_class_methods(get_class())[1],
            'c_diretorio_pagina' => 'site/pagina/'.get_class().'/view',
            'c_layout' => 'site',
            'c_replace_label' => array('r_original' => 'Slug' , 'r_novo' => 'Nome'),
            'c_pagination' => 'pagination_'.get_class(),
            'c_limit' => 5,
            'c_class_pagination' =>
                array(
                'c_tabela' => get_class()),
            'c_id_where_paginas' =>  ($this->uri->segment(4)) ? $this->uri->segment(4) : 0
        ));

    }



      public function salvar()
    {

        $data['tabela'] = tabelasBD(get_class());
        $data['campos'] = $this->Modulos_Model->tabela($data['tabela'] , null);
        
        foreach ($data['campos'] as $resultCampos): // CAMPOS DA TABELA DESEJADA 
            if($resultCampos->primary_key != 1 && $resultCampos->default != 'FILE'): 
             $this->form_validation->set_rules($resultCampos->name, $resultCampos->name, 'required');
            endif;
        endforeach;

        
        if ($this->form_validation->run() == FALSE)
        {


            $this->layout(array(
                'c_diretorio' => 'layout/site/index',
                'c_class' => get_class(),
                'c_metodo' => get_class_methods(get_class())[1],
                'c_diretorio_pagina' => 'site/pagina/'.get_class(),
                'c_layout' => 'site',
                'c_pagination' => 'pagination_blogs',
                'c_limit' => 5,
                'c_class_pagination' =>
                    array(
                    'c_tabela' => get_class()),
                'c_padrao_dados' => 'dados',
                'c_replace_label' => array('r_original' => 'Slug' , 'r_novo' => 'Nome'),
                'c_metodo_extends' => get_class_methods(get_class())[3],
                'action' => BaseController(get_class() ,get_class_methods(get_class())[3] ,null, 'site')
                ));


        }
        else
        {
            $data['tabela'] = tabelasBD(get_class());
            $data['campos'] = $this->Modulos_Model->tabela($data['tabela'] , null);
            $data['metodo'] = get_class_methods(get_class())[3];

             foreach ($data['campos'] as $resultCampos) :

                if($resultCampos->primary_key != 1 && $resultCampos->default != 'FILE'): 
                    $date[$resultCampos->name] = $this->input->post($resultCampos->name);
                endif;
                
                if ($resultCampos->default == 'FILE') :
                
                    if ($this->upload($resultCampos->name)) :
                        $upload_data = $this->upload($resultCampos->name);
                        $date[$resultCampos->name] = base_url('/'). $upload_data['upload_path'] . $upload_data['file_name'];
                    endif;
                    
                endif;
                
             endforeach;

             if($this->Modulos_Model->crud($data, $date)){
                $this->session->set_flashdata($this->flashdata['sucesso']['item'], $this->flashdata['sucesso']);
                redirect(BaseController(get_class(), null , null , 'site'));
             } else {
               $this->session->set_flashdata($this->flashdata['error']['item'], $this->flashdata['error']);
               redirect($_SESSION['ultimo_url']);
                // show_error('erro de cadastro ou o servidor falhou !');
             }

        }

    }

    public function upload($nomeImagem = null)
    {
            $config['upload_path']          = 'uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;
            $config['encrypt_name']         = true;

            $this->upload->initialize($config);

            if ($this->upload->do_upload($nomeImagem)):

            $upload_data = $this->upload->data(); 

            return  array_merge($upload_data , $config);

            else:
                return false;
            endif;
            
    }



}