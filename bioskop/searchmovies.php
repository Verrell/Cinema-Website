<?php
include 'connect.php';
$title=$_POST['title'];
$sql = "SELECT * FROM film where title like '%$title%'";
$result = mysql_query($sql);
while($row=mysql_fetch_array($result)){
  echo "
  <a href='sinopsis.php?id=".$row[0]."'>".$row[1]."</a><br>";
}
exit();
?>