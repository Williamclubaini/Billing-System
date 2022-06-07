<?php

if (phpversion() > 8)
{
	if(CONFIG['environment'] == 'development'){
		error_reporting(E_ALL);

	} elseif (CONFIG['environment'] == 'production') {
		error_reporting(0);

	} else {
		require('views/404/404.php');
	}
} else 
{
		$info = "Your system is running an old version of PHP: ".phpversion().". 
				The application requires at least PHP 8.0.0 or greater version.";
		echo $info;
		exit();
}
?>