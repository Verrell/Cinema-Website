<?php
	sessioN_start();
	sessioN_destroy();
	header("Location: ".$_GET['hal']);
?>