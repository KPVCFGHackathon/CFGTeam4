<?php
include_once './Connect.php';

// session_start();
$obj=new Connect();
$conn= $obj->connect();
$errors=array();
if(isset($_POST['post_it'])){
	if(empty($_POST['postdata']))
		array_push($errors, "Nothing To Post");
	
	 if(count($errors)==0){
		$result=$conn->prepare("INSERT INTO `posts` (`UID`, `postid`, `postdata`, `clicks`, `posttime`) VALUES (:uid, NULL, :pstdat, 0, NOW())");
		$result->bindparam(':uid',$_POST['userid'],PDO::PARAM_STR);
		$result->bindparam(':pstdat',$_POST['postdata'],PDO::PARAM_STR);
		$result->execute();
		// header('Location:sample.php');
	 }
}
?>