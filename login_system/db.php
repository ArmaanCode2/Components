<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "mytube";

$conn = mysqli_connect($server,$username,$password,$database);
if(!$conn){
    die("error" . mysqli_connect_error());
}else{
    // echo 'ojchhdsbvyhcxv';
}
?>