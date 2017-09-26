<?php
include "connect.php";
$key=$_GET['key'];
$field=$_GET['field'];
$sql = "SELECT * FROM theater where $field like '%$key%'";
$result = mysql_query($sql);
$news = array();
while($row=mysql_fetch_array($result))
{
	array_push($news, array(		
		'id' => "$row[0]",
		'nama' => "$row[1]",
		'alamat' => "$row[2]",
		'kota' => "$row[4]",
		'telpon' => "$row[3]",
		'hargab' => "$row[5]",
		'hargaw' => "$row[6]"
		)
	);
}
header('Content-Type:text/json');
echo json_encode($news);
?>