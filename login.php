<?php
include 'db.php';

$username = $_POST['username'];
$password =(md5($_POST['password']));

$query = "SELECT * FROM user where username='$username' AND password='$password'";
$apa = $connect->query($query);

if ($apa->num_rows > 0) {
	
	session_start();
	$_SESSION['username'] = $username;

	header("Location: profile.php");
} else {
	echo header("Location: gagal.php");
}



?>