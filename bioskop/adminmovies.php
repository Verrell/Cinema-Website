<?php
include "connect.php";
session_start();
// if (!isset($_SESSION['user'])){
//   header("Location: admin.php");
// }

if (isset($_GET['status'])){
  if ($_GET['status'] == 0){
    echo "<script>alert('Insert data gagal...');</script>";
  } else if ($_GET['status'] == 1){
    echo "<script>alert('Delete data gagal...');</script>";
  }
}

$sql = "SELECT * FROM film";
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
             <li class="active"><a href="adminmovies.php">Movies</a></li>
             <li><a href="admintheaters.php">Theaters</a></li>
             <li><a href="adminjadwal.php">Jadwal</a></li>
             <li><a href="adminpemutaran.php">Pemutaran</a></li>
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
         <select id="field">
           <option value="id">ID</option>
           <option value="title">Title</option>
           <option value="status">Status</option>
         </select>
         <input type="text" name="keyword" placeholder="Keyword" id="key">
       </div>
       <div style="padding-left: 10%" class="col-md-3">
        <a href="#" data-toggle="modal" data-target="#myModal"><button type="submit" class="btn btn-primary" name="add">Add Movie</button></a></li>
      </div>
    </div>
    <table style="margin-top: 2%; text-align: center" class="table table-stripped">
     <tr>
      <td>ID</td>
      <td>Poster</td>
      <td>Title</td>
      <td>Duration</td>
      <td>Status</td>
      <td>Edit</td>
      <td>Delete</td>
      <tbody id="show">
      </tbody>
    </tr>
    <!-- <tr>
      <td>1</td>
      <td><img src="dummy/1.jpg" width="50px" height="50px"></td>
      <td>Jumanji</td>
      <td>Galaxy Mall</td>
      <td>90 minute</td>
      <td>Now Showing</td>
      <td><button type="button" class="btn btn-primary" aria-label="Left Align">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
      </button></td>
      <td><button type="button" class="btn btn-danger" aria-label="Left Align">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
      </button></td>
    </tr> -->
  </table>
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Movie</h4>
        </div>
        <div class="modal-body">
         <div class="loginmodal-container">
          <form action="insertmovies.php" method="post" enctype="multipart/form-data">
            Title: <input type="text" name="title" id="title" placeholder="Movie Title"><br>
            Poster: <input type="file" name="poster" id="poster" placeholder="Poster Filename"><br>
            Synopsis:<br> <textarea name="synopsis" id="synopsis" placeholder="Movie Synopsis"></textarea><br>
            Duration: <input type="text" name="duration" id="duration" placeholder="Movie Duration"><br>
            Genre:
            <select name="genre">
              <option value="0">Action</option>
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
            Release Date: <input type="date" name="release" id="release" placeholder="Release Date"><br>
            Producer: <input type="text" name="producer" id="producer" placeholder="Movie Producer"><br>
            Director: <input type="text" name="director" id="director" placeholder="Movie Director"><br>
            Writer: <input type="text" name="writer" id="writer" placeholder="Movie Writer"><br>
            Production: <input type="text" name="production" id="production" placeholder="Movie Production"><br>
            IMDB: <input type="text" name="imdb" id="imdb" placeholder="Movie Rating"><br>
            Cast:<br> <textarea name="cast" id="cast" placeholder="Movie Cast"></textarea><br>
            Trailer:<br> <textarea name="trailer" id="trailer" placeholder="Trailer Link"></textarea><br>
            Status: 
            <select name="status">
              <option value="0">Finished Airing</option>
              <option value="1">Now Playing</option>
              <option value="2">Coming Soon</option>
            </select><br>
            Show Date: <input type="date" name="tayang" id="tayang" placeholder="Show Date"><br>
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
<script>
  $(document).ready(function(){
    var jsonResult;
    $.getJSON("moviesjson.php",{key : $('#key').val(), field: $('#field').val()},displayData);
    $('#key').on('keyup',function(){
      $.getJSON("moviesjson.php",{key : $('#key').val(), field: $('#field').val()},displayData);
    });
    function displayData(data){
      jsonResult=data;
      var str='';
      for(var i=0; i<data.length;i++){
        var result = data[i];
        str+="<tr><td id=ids>"+parseInt(result.id)+"</td><td><img src='dummy/"+result.poster+"' width='50px' height='50px'></td><td>"+result.title+"</td><td>"+result.duration+"</td><td>";
        if (result.status==0){
          str+="Finished Airing";
        }else if(result.status==1){
          str+="Now Playing";
        }else{
          str+="Coming Soon";
        }
        str+="</td><td><a href='editmovies.php?id="+parseInt(result.id)+"'><button type='button' class='btn btn-primary' aria-label='Left Align'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button></a></td><td><a href='deletemovies.php?id="+parseInt(result.id)+"'><button type='button' class='btn btn-danger' aria-label='Left Align'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a></td></tr>";
      }
      $('#show').html(str);
    }
  });
</script>
</html>