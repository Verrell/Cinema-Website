<?php
session_start();
  if (!isset($_SESSION['user'])){
    header("Location: admin.php");
  }

include "connect.php";

$sql = "SELECT * FROM user";
$result = mysql_query($sql);
$i = 1;
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
             <li class="active"><a href="adminuser.php">User</a></li>
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
         <option value="email">Email</option>
         <option value="name">Name</option>
         <option value="username">Username</option>
         <option value="status">Status</option>
       </select>
       <input type="text" name="keyword" placeholder="Keyword" id="key">
     </div>
   </div>
   <table style="margin-top: 2%; text-align: center" class="table table-stripped">
    <tr>
      <td>ID</td>
      <td>Email</td>
      <td>Name</td>
      <td>Username</td>
      <td>Gender</td>
      <td>Phone</td>
      <td>Status</td>
      <tbody id="show">

      </tbody>
    </tr> 
    
    </table>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
  <script>
    $(document).ready(function(){
      var jsonResult;
      $.getJSON("userjson.php",{key : $('#key').val(), field: $('#field').val()},displayData);
      $('#key').on('keyup',function(){
        $.getJSON("userjson.php",{key : $('#key').val(), field: $('#field').val()},displayData);
      });
      function displayData(data){
        jsonResult=data;
        var str='';
        for(var i=0; i<data.length;i++){
          var result = data[i];
          str+="<tr><td id=ids>"+parseInt(result.id)+"</td><td>"+result.email+"</td><td>"+result.name+"</td><td>"+result.username+"</td><td>";
          if (result.gender==0){
            str+="Pria</td>";
          }else{
            str+="Wanita</td>";
          }
          str+="<td>"+result.phone+"</td><td>"
          if (result.status==0){
            str+="<button class='btn btn-danger' onclick='togglestatus("+parseInt(result.id)+",'<?php echo $i; ?>')>Non Aktif</button></td></tr>";
          }else{
            str+="<button class='btn btn-success' onclick='togglestatus("+parseInt(result.id)+",'<?php echo $i; ?>')>Aktif</button></td></tr>";
          }
        }
        $('#show').html(str);
      }
    });
  </script>
  </html>