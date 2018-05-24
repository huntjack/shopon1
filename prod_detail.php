<?php
session_start();
if(!isset($_SESSION["email"])){
  echo "<script> window.location.assign('index1.php'); </script>";
}
$q = $_REQUEST["q"];

echo $q;
$pid = $q;
require_once'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
		  $query  = "SELECT * FROM product where pid = '$pid'";
		  	  $result = $conn->query($query);
  $rows = $result->num_rows;
  
    $result->data_seek(0);                                              
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $pname = $row['name'];
    $pimage = $row['image'];
    $pprice = $row['price'];
    $pqty = $row['qty'];
print_r($_SESSION);
	
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
<script type="text/javascript">
    var Jpid = "<?php Print($pid); ?>";
    
</script>
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
<div id = "note"><p></p></div>

<div class="topnav">
  <a class="active" href="home.php">Home</a>
  <a href="myorders.php">My Orders</a>
  <a href="#contact">Contact</a>
  <a href="sessdestroy.php" class="btn" role="button">Logout</a>
  
</div>

<div class="page-header">
    <h1><?php echo $pname; ?> 
    </h1>  
</div>
<div class="container">
<div class="row">
	<div class="col-sm-4">
		<img style="width: 328px" src = " <?php   echo $pimage   ?>      ">
	</div>
	<div class="col-sm-8  text-info">
		<h3>Price : <?php echo $pprice; ?>/-</h3><br>
		Only <?php echo $pqty; ?> in stock. Hurry!<br>
		
  <button class="btn btn-default" onclick="myFunction()">Buy now</button>

<p id="demo"></p>

<script>
function myFunction() {
    document.getElementById("demo").innerHTML = "Hello World";
    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML += this.responseText;
    }
  };
  xhttp.open("GET", "exec_buy.php?q=" + Jpid , true);
  xhttp.send();
}
</script>

	</div>
</div>
</div>

</body>
</html>
