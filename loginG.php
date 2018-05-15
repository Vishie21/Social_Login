<?php
	include_once 'src/Google_Client.php';
	include_once 'src/contrib/Google_Oauth2Service.php';
	
	
	$clientId = '670943101802-co83379joiigeji028vfpfo1hen6cpjt.apps.googleusercontent.com'; //Application client ID
	$clientSecret = '0bAOYqTK_3OJbt6jTpxgUOwT'; //Application client secret
	$redirectURL = 'http://localhost/Social_Login/'; //Application Callback URL
	
	$gClient = new Google_Client();
	$gClient->setApplicationName('OAuth-Authorization');
	$gClient->setClientId($clientId);
	$gClient->setClientSecret($clientSecret);
	$gClient->setRedirectUri($redirectURL);
	$google_oauthV2 = new Google_Oauth2Service($gClient);
?>


