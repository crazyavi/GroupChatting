<?php
session_start();
error_reporting(0);
$error = array();
?>
<html>
<head>
<link rel="stylesheet" href="css/main.css" >
<link rel="stylesheet" href="css/login.css" />
</head>
<body>
<?php
if(isset($_SESSION['email'])){ //login
	require('db/connection.php');
	require('general.php');
	 //if(isempty($_POST)){
	//$inputs=sanitise($conn,$_POST);
	//extract($inputs);
	$query="SELECT * FROM `chats` WHERE 1 ";
	$val = mysqli_query($conn, $query);
	$data = mysqli_fetch_all($val);
	//foreach($data as $c){
		//print_r($data);
	//}
	 if(!empty($_POST)){
	$b = $_POST['chat'];
	$query="INSERT INTO `chats` (name,chats) 
	 VALUES('{$_SESSION['email']}','{$b}')";

	if(!mysqli_query($conn,$query)){
		$error[] = "Error Inserting info";
	}
	else{
		header("Location:chatting.php");
	 }
	}
 } $error[]= "Please log in";
	require("html/chats.html");
 ?>
</body>
</html>