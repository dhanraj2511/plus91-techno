<?php
/*$connection = new mysqli("localhost","root","","patient_db");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}*/
require_once "vendor/autoload.php";

use Doctrine\DBAL\DriverManager;
$connection = array(
    'dbname' => 'patient_db',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
);
$conn = \Doctrine\DBAL\DriverManager::getConnection($connection);
