<?php
$connection = new mysqli("localhost","root","","patient_db");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}