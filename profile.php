<?php
include 'db.php';
session_start();
if (!isset($_SESSION['username'])){
	header("Location: index.php?acces_denide");
}

?>
<html>
	<head>
		<meta charset="utf-8">
		<title> Inventories MCS </title>
	</head>
	<link rel="stylesheet" type="text/css" href="profile.css">
	<body>
		<nav>
			<ul class="kiri">
			<li><a href="">Inventories MCS</a></li>
			</ul>
			<ul class="kanan">
			<li><a href="profile.php"><?php echo $_SESSION['username']; ?></a>
				<a href="logut.php"> Keluar </a></li>
			<div style="clear:both"></div>
			</ul>
		</nav>
		<style type="text/css">
td,th{border:1px solid #ccc;padding:10px;}
table{border-collapse:collapse;}
</style>
<?php 
	include 'db.php';
	$username = $_SESSION['username'];
	$data = mysqli_query($connect, "SELECT * FROM user WHERE username='$username'");
	while($d = mysqli_fetch_array($data)){
?>
<div class="main">
	<div class="isimain">
			<hr>
			<h2 style="text-align:center" class="span">User Profile</h2>
			<hr>
				<div class="card">
					<h1><?php echo $d['nama']; ?></h1>
					<p class="title"><?php echo $_SESSION['username']; ?></p>
					<p><?php echo $d['email']; ?></p>
					<p><?php echo $d['level']; ?></p>
				 	<p><a href="edit_profile.php?id=<?php echo $d['id'];?>"><button>Edit Profile</button></a></p>
					<p><a href="dummy.php?level=<?php echo $d['level'];?>"><button>Masuk Sebagai <?php echo $_SESSION['username']; ?></button></a></p>
				</div>
	</div>
</div>
<?php }?>
	</body>
</html>