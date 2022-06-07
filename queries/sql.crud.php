<?php
declare(strict_types = 1);

namespace Queries;

trait CRUD { 

	/**
	*
	*@Written By 
	*William C. Lubaini
	*Date::12/31/2021 
	* 
	**/ 
	private $columnValues = [];

	public function select(string $table)
	{
		$query = 'SELECT * FROM `'.$table.'`';
		return $query;
	}
	
	public function selectWhere(string $table, string $column)
	{
		$query = 'SELECT * FROM `'.$table.'` WHERE '.$column.' = ?';
		return $query;
	}

	public function selectWhereAndWhere(string $table, string $column1, string $column2)
	{
		$query = 'SELECT * FROM `'.$table.'` WHERE '.$column1.' = ? AND '.$column2.' = ?';
		return $query;
	}

	public function deleteWhere(string $table, string $column)
	{
		$query = 'DELETE FROM `'.$table.'` WHERE '.$column.' = ?';
		return $query;
	}

	public function selectLimit(string $table, int $int)
	{
		$query = 'SELECT * FROM `'.$table.'` LIMIT '.$int;
		return $query;
	}

	public function selectAllLimitOffset(string $table, int $limit, int $offset)
	{
		$query = 'SELECT * FROM `'.$table.'` LIMIT '.$limit.' OFFSET '.$offset;
		return $query;
	}

	public function deleteAll(string $table)
	{
		$query = 'TRUNCATE '.CONFIG['database'].'.'.$table;
		return $query;
	}

	public function insertInto(string $table, array $columns)
	{
		$columNum = count($columns);
		$values = array_fill(intval(0), $columNum, "?");
		$query  = 'INSERT INTO `'.$table.'`('.implode(', ', $columns).') 
		           VALUES('.implode(', ', $values).')';
		return $query;
	}

	public function update(string $table, array $columns, string $column)
	{
		foreach ($columns as $cols) {
                    array_push($this->columnValues, $cols.' = ?');
                }        
        $query = 'UPDATE `'.$table.'` SET '.implode(', ', $this->columnValues).' 
                  WHERE '.$column.' = ?';
        return $query;
	}

	public function UWDW(string $table, array $columns, string $column, string $column2)
	{
		foreach ($columns as $cols) {
                    array_push($this->columnValues, $cols.' = ?');
                }        
        $query = 'UPDATE `'.$table.'` SET '.implode(', ', $this->columnValues).' 
                  WHERE '.$column.' = ? AND '.$column2.' = ?';
        return $query;
	}
}