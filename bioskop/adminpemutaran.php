<?php
  session_start();
  include "connect.php";
  if (!isset($_SESSION['user'])){
    header("Location: admin.php");
  }

  if (isset($_GET['status'])){
    if ($_GET['status'] == 0){
      echo "<script>alert('Insert data gagal...');</script>";
    } else if ($_GET['status'] == 1){
      echo "<script>alert('Delete data gagal...');</script>";
    }
  }

  $sql = "SELECT * FROM pemutaran";
  $result = mysql_query($sql);
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
        function tampil(x){
          if (x != "-"){
            document.getElementById("studio").style.display = "block";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("studio").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "temppemutaran.php?theater=" + x, true);
            xmlhttp.send();
          } else {
            document.getElementById("studio").style.display = "none";
          }
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
             <li class="active"><a href="adminpemutaran.php">Pemutaran</a></li>
              <li><a href="adminuser.php">User</a></li>
             <li><a href="adminpembayaran.php">Pembayaran</a></li>
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
       <div style="padding-left: 10%" class="col-md-3">
        <a href="#" data-toggle="modal" data-target="#myModal"><button type="submit" class="btn btn-primary" name="add">Add Pemutaran</button></a></li>
      </div>
    </div>
    <table style="margin-top: 2%; text-align: center" class="table table-stripped">
     <tr>
      <td>ID</td>
      <td>Theater</td>
      <td>Studio</td>
      <td>Film</td>
      <td>Jadwal</td>
      <td>Delete</td>
    </tr>

    <?php
      while ($row = mysql_fetch_array($result)){
        echo "<tr>
                <td>".$row['id']."</td>";
            $sql2 = "SELECT nama FROM theater WHERE id = ".$row['idtheater'];
            $result2 = mysql_query($sql2);
            $row2 = mysql_fetch_array($result2);
          echo "<td>".$row2['nama']."</td>";

            $sql3 = "SELECT nama FROM studio WHERE id = ".$row['idstudio'];
            $result3 = mysql_query($sql3);
            $row3 = mysql_fetch_array($result3);
          echo "<td>".$row3['nama']."</td>";

            $sql4 = "SELECT title FROM film WHERE id = ".$row['idfilm'];
            $result4 = mysql_query($sql4);
            $row4 = mysql_fetch_array($result4);
          echo "<td>".$row4['title']."</td>";

            $sql5 = "SELECT * FROM jadwal WHERE id = ".$row['idjadwal'];
            $result5 = mysql_query($sql5);
            $row5 = mysql_fetch_array($result5);
          echo "<td>".$row5['hari'].", ".$row5['tanggal']." Pk. ".$row5['jam']."</td>";
          echo "<td><a href='deletepemutaran.php?id=".$row['id']."'><button type='button' class='btn btn-danger' aria-label='Left Align'>
        <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
      </button></a></td>
              </tr>";
      }
    ?>
  </table>
  <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add More News</h4>
          </div>
          <div class="modal-body">
		   <div class="loginmodal-container">
            <form action="insertpemutaran.php" method="post">
              Theater:  <select name="theater" onchange="tampil(this.value)">
                          <option value="-">Pilih Theater:</option>
                          <?php
                            $kueri1 = mysql_query("SELECT id, nama FROM theater");
                            while ($fets = mysql_fetch_array($kueri1)){
                              echo "<option value='".$fets['id']."'>".$fets['nama']."</option>";
                            }
                          ?>
                        </select><br>
              <span id="studio"></span>
              Film:  <select name="film">
                          <option>Pilih Film:</option>
                          <?php
                            $kueri3 = mysql_query("SELECT id, title FROM film");
                            while ($fets = mysql_fetch_array($kueri3)){
                              echo "<option value='".$fets['id']."'>".$fets['title']."</option>";
                            }
                          ?>
                        </select><br>
              Jadwal:  <select name="jadwal">
                          <option>Pilih Jadwal:</option>
                          <?php
                            $kueri4 = mysql_query("SELECT * FROM jadwal");
                            while ($fets = mysql_fetch_array($kueri4)){
                              echo "<option value='".$fets['id']."'>".$fets['hari'].", ".$fets['tanggal']." Pk. ".$fets['jam']."</option>";
                            }
                          ?>
                        </select><br><br>
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
			</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>