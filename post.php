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
	 }
}

if(isset($_POST['get_post'])){  ///set this when clicked on the post
	$response;
	$userid=$_POST['userid'];
	$res=$conn->query("SELECT * from `posts` WHERE UID='$userid'");
	// if(!$res)
	// 	echo '<p>"No Posts"</p>';
	if(count($res)>0){
			foreach ($res as $posts)
			{ 
			 echo '
			 <div>	
			 <form action="comment.php" method="post"> 
			 	<input type="textarea" name="post_data" value="'.$posts['postdata'].'">
			 	<input type="number" name="post_id" value="'.$posts['postid'].'">
			 	<button type="submit" name="submit">More</button>
			 </form>	
			 </div>
			 <hr>';
			}
		}
}

?>