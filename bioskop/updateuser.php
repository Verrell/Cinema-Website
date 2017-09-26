<?php
	include 'connect.php';
	$id = $_GET['id'];
	$no = $_GET['no'];
	$row = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE id = ".$id));
	if ($row['status'] == 1){
		mysql_query("UPDATE user SET status = 0 WHERE id = $id");
		?>
		<button class="btn btn-danger" onclick="togglestatus('<?php echo $row['id']; ?>', '<?php echo $no; ?>')">Non Aktif</button> 
		<?php 
	} else {
		mysql_query("UPDATE user SET status = 1 WHERE id = $id");
		?>
		<button class="btn btn-success" onclick="togglestatus('<?php echo $row['id']; ?>', '<?php echo $no; ?>')">Aktif</button>
		<?php
	}
?>