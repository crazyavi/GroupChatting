<?php
function isempty($array){
	foreach($array as $a){
		if($a=="" || $a==null){
		return false;}
		else{
		return true;}
}
}
function sanitise($connect,$arr){
	$newArr = [];
	foreach($arr as $key => $val){
		$val = mysqli_real_escape_string($connect,$val);
		$newArr[$key] = htmlentities($val);
	}
return $newArr;
}
function notexist($connect,$email){
	$query="select * from `users` where `email`='{$email}' ";
		$val=mysqli_query($connect,$query);
	$data = mysqli_fetch_assoc($val);
	if((empty($data))){
		return true;
	}
else{return false;}}
	
?>