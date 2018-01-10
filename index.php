<?php
if(isset($_REQUEST['login']))
{
session_start();
include("connection.php");
$user = $_REQUEST['user1'];
$pass = $_REQUEST['pass1'];
$sql="select * from utilisateurs where username='".($user)."' and password='".($pass)."' ";
$res=mysqli_query($cn,$sql);
if(mysqli_num_rows($res)>0)
{	$ligne = mysqli_fetch_array($res);
	//echo "<script>alert('Log in Successfull')</script>";
	$_SESSION['user']   = $ligne[0];
	$_SESSION['pass']   = $ligne[1];
	$_SESSION['nom']    = $ligne[2];
	$_SESSION['prenom'] = $ligne[3];
	$_SESSION['email']  = $ligne[4];
	header("location:http://127.0.0.1/dashboard/tp6/home.php");
	
}
else
{
	echo "<script>alert('Log in Failed')</script>";
}
}


?>
<html>
<body>
<form method="POST">
<table>
<tr>
<td>Username :</td><td><input type=text name="user1"</td>
</tr>
<tr>
<td>Password :</td><td><input type=text name="pass1"</td>
</tr>
<tr>
<td><input type=submit name="login" value='login'</td>
</tr>
</body>
</html>

