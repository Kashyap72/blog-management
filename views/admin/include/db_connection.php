<?php

$host = 'localhost'; 
$username = 'root'; 
$password = '';
$db_name = 'blog-management'; 

$conn = mysqli_connect($host, $username, $password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    // echo "priya";
}
?>
