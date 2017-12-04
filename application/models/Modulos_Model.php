<?php 
class Modulos_Model extends MY_Model{

	# METODO CONTADOR DE LINHAS PARA PAGINAÇÃO
	public function count_query($data){
		return $this->db->count_all($data['tabela']);
	}
	# METODO CHAMADA DE TODAS AS TABELAS DO BANCO
	public function tabela($data){
		$fields = $this->db->field_data($data['tabela']);
		return $fields;
	}
	# METODO SELECT AUTOMATICO SIMPLES
	public function dropdown($data){
		$date[0] = "Escola uma das opções";
		if($data->primary_key == 1): $this->db->order_by($data['campos'][0]->name , 'desc'); endif;
		$result = $this->db->get(strval($data->name))->result();
		foreach ($result as $row): $date[$row->id] = $row->slug; endforeach;
		return $date;
	}
	# METODO SELECT AUTOMATICO MULT
	public function dropdownMult($data = null , $date = null)
	{
		if(isset($date['id_where'])):
            $this->db->where($date['segunda_tabela']['tabela'] , $date['id_where']);
		endif;
		$retorno[0] = "Escolha um opção";
		$date['campos'] = $data;
		$this->db->order_by($date['campos']->name.'.id' , 'desc');
		$result = $this->db->get(strval($date['campos']->name))->result();
			foreach($result as $row):
				$retorno[$row->id] = $row->slug;
			endforeach;
		return $retorno;
			
	}
	# METODO CRUD COMPLETO
	public function crud($data , $date){
		switch ($data['metodo']) {
			case 'index':
				if(isset($data['order_by']) && isset($data['order_by_dados'])):
                    $this->db->order_by($data['order_by'], $data['order_by_dados']);
                endif;
				if(isset($data['like']) && isset($data['like_dados']) ):
                    $this->db->like($data['like'], $data['like_dados']);
                endif;
                if(isset($data['limit']) ):
                    $this->db->limit($data['limit']);
                endif;
				if(isset($data['limit']) && isset($data['offset'])):
                    $this->db->limit($data['limit'], $data['offset']);
                endif;
                if(isset($data['id_where']) && isset($data['where_campo'])):
                    $this->db->where($data['where_campo'], $data['id_where']);
                endif;
				if(isset($data['tabela_id'])):
					$this->db->where($data['tabela']['tabela'].'.'.$data['tabelacampo']['tabela'] , $data['tabela_id']);
				endif;
				if(isset($data['id_where']) && !isset($data['where_campo'])):
					$this->db->where($data['tabela']['tabela'].'.id' , $data['id_where']);
				endif;
                if(isset($data['campos'])):
				 if($data['campos'][0]->primary_key == 1 ):
					$this->db->order_by("{$data['tabela']['tabela']}.id " , 'desc');
				endif;
                elseif(isset($data['campos_form'])):
                    if($data['campos_form'][0]->primary_key == 1 ):
                        $this->db->order_by("{$data['tabela']['tabela']}.id " , 'desc');
                    endif;
                endif;
				# JOIN AUTOMATICO PARA LAYOUT (PAINEL)
                if(isset($data['campos'])): # FILTRAGEM DE CAMPOS DAS TABELAS
				foreach ($data['campos'] as $index => $CamposResult):
					if($CamposResult->primary_key == 1):
						$this->db->select($data['tabela']['tabela'].'.'.$CamposResult->name);
					elseif($CamposResult->name == 'data'):
						$this->db->select("date_format({$data['tabela']['tabela']}.{$CamposResult->name} , '%d/%m/%Y') as {$CamposResult->name}");
					elseif($CamposResult->name == 'slug' ):
						$this->db->select("{$data['tabela']['tabela']}.slug");
                    elseif($CamposResult->default == 1 && $CamposResult->type == 'int' ):
                        $this->db->select("{$CamposResult->name}.slug AS {$CamposResult->name}");
                        $this->db->select("{$CamposResult->name}.id AS id_t_".$index); // ID_T CODIGO IDENTIFICAÇÃO DE OUTRA TABELA
						else:
						$this->db->select($data['tabela']['tabela'].'.'.$CamposResult->name);
					endif;
					# FAZENDO AS FILTRAGEM DE TABELAS COM CHAVES ESTRAGEIRAS.
					if ($CamposResult->default == 1  && $CamposResult->name != "timestamp" && $CamposResult->type == "int"  ):
						$this->db->join($CamposResult->name, "{$data['tabela']['tabela']}.{$CamposResult->name}={$CamposResult->name}.id " ,'LEFT');
					endif;
				endforeach;
				#JOIN AUTOMATICO PARA FORMULARIOS EXTERNO (LAYOUT SITE)
				elseif(isset($data['campos_form'])):
                    foreach ($data['campos_form'] as $CamposResult):
                        if($CamposResult->primary_key == 1):
                            $this->db->select($data['tabela']['tabela'].'.'.$CamposResult->name);
                        elseif($CamposResult->name == 'data'):
                            $this->db->select($data['tabela']['tabela'].'.'.$CamposResult->name);
                        elseif($CamposResult->name == 'slug' ):
                            $this->db->select("{$data['tabela']['tabela']}.slug");
                        elseif($CamposResult->default == 1 && $CamposResult->type == 'int' ):
                            $this->db->select("{$CamposResult->name}.slug AS {$CamposResult->name}");
                        else:
                            $this->db->select($data['tabela']['tabela'].'.'.$CamposResult->name);
                        endif;
                        # FAZENDO AS FILTRAGEM DE TABELAS COM CHAVES ESTRAGEIRAS.
                        if ($CamposResult->default == 1  && $CamposResult->name != "timestamp" && $CamposResult->type == "int"  ):
                            $this->db->join($CamposResult->name, "{$data['tabela']['tabela']}.{$CamposResult->name}={$CamposResult->name}.id " ,'INNER');
                        endif;
                    endforeach;
                endif;
				# retorno dos dados tratados
				return $this->db->get($data['tabela'])->result();
			break;
			# METODO SALVAR
			case 'salvar':
				if(isset($data['return_id'])):
					$this->db->insert($data['tabela']['tabela'] , $date);
					$return_id = $this->db->insert_id();
					return $return_id;
                elseif(isset($data['insert_Mult'])):
                        if(isset($date['ordens'])):
                                $this->db->insert_batch($data['tabela']['tabela'] ,  $date['ordens']);
                                $return_id = $this->db->insert_id();
                                return $return_id;
                        elseif(isset($date['data'])):
                                $this->db->insert_batch($data['tabela']['tabela'] ,  $date['data']);
                                $return_id = $this->db->insert_id();
                                return $return_id;
                        endif;
                elseif(isset($data['verificacao'])):
                	foreach ($data['campos'] as $campos):
						if(	$campos->default === 'LOGIN' ): 
							$this->db->where($data['tabela']['tabela'].'.'.$campos->name, $date[$campos->name]);
						endif;
					endforeach;
                	if($this->db->get($data['tabela']['tabela'])->num_rows() == 0):
                		return $this->db->insert($data['tabela']['tabela'] , $date);
                	else:
                		return false;
                	endif;
                else:
                    $this->db->insert($data['tabela']['tabela'] , $date);
                    return  $this->db->insert_id();
                endif;
			break;
			# METODO EDITAR
			case 'editar':
			    if(isset($data['id_where']) && isset($data['where_campo'])):
                    $this->db->where($data['where_campo'], $data['id_where']);
                    return $this->db->update($data['tabela']['tabela'] , $date);
                else: 
                    $this->db->where($data['tabela']['tabela'].'.id' , $data['id_where']);
                    return $this->db->update($data['tabela']['tabela'] , $date);
                 endif;
			break;
			# METODO DELETAR
			case 'deletar':
				$this->db->where("id ",$date['id']);
				return $this->db->delete($data['tabela']['tabela']);
			break;
			#EXTENSÃO DE METODO DE AUTENTICAÇÃO (LOGIN)
			case 'logar':
				foreach ($data['campos'] as $campos):
					if($campos->default == 'LOGIN' ): 
					$this->db->where($data['tabela']['tabela'].'.'.$campos->name, $date[$campos->name]);
					elseif($campos->default == 'SENHA'):
					$this->db->where($data['tabela']['tabela'].'.'.$campos->name, $date[$campos->name]);
					endif;
				endforeach;
				$logar_data = $this->db->get($data['tabela']['tabela'])->row();	
				if(!empty($logar_data)):
					$session = array(
			        	'id-login'  => $logar_data->id,
			       		'usuario'     => $logar_data->usuario,
				     	'status_login' => TRUE
					);
					$this->session->set_userdata($session);
				endif;
				return $logar_data;
			break;
			#EXTENSÃO DE METODO DE AUTENTICAÇÃO (LOGIN)
			case 'login':
				foreach ($data['campos'] as $campos):
					if($campos->default == 'LOGIN' ): 
					$this->db->where($data['tabela']['tabela'].'.'.$campos->name, $date[$campos->name]);
					elseif($campos->default == 'SENHA'):
					$this->db->where($data['tabela']['tabela'].'.'.$campos->name, $date[$campos->name]);
					endif;
				endforeach;
				$logar_data = $this->db->get($data['tabela']['tabela'])->row();	
				if(!empty($logar_data)):
					$session = array(
			        	'id-cliente'  => $logar_data->id,
			       		'usuario'     => $logar_data->usuario,
			       		'slug'     => $logar_data->slug,
				     	'status_dashboard' => TRUE
					);
					$this->session->set_userdata($session);
				endif;
				return $logar_data;
			break;
			#EXTENSÃO DE METODO DE AUTENTICAÇÃO (LOGIN)
			case 'entrar':
				foreach ($data['campos'] as $campos):
					if($campos->default == 'LOGIN' ): 
					$this->db->where($data['tabela']['tabela'].'.'.$campos->name, $date[$campos->name]);
					elseif($campos->default == 'SENHA'):
					$this->db->where($data['tabela']['tabela'].'.'.$campos->name, $date[$campos->name]);
					endif;
				endforeach;
				$logar_data = $this->db->get($data['tabela']['tabela'])->row();	
				if(!empty($logar_data)):
					$session = array(
			        	'id-cliente-produtos-graficos'  => $logar_data->tb_clientes,
			       		'usuario'     => $logar_data->usuario,
			       		'slug'     => $logar_data->slug,
				     	'status_dashboard_produtos_graficos' => TRUE
					);
					$this->session->set_userdata($session);
				endif;
				return $logar_data;
			break;

			default:
				return FALSE;
			break;
		}
	}
}