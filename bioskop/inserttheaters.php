<?php
	include "connect.php";

	$nama = $_POST['name'];
	$alamat = $_POST['address'];
	$telpon = $_POST['phone'];
	$kota = $_POST['city'];
	$hargabiasa = $_POST['pricew'];
	$hargaweekend = $_POST['pricee'];
	$latitude = $_POST['latitude'];
	$langitude = $_POST['langitude'];

	$sql = "INSERT INTO theater VALUES ('', '$nama', '$alamat', '$telpon', '$kota', $hargabiasa, $hargaweekend, '$latitude', '$langitude')";
	$result = mysql_query($sql);

	if ($result){
		header("Location: admintheaters.php");
	} else {
		header("Location: admintheaters.php?status=0");
	}
?>