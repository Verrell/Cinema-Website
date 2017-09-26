<?php
  session_start();
  if (!isset($_SESSION['user'])){
    header("Location: admin.php");
  }

  include "connect.php";

  $sql = "SELECT * FROM pemesanan";
  $result = mysql_query($sql);
  $i = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Bioskop</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  

<link type="text/css" media="screen" rel="stylesheet" href="http://www.21cineplex.com/css/jquery.bxslider.css?v=2" />

  
  <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
  <link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script>
        function togglebayar(str, i) {
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
              document.getElementById("status"+i).innerHTML = xhttp.responseText;
            }
          };

          xhttp.open("GET", "updatepembayaran.php?id="+str+"&no="+i, true);
          xhttp.send();
        }
      </script>
    </head>
    <body>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img id="logo" height="100px" width="100px" src="images/logo.gif"></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
             <li><a href="dashboard.php">Home</a></li>
             <li><a href="adminmovies.php">Movies</a></li>
             <li><a href="admintheaters.php">Theaters</a></li>
             <li><a href="adminjadwal.php">Jadwal</a></li>
             <li><a href="adminpemutaran.php">Pemutaran</a></li>
              <li><a href="adminuser.php">User</a></li>
             <li class="active"><a href="adminpembayaran.php">Pembayaran</a></li>
             <li><a href="adminnews.php">News</a></li>
           </ul>
		    <ul class="nav navbar-nav navbar-right">
			   <li><a href="logoutadmin.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
			</ul>
         </div><!-- /.navbar-collapse -->
       </div><!-- /.container-fluid -->
     </nav>
     <div class="row">
       <div class="col-md-4">
       </div>
       <div class="col-md-4">
         Search by :
         <select>
           <option value="id">ID</option>
           <option value="title">Title</option>
         </select>
         <input type="text" name="keyword" placeholder="Keyword">
         <button type="submit" class="btn btn-primary" name="submit">Submit</button>
       </div>
    </div>
    <table style="margin-top: 2%; text-align: center" class="table table-stripped">
     <tr>
      <td>ID</td>
      <td>User</td>
      <td>Kursi</td>
      <td>Film</td>
      <td>Theater</td>
      <td>Jadwal</td>
      <td>Harga</td>
      <td>Status</td>
    </tr>
    <?php
      while ($row = mysql_fetch_array($result)){
        $sql2 = "SELECT kode FROM kursi WHERE id = ".$row['idkursi'];
        $result2 = mysql_query($sql2);
        $row2 = mysql_fetch_assoc($result2);

        $sql3 = "SELECT * FROM pemutaran WHERE id = ".$row['idpemutaran'];
        $result3 = mysql_query($sql3);
        $row3 = mysql_fetch_assoc($result3);

        $sql4 = "SELECT name FROM user WHERE id = ".$row['iduser'];
        $result4 = mysql_query($sql4);
        $row4 = mysql_fetch_assoc($result4);

        $sql5 = "SELECT title FROM film WHERE id = ".$row3['idfilm'];
        $result5 = mysql_query($sql5);
        $row5 = mysql_fetch_assoc($result5);

        $sql6 = "SELECT nama FROM theater WHERE id = ".$row3['idtheater'];
        $result6 = mysql_query($sql6);
        $row6 = mysql_fetch_assoc($result6);

        $sql7 = "SELECT * FROM jadwal WHERE id = ".$row3['idjadwal'];
        $result7 = mysql_query($sql7);
        $row7 = mysql_fetch_array($result7);

        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row4['name']."</td>
                <td>".$row2['kode']."</td>
                <td>".$row5['title']."</td>
                <td>".$row6['nama']."</td>
                <td>".$row7['hari'].", ".$row7['tanggal']." Pk. ".$row7['jam']."</td>
                <td>".$row['harga']."</td>";
    ?>
                <td id="<?php echo "status".$i; ?>"><?php
                if ($row['pembayaran'] == 1){
                  ?>
                  <button class="btn btn-success" onclick="togglebayar('<?php echo $row['id']; ?>', '<?php echo $i; ?>')">Sudah</button>
                  <?php 
                } else {
                  ?>
                  <button class="btn btn-danger" onclick="togglebayar('<?php echo $row['id']; ?>', '<?php echo $i; ?>')">Belum</button>
                  <?php
                }
              ?></td>
    <?php
            echo "<td><a href=''></a></td>
              </tr>";
            $i++;
      }
    ?>
  </table>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>