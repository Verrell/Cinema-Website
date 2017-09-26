<?php
	// 0 salah, 1 masuk, 2 new user, 3 username atau email sudah ada
	session_start();
	include "connect.php";
	if(isset($_POST['login'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$hal = $_POST['hal'];
		$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  		$result = mysql_query($sql);
  		$row = mysql_fetch_assoc($result);
		$rows=mysql_num_rows($result);
		if($rows>=1){
			$_SESSION['user'] = $username;
			$_SESSION['iduser'] = $row['id'];
			header("Location: ".$hal);
		}else{
			header("Location: ".$hal."?status=1");
		}
	}
	if(isset($_POST['signup'])){
		$email=$_POST['email'];
		$name=$_POST['name'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$gender=$_POST['gender'];
		$phone=$_POST['phone'];
		$hal = $_POST['hal'];
		$sql = "SELECT * FROM user WHERE username='$username'";
  		$result = mysql_query($sql);
		$rowsusername=mysql_num_rows($result);
		$sql = "SELECT * FROM user WHERE email='$email'";
		$result = mysql_query($sql);
		$rowsemail=mysql_num_rows($result);
		if($rowsusername==0 and $rowsemail==0){
			$sql = "insert into user values('','$email','$name','$username','$password','$gender','$phone', 1)";
			$result = mysql_query($sql);
			header("Location: ".$hal."?status=2");
		}else{
			header("Location: ".$hal."?status=3");
		}
	}
?>