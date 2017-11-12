<?php
class Politica extends MY_Controller{

    function construct()
    {
        parrent::Controller();
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
            'c_class_pagination' =>
                array(
                'c_tabela' => get_class()),
            'c_padrao_dados' => get_class()
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
            'c_pagination' => 'pagination_'.get_class(),
            'c_limit' => 5,
            'c_class_pagination' =>
                array(
                'c_tabela' => get_class()),
            'c_id_where_blogs' => base64_decode($this->uri->segment(2))// ($this->uri->segment(1)) ? $this->uri->segment(1) : 0)
        ));

    }


}