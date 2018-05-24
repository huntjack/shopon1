<?php
session_start();

if(!isset($_SESSION["email"])){
	echo "<script> window.location.assign('index1.php'); </script>";
}
else{
	echo "yes variables";
	echo $_SESSION["email"];
}
$uid = $_SESSION["id"];

?>
<!DOCTYPE html>

<html lang="en">

<head>
	<title>Shop on!</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}
</style>
<body >

<div class="topnav">
  <a  href="home.php">Home</a>
  <a class="active" href="myorders.php">My Orders</a>
  <a href="#contact">Contact</a>
  <a href="sessdestroy.php" class="btn" role="button">Logout</a>
  <div class="search-container">
    <form >
      <input type="text" placeholder="Search.." name="search" id="txt1" onkeyup="showHint(this.value)">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>

	<div class="container" id = "top_stuff">
  <div class="page-header">
    <h1>Welcome <?php echo $_SESSION["name"]; ?>  
    	


    </h1>  

  </div>

</div>

<div class="container" id = "display_box">
	






<?php

$query = "select *,count(*) as total_qty from orders where id = '$uid' group by id,pid";
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
  $result = $conn->query($query);
  $rows = $result->num_rows;
  
  
  if($rows != 0){

     echo $rows." results found<br>";
    echo "<div class=\"row\">";
    for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row1 = $result->fetch_array(MYSQLI_ASSOC);
      $tpid = $row1['pid'];
  $query = "select * from product where pid = '$tpid'";
  $var1 = $conn->query($query);
  $var1->data_seek(0);
  $row = $var1->fetch_array(MYSQLI_ASSOC);
echo " <div class=\"col-sm-4\">";
  
  echo "<img  style=\"height:128px;\" src=\"".$row['image']."\"  ><br>"; 
  echo "<a href = \"prod_detail.php?q=".$row['pid']." \">";
   echo "Name : ".$row['name']."<br></a> Price : ".$row['price']."<br> Quantity : ".$row1['total_qty']."<br> Approved : ".$row1['status']."<br>";
   echo "</div>";
}
echo "</div>";

}else
{
  echo "No results found";
  
}


?>















	
	</div>
</body>



</html>