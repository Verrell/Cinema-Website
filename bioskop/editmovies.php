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
    $sql = "SELECT * FROM film WHERE id = ".$id;
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
  } else {
    header("Location: adminmovies.php");
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
          <form action="updatemovies.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            Title: <input type="text" name="title" id="title" class="form-control" value="<?php echo $row['title']; ?>"><br>
            Poster: <input type="file" name="poster" id="poster"><br>
            Synopsis:<br> <textarea name="synopsis" id="synopsis" class="form-control"><?php echo $row['sinopsis']; ?></textarea><br>
            Duration: <input type="text" name="duration" id="duration" class="form-control" value="<?php echo $row['duration']; ?>"><br>
            Genre:
            <?php if ($row['genre'] == 0){ ?>
              <select name="genre" class="form-control">
                <option value="0" selected="selected">Action</option>
                <option value="1">Comedy</option>
                <option value="2">Drama</option>
                <option value="3">Romance</option>
                <option value="4">Fantasy</option>
                <option value="5">Science Fiction</option>
                <option value="6">Thriller</option>
                <option value="7">Tragedy</option>
                <option value="8">Animation</option>
                <option value="9">Adventure</option>
              </select><br>
            <?php } else if ($row['genre'] == 1){ ?>
              <select name="genre" class="form-control">
                <option value="0">Action</option>
                <option value="1" selected="selected">Comedy</option>
                <option value="2">Drama</option>
                <option value="3">Romance</option>
                <option value="4">Fantasy</option>
                <option value="5">Science Fiction</option>
                <option value="6">Thriller</option>
                <option value="7">Tragedy</option>
                <option value="8">Animation</option>
                <option value="9">Adventure</option>
              </select><br>
            <?php } else if ($row['genre'] == 2){ ?>
              <select name="genre" class="form-control">
                <option value="0">Action</option>
                <option value="1">Comedy</option>
                <option value="2" selected="selected">Drama</option>
                <option value="3">Romance</option>
                <option value="4">Fantasy</option>
                <option value="5">Science Fiction</option>
                <option value="6">Thriller</option>
                <option value="7">Tragedy</option>
                <option value="8">Animation</option>
                <option value="9">Adventure</option>
              </select><br>
            <?php } else if ($row['genre'] == 3){ ?>
              <select name="genre" class="form-control">
                <option value="0">Action</option>
                <option value="1">Comedy</option>
                <option value="2">Drama</option>
                <option value="3" selected="selected">Romance</option>
                <option value="4">Fantasy</option>
                <option value="5">Science Fiction</option>
                <option value="6">Thriller</option>
                <option value="7">Tragedy</option>
                <option value="8">Animation</option>
                <option value="9">Adventure</option>
              </select><br>
            <?php } else if ($row['genre'] == 4){ ?>
              <select name="genre" class="form-control">
                <option value="0">Action</option>
                <option value="1">Comedy</option>
                <option value="2">Drama</option>
                <option value="3">Romance</option>
                <option value="4" selected="selected">Fantasy</option>
                <option value="5">Science Fiction</option>
                <option value="6">Thriller</option>
                <option value="7">Tragedy</option>
                <option value="8">Animation</option>
                <option value="9">Adventure</option>
              </select><br>
            <?php } else if ($row['genre'] == 5){ ?>
              <select name="genre" class="form-control">
                <option value="0">Action</option>
                <option value="1">Comedy</option>
                <option value="2">Drama</option>
                <option value="3">Romance</option>
                <option value="4">Fantasy</option>
                <option value="5" selected="selected">Science Fiction</option>
                <option value="6">Thriller</option>
                <option value="7">Tragedy</option>
                <option value="8">Animation</option>
                <option value="9">Adventure</option>
              </select><br>
            <?php } else if ($row['genre'] == 6){ ?>
              <select name="genre" class="form-control">
                <option value="0">Action</option>
                <option value="1">Comedy</option>
                <option value="2">Drama</option>
                <option value="3">Romance</option>
                <option value="4">Fantasy</option>
                <option value="5">Science Fiction</option>
                <option value="6" selected="selected">Thriller</option>
                <option value="7">Tragedy</option>
                <option value="8">Animation</option>
                <option value="9">Adventure</option>
              </select><br>
            <?php } else if ($row['genre'] == 7){ ?>
              <select name="genre" class="form-control">
                <option value="0">Action</option>
                <option value="1">Comedy</option>
                <option value="2">Drama</option>
                <option value="3">Romance</option>
                <option value="4">Fantasy</option>
                <option value="5">Science Fiction</option>
                <option value="6">Thriller</option>
                <option value="7" selected="selected">Tragedy</option>
                <option value="8">Animation</option>
                <option value="9">Adventure</option>
              </select><br>
            <?php } else if ($row['genre'] == 8){ ?>
              <select name="genre" class="form-control">
                <option value="0">Action</option>
                <option value="1">Comedy</option>
                <option value="2">Drama</option>
                <option value="3">Romance</option>
                <option value="4">Fantasy</option>
                <option value="5">Science Fiction</option>
                <option value="6">Thriller</option>
                <option value="7">Tragedy</option>
                <option value="8" selected="selected">Animation</option>
                <option value="9">Adventure</option>
              </select><br>
            <?php } else if ($row['genre'] == 9){ ?>
              <select name="genre" class="form-control">
                <option value="0">Action</option>
                <option value="1">Comedy</option>
                <option value="2">Drama</option>
                <option value="3">Romance</option>
                <option value="4">Fantasy</option>
                <option value="5">Science Fiction</option>
                <option value="6">Thriller</option>
                <option value="7">Tragedy</option>
                <option value="8">Animation</option>
                <option value="9" selected="selected">Adventure</option>
              </select><br>
            <?php } ?>
            Release Date: <input type="date" name="release" id="release" class="form-control" value="<?php echo $row['rilis']; ?>"><br>
            Producer: <input type="text" name="producer" id="producer" class="form-control" value="<?php echo $row['producer']; ?>"><br>
            Director: <input type="text" name="director" id="director" class="form-control" value="<?php echo $row['director']; ?>"><br>
            Writer: <input type="text" name="writer" id="writer" class="form-control" value="<?php echo $row['writer']; ?>"><br>
            Production: <input type="text" name="production" id="production" class="form-control" value="<?php echo $row['production']; ?>"><br>
            IMDB: <input type="text" name="imdb" id="imdb" class="form-control" value="<?php echo $row['imdb']; ?>"><br>
            Cast:<br> <textarea name="cast" id="cast" class="form-control"><?php echo $row['cast']; ?></textarea><br>
            Trailer:<br> <textarea name="trailer" id="trailer" class="form-control"><?php echo $row['trailer']; ?></textarea><br>
            Status: 
            <?php if ($row['status'] == 0){ ?>
              <select name="status" class="form-control">
                <option value="0" selected="selected">Finished Airing</option>
                <option value="1">Now Playing</option>
                <option value="2">Coming Soon</option>
              </select><br>
            <?php } else if ($row['status'] == 1){ ?>
              <select name="status" class="form-control">
                <option value="0">Finished Airing</option>
                <option value="1" selected="selected">Now Playing</option>
                <option value="2">Coming Soon</option>
              </select><br>
            <?php } else if ($row['status'] == 2){ ?>
              <select name="status" class="form-control">
                <option value="0">Finished Airing</option>
                <option value="1">Now Playing</option>
                <option value="2" selected="selected">Coming Soon</option>
              </select><br>
            <?php } ?>
            Show Date: <input type="date" name="tayang" id="tayang" class="form-control" value="<?php echo $row['tayang']; ?>"><br>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" name="submit">Update</button>
          </form>
        </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>