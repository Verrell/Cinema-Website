<?php
	include "connect.php";
    $title = $_POST['title'];
	$about = $_POST['about'];
    $sql = "insert into news values ('','$title','$about')";
    $result = mysql_query($sql);
?>