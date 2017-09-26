<?php
	include "connect.php";

	$kota = $_GET['kota'];

	if (isset($_GET['film']) && isset($_GET['jadwal'])){
		$film = $_GET['film'];
		$jadwal = $_GET['jadwal'];

		echo "<table class='table table-striped'>
	          <thead>
	            <tr>
	              <th>Nama</th>
	              <th>Kota</th>
	            </tr>
	          </thead>
	          <tbody>";

	    	if ($kota == "All"){
	          	$sql = "SELECT * FROM theater";
	    		$result = mysql_query($sql);
	        } else {
	    		$sql = "SELECT * FROM theater WHERE kota = '".$kota."'";
	    		$result = mysql_query($sql);
	    	}

	    		while ($row = mysql_fetch_array($result)){
	    			$kueri = mysql_query("SELECT COUNT(*) AS jumlah FROM pemutaran WHERE idtheater = ".$row['id']." AND idfilm = ".$film." AND idjadwal = ".$jadwal);
	    			$fets = mysql_fetch_assoc($kueri);

	    			if ($fets['jumlah'] >= 1){
		    			echo "<tr>
		    					<td><a href='setpemutaran.php?theater=".$row['id']."&film=".$film."&jadwal=".$jadwal."'>".$row['nama']."</a></td>
		    					<td>".$row['kota']."</td>
		    				</tr>";
		    		}
	    		}
	    echo "</tbody>
	        </table>";
	} else {
		echo "<table class='table table-striped'>
	          <thead>
	            <tr>
	              <th>Nama</th>
	              <th>Kota</th>
	            </tr>
	          </thead>
	          <tbody>";

	        if ($kota == "All"){
	          	$sql = "SELECT * FROM theater";
	    		$result = mysql_query($sql);
	        } else {
	    		$sql = "SELECT * FROM theater WHERE kota = '".$kota."'";
	    		$result = mysql_query($sql);
	    	}

	    		while ($row = mysql_fetch_array($result)){
		    		echo "<tr>
		    				<td><a href='detailtheaters.php?id=".$row['id']."'>".$row['nama']."</a></td>
		    				<td>".$row['kota']."</td>
		    			</tr>";
	    		}
	    echo "</tbody>
	        </table>";
	}
?>