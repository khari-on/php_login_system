<?php


$servername="localhost";
$username="root";
$password="";
$database="costomer";

$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("Not connected error - " . mysqli_error());
}

?>