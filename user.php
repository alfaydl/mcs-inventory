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
			<li><a href="user.php">Admin</a></li>
			<li><a href="admin_maker.php">Maker</a></li>
			<li><a href="admin_checker.php">Checker</a></li>
			<li><a href="admin_signer.php">Signer</a></li>
			</ul>
		</div>
		<style type="text/css">
td,th{border:1px solid #ccc;padding:10px;}
table{border-collapse:collapse;}
</style>
<div class="main">
	<div class="isimain">
		<table>
		<a href="tambah.php"><input type="submit" value="Buat Akun Baru"></a>
			<tr>
				<th>id</th>
				<th>Nama</th>
				<th>Username</th>
				<th>Email</th>
				<th>Level</th>
				<th>Action</th>

			</tr>
			<?php
						$query = mysqli_query($connect, "SELECT * FROM user ORDER BY username ASC"); 
						while($row = mysqli_fetch_array($query)){
					?>
							<tr>
								<td><?php echo $row['id']; ?></td>
					 			<td><?php echo $row['nama']; ?></td>
					 			<td><?php echo $row['username']; ?></td>
					 			<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['level']; ?></td>
					 			<td><a href="edit_user.php?id=<?php echo $row['id'];?>">EDIT</a>
								<a href="hapus_user.php?id=<?php echo $row['id'];?>">HAPUS</a></td>
					 		</tr>
						<?php
						}
					 ?>
		</table>	
	</div>
</div>
	</body>
</html>