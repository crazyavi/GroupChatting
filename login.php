<?php
session_start();
if(isset($_SESSION['email'])){
	unset($_SESSION['email']);
}
if(isset($_POST['submit'])){
require('db/connection.php');
require('general.php');
$error=array();
if(isempty($_POST)){
	$inputs=sanitise($conn,$_POST);
	//print_r($input);
	extract($inputs);
	$query="select password from `users` where `email`='{$email}' ";
	$val=mysqli_query($conn, $query);
	$data = mysqli_fetch_assoc($val);
	if(!empty($data)){
		if($pas1 == $data['password']){
			$_SESSION['email'] = $email;
			//$msg = "Welcome";
			header("Location:chatting.php");	
		}else{
			$error[] = "Password not matched"; 
		}		
	}
	else{
		 $error[]="email not exits";
	}
}
else{
	$error[] ="All fields are required";
}
}
?>

<html>
<head>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php
require "html/header.html";

if(isset($error) && !empty($error)){
	print_r($error);
}
if(isset($msg)){
	//print $msg;
}
if(!isset($_SESSION['email'])){
	require "html/loginform.html";
}else
	print "<center><h1>Welcome</h1>";
require "html/footer.html";
?>
</body>
</html>