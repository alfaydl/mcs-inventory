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
		<title>Inventories MCS</title>
		<link rel="stylesheet" type="text/css" href="asset/style.css">
	</head>
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
				<li><a href="maker.php">Maker</a></li>
			</ul>
		</div>
		<style type="text/css">
			td,th{border:1px solid #ccc;padding:10px;}
			table{border-collapse:collapse;}
		</style>
		<div class="main">
			<div class="isimain">
				<table>
					<a href="input.php"><input type="submit" value="Membuat Request"></a>
					<hr>
					<h1>Request Data</h1>
					<hr>
					<tr>
						<th>ID</th>
						<th>Nama Maker</th>
						<th>Request</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Tanggal Request</th>
						<th>Keterangan</th>
						<th>Status</th>
						<th>Approvement</th>
						<th>Action</th>
					</tr>
					<?php $i = 1;?>
					<?php 
						include 'db.php';
						$nama_maker = $_SESSION['username'];
						$data = mysqli_query($connect, "SELECT * FROM maker WHERE nama_maker='$nama_maker'");
						while($row = mysqli_fetch_array($data)){
					?>
							<tr>
								<td><?php echo $i; ?></td>
					 			<td><?php echo $row['nama_maker']; ?></td>
					 			<td><?php echo $row['request']; ?></td>
					 			<td><?php echo $row['harga']; ?></td>
					 			<td><?php echo $row['jumlah']; ?></td>
					 			<td><?php echo $row['tanggal_request']; ?></td>
					 			<td><?php echo $row['keterangan']; ?></td>
								<td><?php echo $row['status']; ?></td>
								<td><?php echo $row['approvement']; ?></td>
					 			<td><a href="edit_maker.php?id_maker=<?php echo $row['id_maker'];?>">EDIT</a>
								<a href="hapus_maker.php?id_maker=<?php echo $row['id_maker'];?>">HAPUS</a></td>
					 		</tr>
					 		<?php $i++; ?>
						<?php
						}
					 ?>
				</table>	
			</div>
		</div>
	</body>
</html>