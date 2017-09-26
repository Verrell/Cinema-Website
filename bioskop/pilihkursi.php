<?php
	session_start();
	include "connect.php";
	$user = $_SESSION['user'];
	$studio = $_SESSION['studio'];
  	$pemutaran = $_SESSION['pemutaran'];
  	$iduser = $_SESSION['iduser'];


	$abc = mysql_query("SELECT idjadwal, idtheater FROM pemutaran WHERE id = ".$pemutaran);
	$def = mysql_fetch_assoc($abc);

	$ghi = mysql_query("SELECT hari FROM jadwal WHERE id = ".$def['idjadwal']);
	$jkl = mysql_fetch_array($ghi);

	$mno = mysql_query("SELECT hargabiasa, hargaweekend FROM theater WHERE id = ".$def['idtheater']);
	$pqr = mysql_fetch_array($mno);

	$status = $_GET['status'];
	$id = $_GET['id'];

	$fets = mysql_query("SELECT kode FROM kursi WHERE id = ".$id);
	$row = mysql_fetch_assoc($fets);

	if ($status == 0){
		$sql = "INSERT INTO kursitemp VALUES ('', ".$id.", ".$pemutaran.", ".$iduser.")";
		$result = mysql_query($sql);

		$res = mysql_query("SELECT iduser FROM kursitemp WHERE idkursi = ".$id." AND idpemutaran = ".$pemutaran);
		$something = mysql_fetch_assoc($res);
	?>
		<button type="button" class="btn btn-warning form-control" onclick="cekkursi(2, '<?php echo $id; ?>', '<?php echo $iduser; ?>', '<?php echo $something['iduser']; ?>');cekharga(2, '<?php echo $jkl['hari']; ?>', <?php echo $pqr['hargabiasa']; ?>, <?php echo $pqr['hargaweekend']; ?>, '<?php echo $iduser; ?>', '<?php echo $something['iduser']; ?>');"><?php echo $row['kode']; ?></button>
	<?php
	} else if ($status == 2){
		$sql = "DELETE FROM kursitemp WHERE idkursi = ".$id." AND idpemutaran = ".$pemutaran." AND iduser = ".$iduser;
		$result = mysql_query($sql);
	?>
		<button type="button" class="btn btn-success form-control" onclick="cekkursi(0, '<?php echo $id; ?>', '<?php echo $iduser; ?>', '<?php echo $something['iduser']; ?>');cekharga(0, '<?php echo $jkl['hari']; ?>', <?php echo $pqr['hargabiasa']; ?>, <?php echo $pqr['hargaweekend']; ?>, '<?php echo $iduser; ?>', '<?php echo $something['iduser']; ?>');"><?php echo $row['kode']; ?></button>
	<?php
	}
?>