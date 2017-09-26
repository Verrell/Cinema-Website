<?php
  session_start();
  include "connect.php";
  $studio = $_SESSION['studio'];
  $pemutaran = $_SESSION['pemutaran'];
  $user = $_SESSION['user'];
  $theater = $_GET['theater'];
  $film = $_GET['film'];
  $jadwal = $_GET['jadwal'];

  // $dat = date("j F Y");
  // $fets = mysql_fetch_array(mysql_query("SELECT tanggal FROM jadwal WHERE id = ".$jadwal)));
  // if ($dat >= $fets['tanggal']){
  //   $kueris = mysql_query("DELETE FROM pemesanan WHERE idpemutaran = ".$pemutaran);
  // }

  $sql = "SELECT nama FROM studio WHERE id = ".$studio;
  $result = mysql_query($sql);
  $row = mysql_fetch_array($result);

  // $kueri = mysql_query("SELECT * FROM pemutaran WHERE id = ".$pemutaran);
  // $fets = myql_fetch_array($kueri);
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
  
  <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
  <link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
	  
	  <style>
		.seat{
			
			width : 910px;
			height : 300px;
			
			margin-left : 110px;
		}

		#layar{
			width : 300px;
			border-style : solid;
			border-width : medium;
		}

    #summary{
      border : solid black;
      padding: 0;
      background-color: white;
      margin-bottom : 50px;
    }

    #temp{
      display: none;
    }
	  </style>

    <script>
      var total = 0;
      var jumlah = 0;

      function cekkursi(x, id, user, temp){
        // alert(user + " " + temp);
        if (x == 1){
          alert("Kursi sudah dipesan orang lain!");
        } else if (x == 2 && user != temp){
          alert("Kursi ini sedang dipilih oleh orang lain!");
        } else if (x == 2 && user == temp){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById(id).innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "pilihkursi.php?id=" + id + "&status=" + x + "&temp=" + temp, true);
            xmlhttp.send();

            jumlah = jumlah - 1;
            document.getElementById("jumlah").innerHTML = jumlah;

            var res = document.getElementById("temp").innerHTML.split(";");
            for (var i = 0; i < res.length; i++){
              if (res[i] == id){
                res[i] = "";
              }
            }
            document.getElementById("temp").innerHTML = res.join(";");
        } else if (x == 0){
            var xmlhttp = new XMLHttpRequest();
  	        xmlhttp.onreadystatechange = function() {
  	            if (this.readyState == 4 && this.status == 200) {
  	                document.getElementById(id).innerHTML = this.responseText;
  	            }
  	        }
  	        xmlhttp.open("GET", "pilihkursi.php?id=" + id + "&status=" + x + "&temp=" + temp, true);
  	        xmlhttp.send();

            jumlah = jumlah + 1;
            document.getElementById("jumlah").innerHTML = jumlah;

            var node = document.createTextNode(id + ";");
            document.getElementById("temp").appendChild(node);
        }
      }

      function cekharga(x, hari, biasa, weekend, user, temp){
        if (x == 0){
          if (hari == "Saturday" || hari == "Sunday"){
            total = total + weekend;
            document.getElementById("harga").innerHTML = total;
          } else {
             total = total + biasa;
            document.getElementById("harga").innerHTML = total;
          }
        } else if (x == 2 && user == temp){
          if (hari == "Saturday" || hari == "Sunday"){
            total = total - weekend;
            document.getElementById("harga").innerHTML = total;
          } else {
             total = total - biasa;
            document.getElementById("harga").innerHTML = total;
          }
        }
      }

      function order(x){
        var res = document.getElementById("temp").innerHTML;
        var tes = document.getElementById("harga").innerHTML / document.getElementById("jumlah").innerHTML;
        window.location.href = "order.php?data=" + res + "&pemutaran=" + x + "&total=" + tes;
      }

      var timer;

      function setTimer(){
        var waktu = 60;
        timer = setInterval(function(){
          waktu = waktu - 1;
          document.getElementById("waktu").innerHTML = waktu;
        }, 1000);
      }

      function stopTimer(){
        clearInterval(timer);
      }

      window.onbeforeunload = function() {
        $.ajax({
          type: "POST",
          url: "reset.php"
        });
      }

      setInterval(function(){
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("seat").innerHTML = this.responseText;
              }
          }
          xmlhttp.open("GET", "detailseat.php", true);
          xmlhttp.send();
      }, 1000);

      // $(document).ready(function(){
      //   setInterval(function(){
      //     // $('.seat').load('detailseat.php');
      //     var xmlhttp = new XMLHttpRequest();
      //       xmlhttp.onreadystatechange = function() {
      //           if (this.readyState == 4 && this.status == 200) {
      //               document.getElementById("seat").innerHTML = this.responseText;
      //           }
      //       }
      //       xmlhttp.open("GET", "detailseat.php", true);
      //       xmlhttp.send();
      //       document.getElementById("jumlah").innerHTML = "0";
      //       document.getElementById("harga").innerHTML = "0";
      //       total = 0;
      //       jumlah = 0;
      //     stopTimer();
      //     setTimer();
      //   }, 61000);
      // });
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
             <li><a href="index.php">Home</a></li>
             <li  class="active"><a href="movies.php">Movies</a></li>
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
              <input type="hidden" name="hal" id="hal" value="seat.php?theater=<?php echo $theater; ?>&film=<?php echo $film; ?>&jadwal=<?php echo $jadwal; ?>">
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

<div class="container">
<h3><?php echo $row['nama']; ?></h3>
<!-- <center><h3>Kursi bioskop di bawah ini akan direfresh ulang dalam waktu: <span id="waktu" style="color: orange;">60</span> detik</h3></center><br><br> -->
<center><div id="layar">Layar</div></center>
   
 
   <div class="seat" id="seat">
	   <?php include "detailseat.php"; ?>
   </div>
  

  <div id="summary" class="container">
    <div class="col-md-4">
      <center><h3><?php
        $kueri = mysql_query("SELECT * FROM film WHERE id = ".$film);
        $fets = mysql_fetch_array($kueri);
        echo $fets['title'];
      ?></h3>
      <h4><?php
        $kueri = mysql_query("SELECT * FROM jadwal WHERE id = ".$jadwal);
        $fets = mysql_fetch_array($kueri);
        echo $fets['hari'].", ".$fets['tanggal'];
      ?></h4>
      <h4>Jam <?php echo $fets['jam']; ?></h4>
    </div>
    <div class="col-md-4">
      <h3>Jumlah kursi yang dipesan: <span id="jumlah">0</span></h3>
      <h3>Total Harga: Rp.<span id="harga">0</span>,-</h3>
    </div>
    <div class="col-md-4"><br>
      <center><button type="button" class="btn btn-primary" style="margin:5%;" onclick="order(<?php echo $pemutaran; ?>)">Order</button></center>
      <span id="temp"></span>
    </div>
    </center>
  </div>
</div>

<?php include "footer.php"; ?>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>