<?php


function autorizacao_login(){
	if(!empty($_SESSION['status_login'])):
		else:
		redirect(base_url('login'));
	endif;
}

function autorizacao_dashboard(){
	if(!empty($_SESSION['status_dashboard'])):
		else:
		redirect(base_url('clientes/login'));
	endif;
}

function autorizacao_dashboard_produtos_graficos(){
	if(!empty($_SESSION['status_dashboard_produtos_graficos'])):
		else:
		redirect(base_url('dashboard/produtos_grafica/entrar'));
	endif;
}


// funções de diretorio e action de formularios
function BaseDiretorio($diretorio)
{
	return APPPATH ."views/".$diretorio;
}

function BaseController($NomeController = null , $NomeArquivo = null , $metodo = null , $modulo = null){

	if($modulo == 'painel'):
		if (isset($metodo)) {
			return base_url('painel/').strtolower ($NomeController).'/'.$NomeArquivo .'/'.$metodo;
		}else{
			return base_url('painel/').strtolower ($NomeController).'/'.$NomeArquivo;
		}
	elseif($modulo == 'site'):
		if (isset($metodo)) {
			return base_url('').strtolower ($NomeController).'/'.base64_encode($NomeArquivo) .'/'.$metodo;
		}else if($NomeController == null && $metodo == null ) {
            return base_url('').base64_encode(strtolower($NomeArquivo));
        }else{
			return base_url('').strtolower ($NomeController).'/'.$NomeArquivo;
		}
	elseif($modulo == 'dashboard'):
		if (isset($metodo)) {
			return base_url('dashboard/').strtolower ($NomeController).'/'.$NomeArquivo .'/'.$metodo;
        }else if($NomeController == null && $metodo == null ) {
            return base_url('dashboard/').strtolower($NomeArquivo);
		}else {
			return base_url('dashboard/').strtolower ($NomeController).'/'.$NomeArquivo;
		}
		
	else:
		if (isset($metodo)) {
			return base_url('painel/').strtolower ($NomeController).'/'.$NomeArquivo .'/'.$metodo;
		}else if($NomeController == "" && $NomeArquivo == "" && $metodo == "" && $modulo == ""){
			return base_url('painel/');
		} else {
			return base_url('painel/').strtolower ($NomeController).'/'.$NomeArquivo;
		}
	endif;
}


// funções de criações de diretorios e copias de arquivos padroes

function CriarModuloView($NomePasta)
{
	// verificar se diretorio existe
	if(!file_exists(BaseDiretorio($NomePasta))){
		// criando pasta
		mkdir(BaseDiretorio($NomePasta), 0755, true);
		// liberando pasta
		chmod(BaseDiretorio($NomePasta), 0755);

	} 
	// echo BaseDiretorio($NomePasta);
}

function ArquivoAutomatico($NomePasta , $NomeArquivo , $modulo){

	$extensao = ".php";

	// if(GerarArquivoModulo($NomePasta , $NomeArquivo)){

		$DiretorioA = APPPATH ."libraries/modulo/".$modulo.'/'.$NomeArquivo.$extensao;
		$DiretorioB = BaseDiretorio($NomePasta).'/'.$NomeArquivo.$extensao;
		// mkdir(dirname($DiretorioB), 0777, true);
		if(!copy($DiretorioA, $DiretorioB)){
			echo "sucesso";
		}

	// }

}


// function GerarArquivoModulo($NomePasta, $NomeArquivo)
// {
// 	$extensao = ".php"; // extensão padrão

// 	// verificando se arquivo existe
// 	if(!file_exists(BaseDiretorio($NomePasta.'/'.$NomeArquivo.$extensao))){
// 		// criando arquivo
// 		// if(!$NomeArquivo = null){
// 		fopen(BaseDiretorio($NomePasta).'/'.$NomeArquivo.$extensao, "w+");
// 		// }
		
// 	} 
// }


function PaginaView($NomePasta, $NomeArquivo , $modulo){
	
	CriarModuloView($NomePasta);
	// GerarArquivoModulo($NomePasta , $NomeArquivo);
	ArquivoAutomatico($NomePasta , $NomeArquivo , $modulo);

	return $NomePasta.'/'.$NomeArquivo;
}


function tabelasBD($class){

	$prefixo['tabela'] = "tb_".strtolower($class); 

	return $prefixo;
}

// funções de personalizações de variaveis

function _string($string ){
	return str_replace('_', ' ',str_replace('Tb_', ' ', ucfirst($string)));
}

function Replace($string){

	return str_replace('tb_', '', $string);

}

function SubmenuPainel($id , $tabela, $data ){
	return $id . $atbela . $data;
}



function UrlAtual($id){
	 $dominio= $_SERVER['HTTP_HOST'];
	 $url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
	 return str_replace('?acao=up', '', $url);
 }

function id_max($id = null){
	return $id + 1;
}


