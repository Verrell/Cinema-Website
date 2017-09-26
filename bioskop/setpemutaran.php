<?php
	session_start();
	include "connect.php";

	$theater = $_GET['theater'];
	$film = $_GET['film'];
	$jadwal = $_GET['jadwal'];

	$sql = "SELECT id, idstudio FROM pemutaran WHERE idtheater = ".$theater." AND idfilm = ".$film." AND idjadwal = ".$jadwal;
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
	$_SESSION['pemutaran'] = $row['id'];
	$_SESSION['studio'] = $row['idstudio'];
	$_SESSION['jadwal'] = $jadwal;
	header("Location: seat.php?theater=".$theater."&film=".$film."&jadwal=".$jadwal);
?>