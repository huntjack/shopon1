
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
<body>
<?php

$query = "call showall()";
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
    $row = $result->fetch_array(MYSQLI_ASSOC);

 

echo " <div class=\"col-sm-4\">";
  echo "<img  style=\"height:128px;\" src=\"".$row['image']."\"  ><br>"; 
   echo "<a href = \"prod_detail.php?q=".$row['pid']." \">";
   echo "Name : ".$row['name']."<br></a> Price : ".$row['price']."<br> Quantity : ".$row['qty']."<br>";
   echo "</div>";
}
echo "</div>";
}else
{
	echo "No results found";
	
}

?>
</body>