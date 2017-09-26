<?php
	include "connect.php";

	$id = $_GET['id'];

	$sql = "DELETE FROM jadwal WHERE id = ".$id;
	$result = mysql_query($sql);

	if ($result){
		header("Location: adminjadwal.php");
	} else {
		header("Location: adminjadwal.php?status=1");
	}
?>