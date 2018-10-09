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
			<li><a href="checker.php">Checker</a></li>
		</ul>
	</div>
<?php 
	include 'db.php';
	$id_maker = $_GET['id_maker'];
	$data = mysqli_query($connect, "SELECT * FROM maker WHERE id_maker='$id_maker'");
	while($d = mysqli_fetch_array($data)){
?>
<div class="main">
	<div class="isimain">
		<span class="span">Input Data</span>
			<form action="" method="POST">
			<table>
				<tr> 
					<td>Nama Maker</td>
					<td> <input type="text" disabled name="nama_maker" value="<?php echo $d['nama_maker']; ?>" required autofocus></td>
				</tr>
				<tr>
					<td>request</td>
					<td><input type="text" disabled name="request" value="<?php echo $d['request']; ?>" required autofocus><br></td>
				</tr>
				<tr>
					<td>Harga</td>
					<td><input type="text" disabled name="harga" value="<?php echo $d['harga']; ?>" required autofocus><br></td>
				</tr>
				<tr>
					<td>Jumlah</td>
					<td><input type="text" name="jumlah" value="<?php echo $d['jumlah']; ?>" required autofocus><br></td>
				</tr>
				<tr>
					<td>Tanggal Request</td>
					<td><input type="date" disabled name="tanggal_request" value="<?php echo $d['tanggal_request']; ?>" required autofocus><br></td>
				</tr>
				<tr>
					<td>Keterangan</td>
					<td><input type="text" disabled name="keterangan" value="<?php echo $d['keterangan']; ?>"><br></td>
				</tr>
				<tr>
                	<td width="20%" align="left">Status By Checker : </td>
                    <td>
                    <input type="radio" name="status" value="Checked" required />Checked
   					<input type="radio" name="status" value="Reject" required />Reject
                    </td>
                </tr>			
			</table>
				<input type="submit" name="submit" value="Simpan Update Data">
			
				<?php 
				include 'db.php';

				if(isset($_POST['submit'])){

				$id_maker=$_GET['id_maker'];
				$jumlah=$_POST['jumlah'];
				$status=$_POST['status'];
				

				mysqli_query($connect,"UPDATE maker SET jumlah='$jumlah', status='$status' WHERE id_maker='$id_maker'");

				?>
				<script type="text/javascript">
				    alert("Data Terupdate");
				    window.location.href="checker.php";
				</script>

				<?PHP
				}
				?>
			</form>
			<form action="checker.php" method=POST>
				<input type="submit" value="Kembali">
			</form>
			<?php
				}
			 ?>
	</div>
</div>
</body>
</html>