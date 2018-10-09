<?php
include 'db.php';
session_start();
if (!isset($_SESSION['username'])){
	header("Location: index.php?acces_denide");
}

?>
<html>
<head>
	<title>Inventories MCS</title>
</head>
<link rel="stylesheet" type="text/css" href="asset/style.css">
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
<div class="sidebar">
		<ul>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="user.php">Admin</a></li>
			<li><a href="admin_maker.php">Maker</a></li>
			<li><a href="admin_checker.php">Checker</a></li>
			<li><a href="admin_signer.php">Signer</a></li>
		</ul>
	</div>
<div class="main">
	<div class="isimain">
		<span class="span">Input Data</span>
			<form action="" method="POST">
				<input type="text" name="nama_maker" value="<?php echo $_SESSION['username']; ?>" required autofocus><br>
				<input type="text" name="request" placeholder="Tulis request di sini"required autofocus><br>
				<input type="text" name="harga" placeholder="Harga"required autofocus><br>
				<input type="text" name="jumlah" placeholder="Jumlah"required autofocus><br>
				<input type="date" name="tanggal_request" placeholder="Tanggal Request"required autofocus><br>
				<input type="text" name="keterangan" placeholder="Keterangan"required autofocus><br>
				<input type="submit" name="submit" value="Request Data">
			</form>
			<form action="admin_maker.php" method=POST>
				<input type="submit" value="Kembali">
			</form>
	</div>
</div>
</body>
</html>
<?php 
include 'db.php';

if (@$_POST ['submit']){

$nama_maker=$_POST['nama_maker'];
$request=$_POST['request'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];
$tanggal_request=$_POST['tanggal_request'];
$keterangan=$_POST['keterangan'];

mysqli_query($connect,"INSERT INTO maker(nama_maker,request,harga,jumlah,tanggal_request,keterangan)VALUES('$nama_maker','$request',
	'$harga', '$jumlah', '$tanggal_request','$keterangan')");              

?>
<script type="text/javascript">
    alert("Data Terkirim");
    window.location.href="admin_maker.php";
</script>

<?PHP
}
?>