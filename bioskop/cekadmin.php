<?php
	session_start();
	include "connect.php";

	$user = $_POST['username'];
	$pass = $_POST['password'];

	$sql = "SELECT COUNT(*) AS jumlah FROM admin WHERE username = '".$user."' AND password = '".$pass."'";
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);

	if ($row['jumlah'] >= 1){
		$_SESSION['user'] = $user;
		header("Location: dashboard.php");
	} else {
		header("Location: admin.php?status=0");
	}
?>