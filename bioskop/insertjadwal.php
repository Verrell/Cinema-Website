<?php
	include "connect.php";

	$tanggal = $_POST['tanggal'];
	$hari = $_POST['hari'];
	$jam = $_POST['jam'];

	$sql = "INSERT INTO jadwal VALUES ('', '".$tanggal."', '".$hari."', '".$jam."')";
	$result = mysql_query($sql);

	if ($result){
		header("Location: adminjadwal.php");
	} else {
		header("Location: adminjadwal.php?status=0");
	}
?>