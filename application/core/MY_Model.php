<?php 
class MY_Model extends CI_Model
{
	public $data_model = array(
		'usuario_id' => '310390349',
		'cliente_id' => '84a33496f49c48b1974cbff77286262e',
		'api' => "https://api.instagram/v1/users/310390349/media/recent/?cliente_id=84a33496f49c48b1974cbff77286262e"

	);

	public function get_esqueci_senha()
	{
		
	}

	public function instagram()
	{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $this->data_model['api']);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);

		$data = json_decode(curl_exec($curl));

		var_dump($data);
	}
}