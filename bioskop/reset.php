<?php
	session_start();
	include "connect.php";

  	$iduser = $_SESSION['iduser'];

	$sql = "DELETE FROM kursitemp WHERE iduser = ".$iduser;
	$result = mysql_query($sql);
	exit();
?>