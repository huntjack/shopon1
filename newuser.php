
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

  $tname = test_input($_POST["name"]);

  $tphone = test_input($_POST["phone"]);
  		
if($temail != "" && $tpassword != "" && $tname != "" && $tphone != ""){ //if fields are not empty
		$conn = new mysqli($hn, $un, $pw, $db);
		  $query  = "SELECT email FROM user where email = '$temail'";
		  	  $result = $conn->query($query);
  $rows = $result->num_rows;
   $query  = "SELECT phone FROM user where phone = '$tphone'";
          $result = $conn->query($query);
  $rows1 = $result->num_rows;
  if($rows == 0 && $rows1 == 0){
              $query = "insert into user values('$temail','$tpassword', '$tname', '$tphone','user','')";        
  $result = $conn->query($query);
  if(!$result){
  echo "Insert failed : ".$conn->error;
}else{
  echo "<script> window.location.assign('index1.php'); </script>";
}


    }
    else{
    echo "This email/phone is already in use";
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
  <h2>Enter your details to register</h2>

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
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
     <div class="form-group">
      <label >Phone:</label>
      <input type="Phone" class="form-control" id="phoneno" placeholder="Enter contact number" name="phone">
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>



</body>
</html>