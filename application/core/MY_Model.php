<?php 
class MY_Model extends CI_Model
{

	public function get_esqueci_senha()
	{
		
	}

	public function insert_api_instagram( $dados )
	{
	
		if(!empty( $dados )):
			$_dados['access_token'] = $dados->access_token;
			$_dados['user_id'] = $dados->user->id;
			$_dados['user_bio'] = $dados->user->bio;
			$_dados['user_name'] = $dados->user->username;
			$_dados['user_picture'] = $dados->user->profile_picture;
			$_dados['user_full_name'] = $dados->user->full_name;
			$_dados['usu_id'] = $this->session->userdata('id-login');
		
			return $this->db->insert('tb_instagram_api' , $_dados);
		else:
			return false;
		endif;
	}


	public function get_api_instagram( )
	{
		$this->db->where('usu_id' , $this->session->userdata('id-login')); 
		return $this->db->get('tb_instagram_api')->row();
	}
}