<?php
require('html/register.html');
//session_start();
if(isset($_POST['submit'])){
     require('db/connection.php');
	 require('general.php');
	 if(isempty($_POST)){
	$inputs=sanitise($conn,$_POST);
	extract($inputs);
	if(notexist($conn,$email)){
		//else{
	$a=$_POST['name'];
	$b=$_POST['address'];
	$c=$_POST['email'];
	$d=$_POST['mobile'];
	$e=$_POST['password'];
	 $query="INSERT INTO `users` (name,address,email,mobile,password)
	 values ('{$a}','{$b}','{$c}',{$d},'{$e}')";
	 $val=mysqli_query($conn,$query);
	// $data=mysqli_fetch_array($val);
	 if($val){
		// if(($name == $data['name']) && ($address == $data['address']) && ($email == $data['email']) && ($mobile == $data['mobile']) && ($password == $data['password'])){
			
		
		echo "succssfully submittion!!!";
		//header("Location:home.php"); 
		}
	 else{
			echo "error while submitting form";
	 }
	}
		else {echo "email already exits";}}
	else{
	 echo "All fields are required";
	 }
	 }
		?>