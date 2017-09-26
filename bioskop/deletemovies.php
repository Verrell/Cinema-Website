<?php
	include "connect.php";

	$id = $_GET['id'];

	$sql = "DELETE FROM film WHERE id = ".$id;
	$result = mysql_query($sql);

	if ($result){
		header("Location: adminmovies.php");
	} else {
		header("Location: adminmovies.php?status=1");
	}
?>