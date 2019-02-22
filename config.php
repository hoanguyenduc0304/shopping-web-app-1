<?php
$host = "localhost";
$dbname = 'mylab';
$user = "root";
$pass = "secret";
$charset = 'utf8'; 

$conn = new mysqli($host,$user,$pass,$dbname);
mysqli_set_charset($conn, 'UTF8');
$conn1 = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $pass);
$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>