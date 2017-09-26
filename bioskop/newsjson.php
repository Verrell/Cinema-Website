<?php
include "connect.php";
$key=$_GET['key'];
$field=$_GET['field'];
$sql = "SELECT * FROM news where $field like '%$key%'";
$result = mysql_query($sql);
$news = array();
while($row=mysql_fetch_array($result))
{
	array_push($news, array(		
		'id' => "$row[0]",
		'title' => "$row[1]",
		'about' => "$row[2]"
		)
	);
}
header('Content-Type:text/json');
echo json_encode($news);
?>