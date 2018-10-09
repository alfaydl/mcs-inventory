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
			<li><a href="signer.php">Signer</a></li>
			</ul>
		</div>
<style type="text/css">
td,th{border:1px solid #ccc;padding:10px;}
table{border-collapse:collapse;}
</style>
<div class="main">
	<div class="isimain">
		<table>
			<tr>
				<hr>
					<h1>Approving Request Data</h1>
					<hr>
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
					<?php $i=1; ?>
					<?php
						
						$query = mysqli_query($connect, "SELECT * FROM maker where status='Checked'"); 
						while($row = mysqli_fetch_array($query)){
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
			 			<td><a href="edit_signer.php?id_maker=<?php echo $row['id_maker'];?>">APPROVING</a>
					</tr>
					<?php $i++;?>
					<?php
				}
			 ?>
		</table>	
	</div>
</div>
</body>
</html>