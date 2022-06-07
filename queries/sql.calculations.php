<?php
declare(strict_types = 1);

namespace Queries;

trait Calculations { 
	
	public function countAll(string $table):string
	{
		$query = 'SELECT Count(*) AS numberOfRecords FROM `'.$table.'`';
		return $query;
	} 

	public function countAllWhere(string $table, string $column):string
	{
		$query = 'SELECT Count(*) AS numberOfRecords FROM `'.$table.'` WHERE '.$column.' = ?';
		return $query;
	}
		
	public function columnSummation(string $column, string $table):string
	{
		$query = 'SELECT SUM('.$column.') AS columnSum FROM `'.$table.'`';
		return $query;
	}

	public function countWhereAndWhere(string $table, string $column1, string $column2)
	{
		$query = 'SELECT Count(*) AS numberOfRecords FROM `'.$table.'` WHERE '.$column1.' = ? AND '.$column2.' = ?';
		return $query;
	}
}
?>