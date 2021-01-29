<?php
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 
$dbname = "tekart";

$connect = new mysqli($servername, $username, $password, $dbname);

if ($connect->connect_error){
    die('Ошибка : ('. $connect->connect_errno .') '. $connect->connect_error);
}
?>