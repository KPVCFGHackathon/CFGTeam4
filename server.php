<?php

include_once './Connect.php';

session_start();
$obj=new Connect();
$conn= $obj->connect();
$errors=array();
if(isset($_POST['register'])){
	if(empty($_POST['username']))
		array_push($errors, "username required");
	if(empty($_POST['email']))
		array_push($errors, "email required");
	if(empty($_POST['password_1']))
		array_push($errors, "password required");
	if($_POST['password_1']!=$_POST['password_2'])
		array_push($errors, "Passwords do not match eachother");
	if(count($errors)==0){
		$pass=md5($_POST['password_1']);
		$result=$conn->prepare("INSERT INTO `login` (`UID`, `username`, `email`, `password`)
			VALUES (NULL, :usrn, :email, :pass)");
		$result->bindparam(':usrn',$_POST['username'],PDO::PARAM_STR);
		$result->bindparam(':email',$_POST['email'],PDO::PARAM_STR);
		$result->bindparam(':pass',$pass,PDO::PARAM_INT);
		$result->execute();

		$_SESSION["username"]=$_POST["username"];
		$_SESSION["success"]="LOG IN SUCCESSFUL";
		header('Location:sample.php');
	}
}

if(isset($_POST['login'])){
	if(empty($_POST['username']))
		array_push($errors, "empty field");
	if(empty($_POST['password']))
		array_push($errors, "empty field");
	if(count($errors)==0){
		$pass=md5($_POST['password']);
		$name=$_POST['username'];
		$result=$conn->query("SELECT * from `login` WHERE username='$name' AND password='$pass'");
		if(count($result)==1){
			$_SESSION['username']=$_POST['username'];
			$_SESSION['success']="LOG IN SUCCESSFUL";
			header('Location:sample.php');

		}
		else{
			array_push($errors, "WRONG CREDENTIALS");
		}
	}
}

?>