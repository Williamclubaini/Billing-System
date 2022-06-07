<?php 
declare(strict_types = 1);

namespace System;

use PDO;

class Connection {

    private $dsn;
    private $username;
    private $password;

	public function dbConnection()
	{
		$this->dsn      =  CONFIG['database_type'].
		                   ':host='.CONFIG['host'].
		                   ';dbname='.CONFIG['database'].
		                   ';charset='.CONFIG['charset'];
	
		$this->username = CONFIG['username'];
		$this->password = CONFIG['password'];

		return $this->newPDO($this->dsn, $this->username, $this->password);
	}

	public function newPDO(string $dsn, string $username, string $password)
	{
		try 
		{
			$object = new PDO($dsn, $username, $password);
			$object->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return  $object;

		} catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

}