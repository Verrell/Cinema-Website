<?php
include "connect.php";
$key=$_GET['key'];
$field=$_GET['field'];
$sql = "SELECT * FROM film where $field like '%$key%'";
$result = mysql_query($sql);
$news = array();
while($row=mysql_fetch_array($result))
{
	array_push($news, array(		
		'id' => "$row[0]",
		'poster' => "$row[13]",
		'title' => "$row[1]",
		'duration' => "$row[2]",
		'status' => "$row[14]"
		)
	);
}
header('Content-Type:text/json');
echo json_encode($news);
?>