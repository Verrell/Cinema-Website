<?php
	include "connect.php";

	$id = $_GET['id'];

	$sql = "DELETE FROM theater WHERE id = $id";
	$result = mysql_query($sql);

	if ($result){
		header("Location: admintheaters.php");
	} else {
		header("Location: admintheaters.php?status=1");
	}
?>