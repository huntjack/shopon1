<?php
$q = $_REQUEST["q"];
$query = "select * from product where name like '$q%'";
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
  $result = $conn->query($query);
  $rows = $result->num_rows;
  if($q == ''){
  	echo "Enter something";
  	return;
  }
  
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