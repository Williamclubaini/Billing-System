<?php

if(isset($_GET['logout']))
{
	sleep(2);
	unset($_SESSION['user']);
	header("location:index.php?page=login");	
}

?>