<?php 
declare(strict_types = 1);

namespace System;

function files() {	

	require 'configurations/config.php';
	require 'system/error_centre.php';
	require 'system/connection.php';
	require 'validations/validations.php';
	require 'queries/sql.crud.php';
	require 'queries/sql.calculations.php';
	require 'model/model.php'; 
	require 'controllers/resources.php';
	require 'controllers/user.php';
}


class Controller {

	public static function Page(string $page)
	{
		if (!file_exists('controllers/'.$page.'.php'))
		{    
			self::Error($page);

	    } else {

		    require 'controllers/'.$page.'.php';
	    }
	}

	public static function Error(string $page = NULL)
	{
		require 'views/404/404.php';
	}

	public function view(string $page, array|object $data = NULL, array|object $mixed = NULL)
	{
		if (!file_exists($page.'.php')) {
			return require 'views/404/404.php';

		} else {
			return require $page.'.php';
		}
	}

	public function start_session($userType, $email, $page)
	{
		session_start();
		if ($userType === 1) {
			$_SESSION['user'] = $email;
		} else {
			$_SESSION['admin'] = $email;
		}
		header("location:index.php?page=$page");
	}

	public function redirectPage(string $page)
	{
		header("location:index.php?page=$page");
	}
}