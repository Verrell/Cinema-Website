<?php
	include "connect.php";

	$id = $_POST['id'];
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

	if ($_FILES["poster"]["error"] == 4) {
		$sql = "UPDATE film SET rilis = '".$release."', producer = '".$producer."', director = '".$director."', writer = '".$writer."', production = '".$production."', cast = '".$cast."', imdb = '".$imdb."', sinopsis = '".$synopsis."', trailer = '".$trailer."', status = ".$status.", title = '".$title."', duration = ".$duration.", genre = ".$genre.", tayang = '".$tayang."' WHERE id = ".$id;
		$result = mysql_query($sql);

		if ($result){
			header("Location: adminmovies.php");
		} else {
			die(mysql_error());
		}
	} else {
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		} else {
		    if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file)){
		    	$gambar = basename($_FILES["poster"]["name"]);
		        $sql = "UPDATE film SET title = '$title', duration = $duration, genre = $genre, rilis = '$release', producer = '$producer', director = '$director', writer = '$writer', production = '$production', cast = '$cast', imdb = '$imdb', sinopsis = '$synopsis', trailer = '$trailer', status = $status, tayang = '$tayang', gambar = '$gambar' WHERE id = $id";
				$result = mysql_query($sql);

				if ($result){
					header("Location: adminmovies.php");
				} else {
					header("Location: editmovies.php?status=0");
				}
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
	}
?>