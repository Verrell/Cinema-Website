<?php
session_start();

  if (isset($_GET['status'])){
    if ($_GET['status'] == 1){
      echo "<script>alert('Username atau password salah...');</script>";
    } else if ($_GET['status'] == 2){
      echo "<script>alert('Pendaftaran berhasil...');</script>";
    } else if ($_GET['status'] == 3){
      echo "<script>alert('Pendaftaran gagal...');</script>";
    }
  }
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

  <script type='text/javascript'>
    var googletag = googletag || {};
    googletag.cmd = googletag.cmd || [];
    (function () {
      var gads = document.createElement('script');
      gads.async = true;
      gads.type = 'text/javascript';
      var useSSL = 'https:' == document.location.protocol;
      gads.src = (useSSL ? 'https:' : 'http:') +
      '//www.googletagservices.com/tag/js/gpt.js';
      var node = document.getElementsByTagName('script')[0];
      node.parentNode.insertBefore(gads, node);
    })();
  </script>
  
  <script type='text/javascript'>
    googletag.cmd.push(function () {
     googletag.defineSlot('/18977792/EC4_NZ_HOME_300x250_1', [300, 250], 'EC4_NZ_HOME_300x250_1').addService(googletag.pubads());
     googletag.defineSlot('/18977792/EC4_NZ_HOME_300x250_2', [300, 250], 'EC4_NZ_HOME_300x250_2').addService(googletag.pubads());
     googletag.defineSlot('/18977792/EC4_NZ_HOME_300x250_3', [300, 250], 'EC4_NZ_HOME_300x250_3').addService(googletag.pubads());
     googletag.defineSlot('/18977792/EC_NZ_HOME_MOB_300x250_1', [300, 250], 'EC_NZ_HOME_MOB_300x250_1').addService(googletag.pubads());
     googletag.defineSlot('/18977792/EC_NZ_HOME_MOB_300x250_2', [300, 250], 'EC_NZ_HOME_MOB_300x250_2').addService(googletag.pubads());
     googletag.defineSlot('/18977792/EC_NZ_HOME_MOB_300x250_3', [300, 250], 'EC_NZ_HOME_MOB_300x250_3').addService(googletag.pubads());
     googletag.pubads().enableSingleRequest();
     googletag.enableServices();
   });
 </script>
 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
 <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
	  <!-- <style>
      .konten {
        position: relative;
      }

      .image {
        display: block;
        width: 100%;
        height: auto;
      }

      .overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 14px;
        right: 0;
        height: 100%;
        width: 90%;
        opacity: 0;
        transition: .5s ease;
      }

      .konten:hover .overlay {
        opacity: 1;
        background-color:rgba(0,0,0,0.6);
      }

      .text {
        color: white;
        font-size: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        font-size: 14pt;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
      }
    </style> -->
    <style>
      #coming2{
        display: none;

      }
      .coming{padding: 20px 60px;padding-bottom: 60px; background:#181818;text-align:center; display: block; height: 100%;}

      .aktif{
        text-decoration: underline;

      }
    </style>
    <script>
    // function ganti(x){
    //   if (x == 1){
    //     document.getElementById("coming1").style.display = "block";
    //     document.getElementById("coming2").style.display = "none";

    //   } else if (x == 2){
    //     document.getElementById("coming1").style.display = "none";
    //     document.getElementById("coming2").style.display = "block";
    //   }
    // }
  </script>

</head>
<body data-controller="home" data-action="index" class="home index" >
 <script>
  function validateEmail() {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var email=document.getElementById('email').value;
    if (!re.test(email)){
      return false;
    }else{
      return true;
    }
  }
  function validatePassword() {
    var password=document.getElementById('spassword').value;
    var cpassword=document.getElementById('cpassword').value;
    if (password==cpassword){
      return 1;
    }else{
      return 0;
    }
  }
  function validateSignup(){
    if (!validateEmail() || validatePassword()==0){
      alert('Email atau Password dan Confirm Password salah');
      return false;
    }else{
      return true;
    }
  }
</script>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PVC9MZ"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PVC9MZ');</script>
<!-- End Google Tag Manager -->

<div id="site-content">
  <nav class="navbar navbar-default" style="margin-bottom: 0;">
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
         <li class="active"><a href="index.php">Home</a></li>
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
        <form action="user.php" method="post">
        	<input type="hidden" name="hal" id="hal" value="index.php">
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
            <input type="hidden" name="hal" id="hal" value="index.php">
            <input type="text" name="email" id="email" placeholder="Enter Your Email"><br>
            <input type="text" name="name" id="name" placeholder="Enter Your Name"><br>
            <input type="text" name="username" id="username" placeholder="Enter Username"><br>
            <input type="password" name="password" id="spassword" placeholder="Enter Your Password"><br>
            <input type="password" name="cpassword" id="cpassword" placeholder="Re-enter Your Password"><br>
            Gender: &nbsp;&nbsp;&nbsp;<input type="radio" name="gender" id="gender" value="0"> Male &nbsp;&nbsp;&nbsp;<input type="radio" name="gender" id="gender" value="1"> Female<br>
            <input type="text" name="phone" id="phone" placeholder="Enter Your Phone Number"><br>
            <button type="submit" class="btn btn-primary" name="signup" onclick="return validateSignup()">Submit</button>&nbsp;<button type="button" class="btn btn-warning" name="clear">Clear</button>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<main class="main-content">





  <div class="container-fluid" style="background:url(dummy/backSI.jpg) 50% 0 fixed; background-size:cover; padding-top: 2%;">
   <div class="page" >
     <div class="row" >
      <div class="col-md-9 col-xs-12" >
       <div class="slider" style="margin-right:2%;margin-top:2%;">
        <ul class="slides">

          <?php

          include "connect.php";
          $sql = "SELECT * FROM film WHERE status = 1";
          $result = mysql_query($sql);
          $count = 0;	
          while($row=mysql_fetch_row($result))
          {
            echo '<li><a href="sinopsis.php?id='.$row[0].'"><img style="height:470px;opacity: 0.98;" src="dummy/'.$row[13].'" alt="Slide 1"></a></li>';
          }
          ?>

        </ul>
      </div>
    </div>
    <center>
      <div class="col-md-3 col-xs-12">
       <div class="row" style="margin-top:13%;">
        <div class="col-sm-6 col-md-12">
         <div class="latest-movie">
          <a href="sinopsis.php?id=27"><img  width="300px" <img style="opacity: 0.9;" src="dummy/spidermanhomecoming.jpg" alt="Movie 1"></a>
        </div>
      </div>
      <div class="col-sm-6 col-md-12 col-xs-12" >
       <div class="latest-movie">
        <a href="sinopsis.php?id=24"><img src="dummy/cars3.jpg" style="opacity: 0.9;" alt="Movie 2"></a>
      </div>
    </div>
  </div>
</div>
</center>
</div> <!-- .row -->


</div>
</div> <!-- .container -->
</main>

<div class="coming" >
  <div class="row" >
    <center><a style="font-size:31px" href="#" id="link1" class="aktif">Now Showing</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  style="font-size:31px"href="#" id="link2">Coming Soon</a></center><br>
  </div>
  <div class="row" style="margin-left:1%;">


	<!---
	
-->
<div class="col-md-12">

  <div class="well-none" id="coming1" >
    <div id="myCarousel" class="carousel slide" >

      <!-- Carousel items -->
      <div class="carousel-inner">
       <?php

       include "connect.php";
       $sql = "SELECT * FROM film WHERE status = 1";
       $result = mysql_query($sql);
       $count = 0;	

       echo ' <div class="item active">
       <div class="row">';
        while($row=mysql_fetch_row($result))
        {
			//echo 'dummy/'.$row[13].'';
         if($count<4){
          echo '<div style="margin-top:2%;" class="col-sm-3 col-xs-6"><a href="sinopsis.php?id='.$row[0].'"><img src="dummy/'.$row[13].'" alt="Image" style="height:290px;width:240px" class="img-responsive"></a>
        </div>';
      }

      $count = $count + 1;

    }

    echo '</div></div>';

    $sql = "SELECT * FROM film WHERE status = 1";
    $result = mysql_query($sql);
    $count = 0;	

    echo ' <div class="item">
    <div class="row">';
      while($row=mysql_fetch_row($result))
      {
       if($count>3 and $count<9){
        echo '<div style="margin-top:2%;" class="col-sm-3 col-xs-6"><a href="sinopsis.php?id='.$row[0].'"><img src="dummy/'.$row[13].'" alt="Image" style="height:290px;width:240px" class="img-responsive"></a>
      </div>';
    }

    $count = $count + 1;
  }

  echo '</div></div>';





  ?>
</div>
<!--/carousel-inner--> 
<a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="fa fa-chevron-left fa-4"></i></a>

<a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="fa fa-chevron-right fa-4"></i></a>
</div>
<!--/myCarousel-->
</div>
<!--/well-->
</div>

</div>

<!--/COMING SOON-->
<div class="row" style="margin-left:5%;">
	
  <div class="col-md-12" id="coming2">

    <div class="well-none">
      <div id="myCarousel2" class="carousel2 slide">

        <!-- Carousel items -->
        <div class="carousel2-inner">
         <?php

         include "connect.php";
         $sql = "SELECT * FROM film WHERE status = 2";
         $result = mysql_query($sql);
         $count = 0;	

         echo ' <div class="item active">
         <div class="row">';
          while($row=mysql_fetch_row($result))
          {
			//echo 'dummy/'.$row[13].'';
           if($count<4){
            echo '<div style="margin-top:2%;" class="col-sm-3 col-xs-6"><a href="sinopsis.php?id='.$row[0].'"><img src="dummy/'.$row[13].'" alt="Image" style="height:290px;width:240px" class="img-responsive"></a>
          </div>';
        }

        $count = $count + 1;

      }

      echo '</div></div>';


      echo '</div></div>';





      ?>
    </div>
    <!--/carousel-inner--> 

  </div>
  <!--/myCarousel-->
</div>
<!--/well-->
</div>
</div>
</div>


<div class="row" style="padding:2% 2%;background:#dfdfdf;text-align:center;height:auto;background:url(dummy/backSI.jpg) 50% 0 fixed; background-size:cover;" >
 <center><h1 style="color:white">PROMO</h1><br>
  <div style="margin-top:2%;" class="suka  col-md-4 col-xs-12"><img src="dummy/image.jpg" width="55%"></div>
  <div  style="margin-top:2%;" class="suka2  col-md-4 col-xs-12"><img src="dummy/image.jpg" width="55%"></div>
  <div  style="margin-top:2%;margin-bottom:5%;"class="suka2  col-md-4 col-xs-12"><img src="dummy/image.jpg" width="55%"></div>
</center>
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



 </div>


 <!-- <script src="//cdn.eventcinemas.co.nz/cdn/scripts/jquery-1.10.2.min.js"></script> -->
 <!--  <script src='//cdn.eventcinemas.co.nz/cdn/js/jquery/lib-8b01a1d0-5c73-3442-a3fd-f146455c0b04.js' type='text/javascript'></script><script src='//cdn.eventcinemas.co.nz/cdn/js/site/js-567ff474-73e2-d16b-0f60-a5a0d86d378e.js' type='text/javascript'></script> -->

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <!-- Include all compiled plugins (below), or include individual files as needed -->
 <script src="js/bootstrap.min.js"></script>

 <!-- <script src="js/jquery-1.11.1.min.js"></script> -->
 <script src="js/plugins.js"></script>
 <script src="js/app.js"></script>
 <script>
   $(document).ready(function(){
    $('#tsearch').on('keyup',function(){
      if($(this).val()==''){
        $('#hsearch').hide();
      }else{
        $('#hsearch').show();
      }
      showdata();
    });
    $("#link1").click(function(e){
      $("#coming2").slideUp();
      $("#coming1").slideDown();
      $(this).addClass("aktif");
      $("#link2").removeClass("aktif");
      e.preventDefault();
    });
    $("#link2").click(function(e){
      $("#coming1").slideUp();
      $("#coming2").slideDown();
      $(this).addClass("aktif");
      $("#link1").removeClass("aktif");
      e.preventDefault();   
    });
    $(".flex-next").click(function(){
      alert("aaa");
      $("#ganti").css('background-image','url(dummy/4.jpg)');
    });
    function showdata(){
      $.ajax({
        url : "searchmovies.php",
        type : "post",
        async : false,
        data : {
          title:$('#tsearch').val()
        },
        success : function(res){
          $('#hsearch').html(res);
        }
      });
    };
  });
</script>
</body>
</html>