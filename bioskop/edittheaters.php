<?php
include "connect.php";
session_start();
if (!isset($_SESSION['user'])){
  header("Location: admin.php");
}

if (isset($_GET['status'])){
  if ($_GET['status'] == 0){
    echo "<script>alert('Update data gagal...');</script>";
  }
}

if (isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = "SELECT * FROM theater WHERE id = ".$id;
  $result = mysql_query($sql);
  $row = mysql_fetch_array($result);
} else {
  header("Location: admintheaters.php");
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
             <li><a href="adminnews.php">News</a></li>

           </ul>
           <ul class="nav navbar-nav navbar-right">
             <li><a href="logoutadmin.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
           </ul>
         </div><!-- /.navbar-collapse -->
       </div><!-- /.container-fluid -->
     </nav>

     <div class="container">
       <h3>Edit Movies</h3>
       <form action="updatetheaters.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Place's Name: <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['nama']; ?>"><br>
        Address: <input type="text" name="address" id="address" class="form-control" value="<?php echo $row['alamat']; ?>"><br>
        City: <input type="text" name="city" id="city" class="form-control" value="<?php echo $row['kota']; ?>"><br>
        Phone: <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $row['telpon']; ?>"><br>
        Weekday's Price: <input type="text" name="pricew" id="pricew" class="form-control" value="<?php echo $row['hargabiasa']; ?>"><br>
        Weekend's Price: <input type="text" name="pricee" id="pricee" class="form-control" value="<?php echo $row['hargaweekend']; ?>"><br>
        Latitude: <input type="text" name="latitude" id="latitude" class="form-control" value="<?php echo $row['latitude']; ?>"><br>
        Langitude: <input type="text" name="langitude" id="langitude" class="form-control" value="<?php echo $row['langitude']; ?>"><br>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </div>
      </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>