<?php
	include 'connect.php';
	$id = $_GET['id'];
	$no = $_GET['no'];
	$row = mysql_fetch_array(mysql_query("SELECT * FROM pemesanan WHERE id = ".$id));
	if ($row['pembayaran'] == 1){
		mysql_query("UPDATE pemesanan SET pembayaran = 0 WHERE id = $id");
		?>
		<button class="btn btn-danger" onclick="togglebayar('<?php echo $row['id']; ?>', '<?php echo $no; ?>')">Belum</button> 
		<?php 
	} else {
		mysql_query("UPDATE pemesanan SET pembayaran = 1 WHERE id = $id");
		?>
		<button class="btn btn-success" onclick="togglebayar('<?php echo $row['id']; ?>', '<?php echo $no; ?>')">Sudah</button>
		<?php
	}
?>