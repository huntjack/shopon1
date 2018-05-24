
<!DOCTYPE html>

<html lang="en">

<head>
	<title>Shop on!</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</head>
<body >


<?php
$flag = false;
$flag1 = false;
$temail = $tpassword  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once 'login.php';
  
  $temail = test_input($_POST["email"]);

  $tpassword = test_input($_POST["pwd"]);
  		
if($temail != "" && $tpassword != ""){ //if fields are not empty
		$conn = new mysqli($hn, $un, $pw, $db);
		  $query  = "SELECT * FROM user where email = '$temail'";
		  	  $result = $conn->query($query);
  $rows = $result->num_rows;
  
    $result->data_seek(0);                                              
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if($row['pass'] == $tpassword){
    	echo "success";\
    	session_start();
    	$_SESSION["email"] = $row['email'];
    	$_SESSION["name"] = $row['name'];
    	$_SESSION["id"] = $row['id'];
    	echo "<script> window.location.assign('home.php'); </script>";

    }else{

    	$flag1 = true;
    }
    
  
	

}
else{
	$flag = true;
}


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


	<div class="jumbotron text-center">
  <h1>ShopOn!</h1>
  <p>We got your needs</p> 
</div>
  
	<div class="container">
  <h2>Log In</h2>

<?php
if($flag){
	echo "Empty Fields";
}
if($flag1){
	echo "Invalid credentials";
}
?>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method= "post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
<div class="container" style=" margin-top: 50px;">
	<h1>New User?</h1>
	<button onclick="location.href = 'newuser.php';" id="myButton" class="float-left submit-button" >Create New Account</button>

</div>


</body>
</html>