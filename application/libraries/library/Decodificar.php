<?php 

class Decodificar{

	public function __construct()
	{
	      
	}

	public function encode_encrypt($dados)
	{	
		return base64_encode($dados);
	}

	public function decode_encrypt($dados)
	{	
		return base64_decode($dados);
	}

}