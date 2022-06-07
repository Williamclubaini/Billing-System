<?php 
declare(strict_types = 1);

namespace Controllers;
use System\Controller;
use Model\Model;

class Resources extends Controller{

    /**
    * Model
    *
    * @return Object
    */
   protected function Model()
   {
       return new Model();
   }
   
   protected function user($table, $value) 
   {
       $query = $this->Model()->selectLimit($table, $value);
       return $this->Model()->runQuery($query);
   }
   /**
    * getData - get data from any table plus limit data
    *
    * @param  string|array $value
    * @return array
    */
   protected function getData($value)
   {
       if(gettype($value) === 'array'){

           $query = $this->Model()->selectLimit($value[0], $value[1]);
           
       } else {

           $query = $this->Model()->select($value);
       }

       return $this->Model()->runQuery($query);
   }
   
   /**
    * getSpecificData - getting data with where clause
    *
    * @param  string $table
    * @param  string $column_name
    * @param  string|int $value
    * @return array
    */
   protected function getSpecificData($table, $column_name, $value)
   {
       $query = $this->Model()->selectWhere($table, $column_name);
       return $this->Model()->runQuery($query, [$value]);
   }
   
   /**
    * countAllRecords
    *
    * @param  string $table
    * @return array
    */
   protected function countAllRecords($table)
   {
       $query = $this->Model()->countAll($table);
       return $this->Model()->runQuery($query);
   }
      
   /**
    * countRecords
    *
    * @param  string $table
    * @param  string $column_name
    * @param  int $value
    * @return array
    */
   protected function countRecords($table, $column_name, $value)
   {
       $query = $this->Model()->countAllWhere($table, $column_name);
       return $this->Model()->runQuery($query, [$value]);
   }
   
   /**
    * SWDWC - select with double where clause
    *
    * @param  string $table
    * @param  string $column1
    * @param  string $column2
    * @param  array $value
    * @return array
    */
   protected function SWDWC($table, $column1, $column2, $value)
   {
       $query = $this->Model()->selectWhereAndWhere($table, $column1, $column2);
       return $this->Model()->runQuery($query, $value);
   }
   
   /**
    * countRecords2
    *
    * @param  string $table
    * @param  string $column1
    * @param  string $column2
    * @param  int $value
    * @return array
    */
   protected function countRecords2($table, $column1, $column2, $value)
   {
       $query = $this->Model()->countWhereAndWhere($table, $column1, $column2);
       return $this->Model()->runQuery($query, $value);
   }

    
}