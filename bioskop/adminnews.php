<?php
session_start();
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
if(isset($_POST['showtable'])){
  include "connect.php";
  $sql = "SELECT * FROM news";
  $result = mysql_query($sql);
  while($row=mysql_fetch_array($result)){
    echo "
    <tr>
      <td id='ids'>".$row[0]."</td>
      <td>".$row[1]."</td>
      <td>".$row[2]."</td>
      <td><button type='button' class='btn btn-success glyphicon glyphicon-pencil'></button></td>
      <td><button type='button' class='btn btn-danger glyphicon glyphicon-trash delete' value=".$row[0]."></button></td>
    </tr>";
  }
  exit();
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
             <li><a href="adminjadwal.php">Jadwal</a></li>
             <li><a href="adminpemutaran.php">Pemutaran</a></li>
             <li><a href="adminuser.php">User</a></li>
             <li><a href="adminpembayaran.php">Pembayaran</a></li>
             <li class="active"><a href="adminnews.php">News</a></li>
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
       </select>
       <input type="text" id="key" name="key" placeholder="Keyword">
     </div>
     <div style="padding-left: 10%" class="col-md-3">
      <a href="#" data-toggle="modal" data-target="#myModal"><button type="submit" class="btn btn-primary" name="add">Add News</button></a></li>
    </div>
  </div>
  <table style="margin-top: 2%; text-align: center" class="table table-stripped">
   <tr>
    <td>ID</td>
    <td>Title</td>
    <td>About</td>
    <td>Edit</td>
    <td>Delete</td>
    <tbody id="show">
    </tbody>
  </tr>
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
        <form action="" method="post">
          Title: <input type="text" name="title" id="title" placeholder="News Title"><br>
          About: <input type="text" name="about" id="about" placeholder="About What"><br>
          <button type="submit" class="btn btn-primary" name="submit" id="insert">Submit</button>
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
<script>
  $(document).ready(function(){
    showdata();
    var jsonResult;
    $('#key').on('keyup',function(){
      $.getJSON("newsjson.php",{key : $('#key').val(), field: $('#field').val()},displayData);
    });
    function displayData(data){
      jsonResult=data;
      var str='';
      for(var i=0; i<data.length;i++){
        var result = data[i];
        str+="<tr><td id=ids>"+parseInt(result.id)+"</td><td>"+result.title+"</td><td>"+result.about+"</td><td><button type='button' class='btn btn-success glyphicon glyphicon-pencil'></button></td><td><button type='button' class='btn btn-danger glyphicon glyphicon-trash delete' value="+parseInt(result.id)+"></button></td></tr>";
      }
      $('#show').html(str);
    }
    $('#insert').on('click',function(){
      $.ajax({
        url : "insertnews.php",
        type : "post",
        async : false,
        data : {
          title : $('#title').val(),
          about : $('#about').val()
        }
      });
      showdata();
    });

    function showdata(){
      $.ajax({
        url : "adminnews.php",
        type : "post",
        async : false,
        data : {
          showtable : 1
        },
        success : function(res){
          $('#show').html(res);
        }
      });
    };

    $('.delete').on('click',function(){
      ids=$(this).val();
      $.ajax({
        url : "deletenews.php",
        type : "post",
        async : false,
        data : {
          id : ids
        }
      });
      showdata();
    });
  });
</script>
</body>
</html>