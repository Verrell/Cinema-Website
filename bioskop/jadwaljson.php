<?php
include "connect.php";
$key=$_GET['key'];
$field=$_GET['field'];
$sql = "SELECT * FROM jadwal where $field like '%$key%'";
$result = mysql_query($sql);
$news = array();
while($row=mysql_fetch_array($result))
{
	array_push($news, array(		
		'id' => "$row[0]",
		'tanggal' => "$row[1]",
		'hari' => "$row[2]",
		'jam' => "$row[3]"
		)
	);
}
header('Content-Type:text/json');
echo json_encode($news);
?>