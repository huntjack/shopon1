
<!DOCTYPE HTML>  
<html>
<head>

</head>
<body>  

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once 'login.php';
$name =  ($_POST["name"]);

$iurl =  ($_POST["iurl"]);

$price =  ($_POST["price"]);

$qty = ($_POST["qty"]);

$iloc = "C:\\xampp\htdocs\shopon\images\\".$name.".jpeg";
$vcx = "/shopon/images/".$name.".jpeg";
if($name != "" && $iurl != "" && $price != 0 && $qty != 0){
  
    $conn = new mysqli($hn, $un, $pw, $db);
      $query  = "insert into product values('','$name' , '$price' , '$vcx' , '$qty')";
          $result = $conn->query($query);
          echo $result;
          echo "In";
          echo "LCOCCCC ".$iloc;
$image = file_get_contents($iurl);
file_put_contents($iloc, $image);
}








}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Add product</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
   Name: <input type="text" name="name" >
 
  <br><br>
   Image Url: <input type="text" name="iurl" >
  
  Price: <input type="number" name="price" >

  Quantity: <input type="number" name="qty" >
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>



</body>
</html>