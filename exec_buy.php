<?php
session_start();
if(!isset($_SESSION["email"])){
	echo "<script> window.location.assign('index1.php'); </script>";
}
echo "jhgj";
$q = $_REQUEST["q"];
$uid = $_SESSION["id"];
echo $uid;
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
		  $query  = "SELECT qty FROM product where pid = '$q'";
		  	  $result = $conn->query($query);
  $rows = $result->num_rows;
  
    $result->data_seek(0);                                              
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $pqty = $row['qty'];
echo "quantiy";
echo $pqty;
if($pqty == 0){
	echo "Not available. Please try later";
	return;
}



 $query  = "call my_procedure($q,$uid)";
		  	  $result = $conn->query($query);


?>