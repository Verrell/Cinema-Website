<?php
  if (isset($_GET['status'])){
    if ($_GET['status'] == 0){
      echo "<script>alert('Username atau password salah...');</script>";
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
      <div class="container-fluid">
        <div class="jumbotron" align="center">
          <form action="cekadmin.php" method="post">
            <h1>Welcome to Cinema's Administrator Login</h1>
            <table>
              <tr>
                <td><label>Username</label></td>
                <td><input type="text" name="username"></td>
              </tr>
              <tr>
                <td><label>Password</label></td>
                <td><input type="password" name="password"></td>
              </tr>
              <tr>
                <td><button type="submit" class="btn btn-primary" name="submit">Submit</button></td>
              </form>
            </div>
          </div>
          <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
          <!-- Include all compiled plugins (below), or include individual files as needed -->
          <script src="js/bootstrap.min.js"></script>
        </body>
        </html>