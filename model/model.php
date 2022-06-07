<?php 
declare(strict_types = 1);

namespace Model;

use PDO;
use System\Connection;

class Model extends Connection {

	use \Queries\CRUD;
	use \Queries\calculations; 

	
	public function runQuery(string $query, array|int $mixed = NULL, int $fetchMode = PDO::FETCH_OBJ)
	{
		if($mixed == NULL) {

			return $this->executeQuery($query, NULL, $fetchMode);

		} elseif (gettype($mixed) == 'array') {

			return $this->executeQuery($query, $mixed, $fetchMode);

		} elseif (gettype($mixed) == 'integer') {

			return $this->executeQuery($query, NULL, $mixed);
		}
	} 

	public function executeQuery(string $query, array $data = NULL, int $fetchMode):Array
	{
		$sql = $this->dbConnection()->prepare($query);

		if (!empty($data)) {

			$sql->execute($data);
			$data = $sql->fetchAll($fetchMode);
			return $data;
		
		} else {

		    $sql->execute();
		    $databaseData  = $sql->fetchAll($fetchMode);
		    return $databaseData;
		}
	}

		
	/**
	 * execute queries
	 *
	 * @param  string $query
	 * @param  array $data
	 * @return void
	 */
	public function execute(string $query, array $data = NULL)
	{
		$sql = $this->dbConnection()->prepare($query);

		if (!empty($data)) {

			$sql->execute($data);
		
		} else {

		    $sql->execute();
		}
	}
}