<?php
	include "connect.php";

	$theater = $_POST['theater'];
	$studio = $_POST['studio'];
	$film = $_POST['film'];
	$jadwal = $_POST['jadwal'];

	$sql = "INSERT INTO pemutaran VALUES ('', ".$theater.", ".$studio.", ".$film.", ".$jadwal.")";
	$result = mysql_query($sql);

	if ($result){
		header("Location: adminpemutaran.php");
	} else {
		header("Location: adminpemutaran.php?status=0");
	}
?>