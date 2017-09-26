<?php
include "connect.php";
$key=$_GET['key'];
$field=$_GET['field'];
$sql = "SELECT * FROM user where $field like '%$key%'";
$result = mysql_query($sql);
$news = array();
while($row=mysql_fetch_array($result))
{
	array_push($news, array(		
		'id' => "$row[0]",
		'email' => "$row[1]",
		'name' => "$row[2]",
		'username' => "$row[3]",
		'gender' => "$row[5]",
		'phone' => "$row[6]",
		'status' => "$row[7]"
		)
	);
}
header('Content-Type:text/json');
echo json_encode($news);
?>