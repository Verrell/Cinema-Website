<?php
	include "connect.php";
	$theater = $_GET['theater'];
	echo "Studio:  <select name='studio'>
                   	<option>Pilih Studio:</option>";

                    $kueri2 = mysql_query("SELECT id, nama FROM studio WHERE idtheater = ".$theater);
                    while ($fets = mysql_fetch_array($kueri2)){
                         echo "<option value='".$fets['id']."'>".$fets['nama']."</option>";
                    }
    echo "</select><br>";
?>