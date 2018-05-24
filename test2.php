
<!DOCTYPE html>

<html lang="en">

<head>
	<title>Shop on!</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style >

	</style>
</head>
<body >
		

	<div class="jumbotron text-center">
  <h1>ShopOn!</h1>
  <p>We got your needs</p> 
</div>
  
	<div class="container">
  <h2>Log In</h2>
  <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' class="form-inline">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
   
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
<div class="container" style=" margin-top: 50px;">
	<h1>New User?</h1>
	<button onclick="location.href = 'newuser.html';" id="myButton" class="float-left submit-button" >Create New Account</button>

</div>
<?php

echo "hiasdasdasdwefdascedaedfwaced";
?>

</body>
</html>