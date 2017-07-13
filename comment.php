<?php
include_once './Connect.php';

// session_start();
$obj=new Connect();
$conn= $obj->connect();
$errors=array();

if(isset($_POST['comment_it'])){
	// if(empty($_POST['commentdata']))
	// 	array_push($errors, "Nothing To Comment");
	
	 if(count($errors)==0){
		$result=$conn->prepare("INSERT INTO `comments` (`postid`, `username`, `commentdata`) VALUES (:pid, NULL, :cmntdat)");
		$result->bindparam(':pid',$_POST['postid'],PDO::PARAM_INT);
		$result->bindparam(':cmntdat',$_POST['commentdata'],PDO::PARAM_STR);
		$result->execute();
		// header('Location:sample.php');
	 }
}

if(isset($_POST['submit'])){
	$response;
	$postid=$_POST['postid'];
	echo '<p>"'.$_POST['postdata'].'"</p>';
	$res=$conn->query("SELECT * from `comments` WHERE postid='$postid'");
		if(count($res)>0){
			foreach ($res as $cmnts)
			{
			echo'
				<hr>
			   <div class="bootclass">	
				<p>"'.$cmnts['commentdata'].'"</p>
				</div>
				';
			}
			echo'
			<form action="comment.php" method="post"> 
			<input type="number" name="postid" value="'.$postid.'">
			<input type="textarea" name="commentdata" placeholder="Write Your Comment Here">
			<button type="submit" name="comment_it">COMMENT</button>
			</form>';

		}
		// else{
		// 	<p>"No comments to display"</p>;
		// }	
}
?>
