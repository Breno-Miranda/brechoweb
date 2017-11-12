<?php 

require_once 'vendor/Facebook/autoload.php';

class Facebook extends MY_Controller{

	private $config_api = array(
		'app_id' => '',
		'app_secret' => '',
		'default_graph_version' => 'v2.2',
	);
		
	function __construct() 
	{
		parent::__construct();
		autorizacao_login();

	}
	
	public function index()
	{

		$fb = new Facebook\Facebook($this->config_api);

			$helper = $fb->getRedirectLoginHelper();
			
			$permissions = ['email' , 'publish_pages' , 'publish_actions' , 'manage_pages']; // Optional permissions
			$loginUrl = $helper->getLoginUrl(base_url('painel/redesocial/facebook/callback'), $permissions);
			
			$link = '<a class="btn btn-lg btn-success" href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

			$config = array(
				'c_class' => get_class(),
				'c_metodo' => get_class_methods(get_class())[1],
				'c_diretorio_pagina' => 'painel/pagina/redesocial/facebook',
				'c_layout' => 'painel',
				'titulo' => get_class(),
				'link' => $link
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
			$fb = new Facebook\Facebook($this->config_api);
			
			$helper = $fb->getRedirectLoginHelper();
			
			try {
				$accessToken = $helper->getAccessToken();
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
				// When Graph returns an error
				echo 'Graph returned an error: ' . $e->getMessage();
				exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
				// When validation fails or other local issues
				echo 'Facebook SDK returned an error: ' . $e->getMessage();
				exit;
			}
			
			if (! isset($accessToken)) {
				if ($helper->getError()) {
					header('HTTP/1.0 401 Unauthorized');
					echo "Error: " . $helper->getError() . "\n";
					echo "Error Code: " . $helper->getErrorCode() . "\n";
					echo "Error Reason: " . $helper->getErrorReason() . "\n";
					echo "Error Description: " . $helper->getErrorDescription() . "\n";
				} else {
					header('HTTP/1.0 400 Bad Request');
					echo 'Bad request';
				}
				exit;
			}
			
			// Logged in
			echo '<h3>Access Token</h3>';
			var_dump($accessToken->getValue());
			
			// The OAuth 2.0 client handler helps us manage access tokens
			$oAuth2Client = $fb->getOAuth2Client();
			
			// Get the access token metadata from /debug_token
			$tokenMetadata = $oAuth2Client->debugToken($accessToken);
			echo '<h3>Metadata</h3>';
			var_dump($tokenMetadata);
			
			// Validation (these will throw FacebookSDKException's when they fail)
			$tokenMetadata->validateAppId($this->config_api['app_id']); // Replace {app-id} with your app id
			// If you know the user ID this access token belongs to, you can validate it here
			//$tokenMetadata->validateUserId('123');
			$tokenMetadata->validateExpiration();
			
			if (! $accessToken->isLongLived()) {
				// Exchanges a short-lived access token for a long-lived one
				try {
					$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
				} catch (Facebook\Exceptions\FacebookSDKException $e) {
					echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
					exit;
				}
			
				echo '<h3>Long-lived</h3>';
				var_dump($accessToken->getValue());
			}
			
			$_SESSION['fb_access_token'] = (string) $accessToken;
			
			// User is logged in with a long-lived access token.
			// You can redirect them to a members-only page.
			//header('Location: https://example.com/members.php');
		}
		

		public function push()
		{
			$fb = new Facebook\Facebook($this->config_api);
 
		  $linkData = [
				'link' => 'http://brenomirandaster.com/brechoweb/',
				'message' => 'site',
				];
				
				try {
				// Returns a `Facebook\FacebookResponse` object
				$response = $fb->post('/me/feed', $linkData,  $_SESSION['fb_access_token']);
				} catch(Facebook\Exceptions\FacebookResponseException $e) {
				echo 'Graph returned an error: ' . $e->getMessage();
				exit;
				} catch(Facebook\Exceptions\FacebookSDKException $e) {
				echo 'Facebook SDK returned an error: ' . $e->getMessage();
				exit;
				}
				
				$graphNode = $response->getGraphNode();
				
				echo 'Posted with id: ' . $graphNode['id'];
		}


}