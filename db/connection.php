<?php
$hostname="localhost";
$username="root";
$password="";
$conn=mysqli_connect($hostname,$username,$password,"db");
if(!$conn){
die(mysqli_connect_error());}
?>