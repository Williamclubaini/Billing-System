<?php
/**
*
* Written By William C. Lubaini
* Date:: 1/31/2022 
* 
**/ 
//--- Works With MySQL with PDO_MYSQL, MS SQL Server and Sybase with PDO_DBLIB---
$config['database_type'] = 'mysql';
$config['host']          = '127.0.0.1';
$config['database']      = 'billing_system';
$config['charset']       = 'utf8mb4';
$config['username']      = 'root';
$config['password']      = '';
$config['port']          = 3306;

/*
  ------- Working with Errors ---------
 There are development and production errors
 
 1.development - this is when the system is under development and shows errors for developers.
 2.production - this is when the system is developed and is complete and shows errors that are
                for users(user friendly errors).
 SET:
 $config['environment']   = 'development'; when still in development
 ------------ OR ------------------------
 $config['environment']   = 'production'; when the system is production

 */
$config['environment']   = 'production';

//array => $configurations
define('CONFIG', $config, FALSE);