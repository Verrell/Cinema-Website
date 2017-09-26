<?php
	include "connect.php";

	$title = $_POST['title'];
	$synopsis = $_POST['synopsis'];
	$duration = $_POST['duration'];
	$genre = $_POST['genre'];
	$release = $_POST['release'];
	$producer = $_POST['producer'];
	$director = $_POST['director'];
	$writer = $_POST['writer'];
	$production = $_POST['production'];
	$imdb = $_POST['imdb'];
	$status = $_POST['status'];
	$cast = $_POST['cast'];
	$trailer = $_POST['trailer'];
	$tayang = $_POST['tayang'];

	$target_dir = "dummy/";
	$target_file = $target_dir . basename($_FILES["poster"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	} else {
	    if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file)){
	    	$gambar = basename($_FILES["poster"]["name"]);
	        $sql = "INSERT INTO film VALUES ('', '".$title."', ".$duration.", ".$genre.", '".$release."', '".$producer."', '".$director."', '".$writer."', '".$production."', '".$cast."', '".$imdb."', '".$synopsis."', '".$trailer."', '".$gambar."', ".$status.", '".$tayang."')";
			$result = mysql_query($sql);

			if ($result){
				header("Location: adminmovies.php");
			} else {
				header("Location: adminmovies.php?status=0");
			}
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
?>