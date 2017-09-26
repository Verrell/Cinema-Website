<?php
		session_start();
		$user = $_SESSION['user'];
		$studio = $_SESSION['studio'];
  		$pemutaran = $_SESSION['pemutaran'];
  		$iduser = $_SESSION['iduser'];
		
		$conn = mysqli_connect("lkmm-td.petra.ac.id","lkmmtd","kapokmukapan","lkmmtd_bioskop");
			$abc = mysqli_query($conn, "SELECT idjadwal, idtheater FROM pemutaran WHERE id = ".$pemutaran);
			$def = mysqli_fetch_assoc($abc);

			$ghi = mysqli_query($conn, "SELECT hari FROM jadwal WHERE id = ".$def['idjadwal']);
			$jkl = mysqli_fetch_array($ghi);

			$mno = mysqli_query($conn, "SELECT hargabiasa, hargaweekend FROM theater WHERE id = ".$def['idtheater']);
			$pqr = mysqli_fetch_array($mno);

				$sql = "SELECT * from kursi where idstudio = ".$studio;
				$result = mysqli_query($conn, $sql);
				$count = 0;
				
				echo "<center><table style='margin-left : 17px; margin-top : 50px';";
				while($row = mysqli_fetch_array($result)){	
				
					if($count%10==0){
					
						echo "<tr>";
					}

					$kueri = mysqli_query($conn, "SELECT COUNT(*) AS jumlah FROM pemesanan WHERE idkursi = ".$row['id']." AND idpemutaran = ".$pemutaran);
					$fets = mysqli_fetch_assoc($kueri);

					$res = mysqli_query($conn, "SELECT iduser FROM kursitemp WHERE idkursi = ".$row['id']." AND idpemutaran = ".$pemutaran);
					$something = mysqli_fetch_assoc($res);

						if (mysqli_num_rows($res) >= 1){
							echo "<td style='border-style : solid;
			border-width : medium;' id='".$row['id']."'>";
				?>
							<button type="button" class="btn btn-warning form-control" onclick="cekkursi(2, '<?php echo $row['id']; ?>', '<?php echo $iduser; ?>', '<?php echo $something['iduser']; ?>');cekharga(2, '<?php echo $jkl['hari']; ?>', <?php echo $pqr['hargabiasa']; ?>, <?php echo $pqr['hargaweekend']; ?>, '<?php echo $iduser; ?>', '<?php echo $something['iduser']; ?>');"><? echo $row['kode']; ?></button></td>
				<?php
							echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
						} else if($fets['jumlah'] < 1){
							echo "<td style='border-style : solid;
			border-width : medium;' id='".$row['id']."'>";
				?>
							<button type="button" class="btn btn-success form-control" onclick="cekkursi(0, '<?php echo $row['id']; ?>', '<?php echo $iduser; ?>', '<?php echo $something['iduser']; ?>');cekharga(0, '<?php echo $jkl['hari']; ?>', <?php echo $pqr['hargabiasa']; ?>, <?php echo $pqr['hargaweekend']; ?>, '<?php echo $iduser; ?>', '<?php echo $something['iduser']; ?>');"><? echo $row['kode']; ?></button></td>
				<?php
							echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
						}
						else if ($fets['jumlah'] >= 1){
							echo "<td style='border-style : solid;
			border-width : medium;' id='".$row['id']."'>";
				?>
							<button type="button" class="btn btn-danger form-control" onclick="cekkursi(1, '<?php echo $row['id']; ?>', '<?php echo $iduser; ?>', '<?php echo $something['iduser']; ?>')"><?php echo $row['kode']; ?></button></td>
        <?php
              echo "<td>   </td>";
            }
				
					$count = $count + 1;
					if($count%10==0)
					{
						echo "</tr>";
						echo "<tr><td>&nbsp;</td></tr>";
						
					}
					
				
			}
			echo "</table></center>";
			
	?>