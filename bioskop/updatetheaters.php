<?php
	include "connect.php";

	$id = $_POST['id'];
	$nama = $_POST['name'];
	$alamat = $_POST['address'];
	$telpon = $_POST['phone'];
	$kota = $_POST['city'];
	$hargabiasa = $_POST['pricew'];
	$hargaweekend = $_POST['pricee'];
	$latitude = $_POST['latitude'];
	$langitude = $_POST['langitude'];

	$sql = "UPDATE theater SET nama = '$nama', alamat = '$alamat', telpon = '$telpon', kota = '$kota', hargabiasa = $hargabiasa, hargaweekend = $hargaweekend, latitude = $latitude, langitude = $langitude WHERE id = $id";
	$result = mysql_query($sql);

	if ($result){
		header("Location: admintheaters.php");
	} else {
		header("Location: edittheaters.php?status=0");
	}
?>