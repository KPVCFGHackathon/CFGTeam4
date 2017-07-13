<?php
class Connect{
private $conn;
function construct(){

}

function connect(){
try{
$this->conn=new PDO('mysql:host=localhost;dbname=app','root','');
}
catch(PDOException $e){
print('Error'.$e->getmessage());
die();
}
return $this->conn;
}
}
?>