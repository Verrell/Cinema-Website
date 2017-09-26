<?php
	include "connect.php";
    $id = $_POST['id'];
    $sql = "delete from news where id=$id";
    $result = mysql_query($sql);
?>