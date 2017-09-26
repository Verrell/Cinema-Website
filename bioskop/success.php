<?php
  session_start();
  include "connect.php";
  $pemutaran = $_GET['pemutaran'];
	$sql = "SELECT idfilm from pemutaran where id = ".$pemutaran;
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);

  $kueri = mysql_query("SELECT title FROM film WHERE id = ".$row['idfilm']);
  $fets = mysql_fetch_array($kueri);
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
           <li><a href="logout.php?hal=index.php">Log Out</a></li>
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
	<!-- ISI -->
	<div class="container" style="margin-bottom:200px;">
		<h3>Pemesanan Berhasil</h3>
    <center>Pemesanan tiket film <?php echo $fets['title']; ?> berhasil dilakukan. Tiket sudah kami dikirimkan ke email anda, silahkan cek email anda.</center>
	</div>
  <footer>
            <div class="footer-cinemas">
                <div class="ours">Our Cinemas</div>
                <ul>
                        <li class="state">New Zealand</li>
                        <li class="cine "><a href="/Cinema/Albany">Albany</a></li>
                        <li class="cine "><a href="/Cinema/Broadway">Broadway</a></li>
                        <li class="cine "><a href="/Cinema/Chartwell">Chartwell</a></li>
                        <li class="cine "><a href="/Cinema/Coastlands">Coastlands</a></li>
                        <li class="cine "><a href="/Cinema/Havelock-North">Havelock North</a></li>
                        <li class="cine "><a href="/Cinema/Manukau">Manukau</a></li>
                        <li class="cine "><a href="/Cinema/Mt-Maunganui">Mt Maunganui</a></li>
                        <li class="cine "><a href="/Cinema/New-Plymouth">New Plymouth</a></li>
                        <li class="cine "><a href="/Cinema/Palmerston-North">Palmerston North</a></li>
                        <li class="cine "><a href="/Cinema/Queen-Street">Queen Street</a></li>
                        <li class="cine "><a href="/Cinema/Queensgate">Queensgate</a></li>
                        <li class="cine "><a href="/Cinema/St-Lukes">St Lukes</a></li>
                        <li class="cine "><a href="/Cinema/Tauranga">Tauranga</a></li>
                        <li class="cine "><a href="/Cinema/The-Embassy">The Embassy</a></li>
                        <li class="cine "><a href="/Cinema/Westcity">Westcity</a></li>
                        <li class="cine "><a href="/Cinema/Westgate">Westgate</a></li>
                        <li class="cine last"><a href="/Cinema/Whangarei">Whangarei</a></li>

                </ul>

                    <div class="footer-gallery-wrapper social">
                        <span>Follow us on social media</span>
                        <div class="footer-gallery">
                                <div><a href=""><img alt="" src="//cdn.eventcinemas.co.nz/cdn/resources/footer/social/b86e7660-41b6-4c82-a5db-28e4b22ca555.png" target="_blank" /></a></div>
                                <div><a href=""><img alt="" src="//cdn.eventcinemas.co.nz/cdn/resources/footer/social/758ec756-1358-4fe1-8653-01bc701ef346.png" target="_blank" /></a></div>
                        </div>
                    </div>
                                   
            </div>
            <div class="footer-note">
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