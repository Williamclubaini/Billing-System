<?php

$page = $_GET['page'] ?? 'login';
const URL = 'index.php?page=';
require 'system/controller.php';

use System\Controller;
use function System\files;

files();

if (file_exists('controllers/'.$page.'.php'))
{    
    require 'controllers/'.$page.'.php';

} else {

    Controller::Error($page);
}

// namespace
$class = 'Controllers\\'.$page;

$render = new $class();
$render->Document();

?>