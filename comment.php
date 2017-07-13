<?php
include_once './Connect.php';

// session_start();
$obj=new Connect();
$conn= $obj->connect();
$errors=array();
if(isset($_POST['comment_it'])){
	if(empty($_POST['commentdata']))
		array_push($errors, "Nothing To Comment");
	
	 if(count($errors)==0){
		$result=$conn->prepare("INSERT INTO `comments` (`postid`, `username`, `commentdata`) VALUES (:pid, NULL, :cmntdat)");
		$result->bindparam(':pid',$_POST['postid'],PDO::PARAM_INT);
		$result->bindparam(':cmntdat',$_POST['commentdata'],PDO::PARAM_STR);
		$result->execute();
		// header('Location:sample.php');
	 }
}
?>
