<?php
  session_start();
  include "connect.php";
  $film = $_GET['film'];
  $jadwal = $_GET['jadwal'];

  $sql = "SELECT title from film where id=$film";
  $result = mysql_query($sql);
  $row = mysql_fetch_assoc($result);

  $sql2 = "SELECT * from jadwal where id = $jadwal";
  $result2 = mysql_query($sql2);
  $row2 = mysql_fetch_array($result2);

  $sql3 = "SELECT DISTINCT kota FROM theater";
  $result3 = mysql_query($sql3);
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
   <link href="style2.css" rel="stylesheet">
  

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
      function tampil(kota, film, jadwal){
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("theater").innerHTML = this.responseText;
            }
          }
          xmlhttp.open("GET", "pilihkota.php?kota=" + kota + "&film=" + film + "&jadwal=" + jadwal, true);
          xmlhttp.send();
      }
    </script>
    </head>
    <body>
		<div id="site-content">
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
             <li><a href="index.php">Home</a></li>
             <li><a href="movies.php">Movies</a></li>
             <li><a href="theaters.php">Theaters</a></li>
             <li><a href="news.php">News</a></li>
           </ul>
           <?php
            if (isset($_SESSION['user'])){
          ?>
            <ul class="nav navbar-nav navbar-right">
            <li>
             <form class="navbar-form navbar-left">
               <div class="form-group">
                 <input type="text" class="form-control" placeholder="Search">
               </div>
               <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
             </form>
           </li>
           <li><a href="#">Hello, <?php echo $_SESSION['user']; ?></a></li>
           <li><a href="logout.php?hal=movies.php">Log Out</a></li>
          <?php
            } else {
          ?>
         <ul class="nav navbar-nav navbar-right">
          <li>
           <form class="navbar-form navbar-left">
             <div class="form-group">
               <input type="text" class="form-control" placeholder="Search">
             </div>
             <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
           </form>
         </li>
         <li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
         <li><a href="#" data-toggle="modal" data-target="#myModal2">Sign Up</a></li>
       </ul>
       <?php
        }
      ?>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

         <!-- Modal -->
     <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Login</h4>
          </div>
          <div class="modal-dialog">
           <div class="loginmodal-container">
            <form action="user.php" method="post">
              <input type="hidden" name="hal" id="hal" value="pilihtheater.php?film=<?php echo $film; ?>&jadwal=<?php echo $jadwal; ?>">
              <input type="text" name="username" id="username" placeholder="Enter Username"><br>
              <input type="password" name="password" id="password" placeholder="Enter Your Password"><br>
              <button type="submit" class="btn btn-primary" name="login">Submit</button>
            </form>
            <div class="login-help">
             <a href="register.php">Register</a> - <a href="#">Forgot Password</a>
           </div>
         </div>
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sign Up</h4>
      </div>
      <div class="modal-body">
     <div class="loginmodal-container">
        <form action="user.php" method="post">
          <input type="hidden" name="hal" id="hal" value="pilihtheater.php?film=<?php echo $film; ?>&jadwal=<?php echo $jadwal; ?>">
          <input type="email" name="email" id="email" placeholder="Enter Your Email"><br>
          <input type="text" name="name" id="name" placeholder="Enter Your Name"><br>
          <input type="text" name="username" id="username" placeholder="Enter Username"><br>
          <input type="password" name="password" id="password" placeholder="Enter Your Password"><br>
          <input type="password" name="cpassword" id="cpassword" placeholder="Re-enter Your Password"><br>
          Gender: &nbsp;&nbsp;&nbsp;<input type="radio" name="gender" id="gender" value="male"> Male &nbsp;&nbsp;&nbsp;<input type="radio" name="gender" id="gender" value="female"> Female<br>
          <input type="text" name="phone" id="phone" placeholder="Enter Your Phone Number"><br>
          <button type="submit" class="btn btn-primary" name="signup">Submit</button>&nbsp;<button type="button" class="btn btn-warning" name="clear">Clear</button>
        </form>
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</div>
</div>
	<!-- ISI -->
  <?php if (!isset($_SESSION['user'])){ ?>
    <div class="container">
      <h3><?php echo $row['title']; ?> - Tanggal <?php echo $row2['tanggal']; ?> - Jam <?php echo $row2['jam']; ?></h3><br/>
      <center><h4>Mohon maaf, anda harus login dulu untuk dapat membooking tempat.</h4></center>
    </div>
  <?php } else { ?>
  	<div class="container">
  		<h3><?php echo $row['title']; ?> - Tanggal <?php echo $row2['tanggal']; ?> - Jam <?php echo $row2['jam']; ?></h3>
      <div class="row">
          <div class="col-md-1">
            Pilih Kota:
          </div>
          <div class="col-md-4">
            <select id="kota" class="form-control col-md-5" onchange="tampil(this.value, '<?php echo $film; ?>', '<?php echo $jadwal; ?>')">
              <option value="All">All</option>
              <?php
                while ($row3 = mysql_fetch_array($result3)){
                  echo "<option value='".$row3['kota']."'>".$row3['kota']."</option>";
                }
              ?>
            </select>
          </div>
        </div>
        <div class="container">
          <div id="theater">
          <?php
            echo "<table class='table table-striped'>
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Kota</th>
                </tr>
              </thead>
              <tbody>";

                  $sql = "SELECT * FROM theater";
                  $result = mysql_query($sql);

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
            ?>
          </div>
        </div>
  	</div>
  <?php } ?>
 <footer>
  <div class="footer-cinemas">
    <div class="ours">Our Theaters</div>
    <ul>
	 <?php

          include "connect.php";
          $sql = "SELECT * FROM theater";
          $result = mysql_query($sql);
          $count = 0;	
          while($row=mysql_fetch_row($result))
          {
          	echo ' <li class="cine "><a href="detailtheaters.php?id='.$row[0].'">'.$row[1].'</a></li> ';
     	 }

	 ?>
    </ul>

    <div class="footer-gallery-wrapper social">
      <span>Follow us on social media</span>
      <div class="footer-gallery">
        <div><a href=""><img alt="" src="//cdn.eventcinemas.co.nz/cdn/resources/footer/social/b86e7660-41b6-4c82-a5db-28e4b22ca555.png" target="_blank" /></a></div>
        <div><a href=""><img alt="" src="//cdn.eventcinemas.co.nz/cdn/resources/footer/social/758ec756-1358-4fe1-8653-01bc701ef346.png" target="_blank" /></a></div>
      </div>
    </div>

  </div>
  <div class="footer-note" >
    <div>
      <a href="/"><img alt="" class="logo" src="images/logo.gif" /></a>                </div>
      <div class="copy">
        <span>&copy; 2017 - the Movies</span>
      </div>
      <div class="footer-links">
        <div class="cms-content"><p><span style="color:#A9A9A9;font-weight:normal;">
         <small><a href="/terms/Privacy">Privacy</a> &nbsp;&nbsp;&nbsp;<a href="" target="_blank">Customer Service</a>&nbsp; &nbsp;
           <a href="/faq">FAQ</a> &nbsp; <a href="" target="_blank">Gift Shop</a>&nbsp; 
           <a href="/giftcards">Giftcards</a>&nbsp;&nbsp;<a href="" target="_blank">Careers</a> &nbsp; 
           <a href="/terms">Terms Of Use</a>&nbsp; &nbsp;<a href="/corporatesales">Corporate Sales</a>&nbsp; 
           <a href="/legend">Legend</a>&nbsp; </small></span></p>
         </div>
       </div>
     </div>
   </footer>

    </body>
	<!--PENUTUP ISI-->



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/app.js"></script>
		
</body>
</html>