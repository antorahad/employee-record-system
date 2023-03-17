<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'employeerecord';

$db = mysqli_connect($host, $user, $password, $dbname);

if($db){
    //echo "Connection successful";
}else{
    echo "Connection error!";
}
?>