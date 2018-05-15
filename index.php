<?php
	session_start();
	if(isset($_SESSION['logincust']))
	{
		header('Location: Home.php');
	}
	else
	{
		session_unset();
	}
?>
<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<head>
		<title>Login with Google | Login</title>
	</head>
	<body>
            
            
            
            
            
            <div class="container">
    <div class="row" align="center" style="padding-top: 100px;">
        <div class="col-12">
                <h1 style="font-size: 50px; color: black; ">Social Login OAuth </h1> 
        </div>
    </div>
    <div class="row" align="center" style="padding-top: 20px;">
        <div class="col-12">
                <h2 style="font-size: 50px;"></h2>  
        </div>
    </div>
    <div class="row" align="center" style="padding-top: 5px;padding-bottom: 45px; font-size: 20px; color: black; ">
        <div class="col-12">
                <div class="anime">
                    K.K.Y.V.Samarawickrama : IT16547452
                </div>
                <div class="anime">
                    3 rd Year Cyber Security
                </div>  
        </div>
    </div>

</div>
            
            
            
            
		<?php
	// facebook login was not successfull blah
                //echo '<a href="loginG.php"><img src="images/loging.png" alt="Login with Google" width=222 align="center"></a><br>;
                echo '<a href="loginFB.php"><></a><br>';
			include_once 'loginG.php';
                        //include_once 'loginFB.php';
                if(isset($_GET['code'])){
				$gClient->authenticate($_GET['code']);
				$_SESSION['token'] = $gClient->getAccessToken();
				header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
			}
			if (isset($_SESSION['token'])) {
				$gClient->setAccessToken($_SESSION['token']);
			}
			if ($gClient->getAccessToken()) 
			{
				$gpUserProfile = $google_oauthV2->userinfo->get();
				$_SESSION['oauth_provider'] = 'Google'; 
				$_SESSION['oauth_uid'] = $gpUserProfile['id']; 
				$_SESSION['first_name'] = $gpUserProfile['given_name']; 
				$_SESSION['last_name'] = $gpUserProfile['family_name']; 
				$_SESSION['email'] = $gpUserProfile['email'];
				$_SESSION['logincust']='yes';
			} else {
				$authUrl = $gClient->createAuthUrl();
				$output= '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><center><img src="images/loging.png" alt="Sign in with Google+"  class="centerImage"   width=222/></center></a>';
			}
			echo $output;
		?>
	</body>
</html>
