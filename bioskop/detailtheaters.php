<?php
session_start();
  if (!isset($_GET['id'])){
    header("Location: theaters.php");
  }

  if (isset($_GET['status'])){
    if ($_GET['status'] == 1){
      echo "<script>alert('Username atau password salah...');</script>";
    } else if ($_GET['status'] == 2){
      echo "<script>alert('Pendaftaran berhasil...');</script>";
    } else if ($_GET['status'] == 3){
      echo "<script>alert('Pendaftaran gagal...');</script>";
    }
  }

  include "connect.php";

  $teater = $_GET['id'];
  $sql = "SELECT * FROM theater WHERE id = ".$teater;
  $result = mysql_query($sql);
  $row = mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title><?php echo $row['nama']; ?> Theater | Bioskop</title></title>

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
      <style>
        #map {
          height: 300px;
          width: 80%;
        }
        .gm-style-mtc{
          display: none;
        }
      </style>
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
               <li class="active"><a href="theaters.php">Theaters</a></li>
               <li><a href="news.php">News</a></li>
             </ul>
             <?php
       if (isset($_SESSION['user'])){
        ?>
        <ul class="nav navbar-nav navbar-right">
          <li>
           <form class="navbar-form navbar-left">
            <div class="form-group">
             <input type="text" class="form-control" placeholder="Search and Click" id="tsearch">
           </div>
           <div class="form-group" id="hsearch" style="position:absolute;z-index:5;top:50px;display:none;background-color:white;">

            </div>
         </form>
       </li>
       <li><a href="#">Hello, <?php echo $_SESSION['user']; ?></a></li>
       <li><a href="logout.php?hal=index.php">Log Out</a></li>
       <?php
     } else {
      ?>
      <ul class="nav navbar-nav navbar-right">
        <li>
         <form class="navbar-form navbar-left">
           <div class="form-group">
             <input type="text" class="form-control" placeholder="Search and Click" id="tsearch">
           </div>
           <div class="form-group" id="hsearch" style="position:absolute;z-index:5;top:50px;display:none;background-color:white;">

           </div>
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
            <form action="" method="post">
              <input type="text" name="username" id="username" placeholder="Enter Username"><br>
              <input type="password" name="password" id="password" placeholder="Enter Your Password"><br>
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
        <form action="" method="post">
          <input type="email" name="email" id="email" placeholder="Enter Your Email"><br>
          <input type="text" name="name" id="name" placeholder="Enter Your Name"><br>
          <input type="text" name="username" id="username" placeholder="Enter Username"><br>
          <input type="password" name="password" id="password" placeholder="Enter Your Password"><br>
          <input type="password" name="cpassword" id="cpassword" placeholder="Re-enter Your Password"><br>
          Gender: &nbsp;&nbsp;&nbsp;<input type="radio" name="gender" id="gender" value="male"> Male &nbsp;&nbsp;&nbsp;<input type="radio" name="gender" id="gender" value="female"> Female<br>
          <input type="text" name="phone" id="phone" placeholder="Enter Your Phone Number"><br>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>&nbsp;<button type="button" class="btn btn-warning" name="clear">Clear</button>
        </form>
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</div>
</div>

<div class="container-fluid" style="background:url(dummy/backSI.jpg) 50% 0 fixed; background-size:cover; margin-top: -2%;">
  <div class="row" style="margin:5%;color:white;">
    <h3><?php echo $row['nama']; ?> Theater</h3><br>
    <div class="col-md-5">
      <h4>Theater's Info:</h4>
      <p>
        <table>
          <tr>
            <td>Address</td>
            <td>&nbsp;:&nbsp;</td>
            <td><?php echo $row['alamat']; ?></td>
          </tr>
          <tr>
            <td>Phone</td>
            <td>&nbsp;:&nbsp;</td>
            <td><?php echo $row['telpon']; ?></td>
          </tr>
          <tr>
            <td>City</td>
            <td>&nbsp;:&nbsp;</td>
            <td><?php echo $row['kota']; ?></td>
          </tr>
          <tr>
            <td>Weekday's Price</td>
            <td>&nbsp;:&nbsp;</td>
            <td><?php echo $row['hargabiasa']; ?></td>
          </tr>
          <td>Weekend's Price</td>
          <td>&nbsp;:&nbsp;</td>
          <td><?php echo $row['hargaweekend']; ?></td>
        </tr>
      </table>
    </p>
  </div>
  <div class="col-md-7">
    <h4>Location: </h4>
    <div id="map"></div>
  </div>
</div><br>

</div>
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


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script>
  function initMap() {
    var uluru = {lat: <?php echo $row['latitude']; ?>, lng: <?php echo $row['langitude']; ?>};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 16,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
  }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAh3JpJ6eId_QdebPIrf3mDgyuNFbB3jjc&callback=initMap">
</script>
</body>
</html>