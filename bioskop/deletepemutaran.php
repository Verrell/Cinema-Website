<?php
	include "connect.php";

	$id = $_GET['id'];

	$sql = "DELETE FROM pemutaran WHERE id = ".$id;
	$result = mysql_query($sql);

	if ($result){
		header("Location: adminpemutaran.php");
	} else {
		header("Location: adminpemutaran.php?status=1");
	}
?>