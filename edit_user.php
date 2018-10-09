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
	
<?php 
	include 'db.php';
	$id_user = $_GET['id'];
	$data = mysqli_query($connect, "SELECT * FROM user WHERE id='$id_user'");
	while($d = mysqli_fetch_array($data)){
?>
<div class="main">
	<div class="isimain">
			<span class="span">Form Edit User</span>
				<form action="" method="POST">
<table>
				<tr> 
					<td>Nama</td>
					<td> <input type="text" name="nama" value="<?php echo $d['nama']; ?>" required autofocus><br></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" value="<?php echo $d['username']; ?>" required autofocus><br></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="text" name="password" placeholder="*****" required autofocus><br></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" value="<?php echo $d['email']; ?>" required autofocus><br></td>
				</tr>
				<tr>
					<td>Level</td>
                    <td><select name="level" required autofocus>
                    		<option><?php echo $d['level']; ?></option>
                            <option value="ADM">Admin(ADM)</option>
                            <option value="MKR">Maker(MKR)</option>
                            <option value="CKR">Checker(CKR)</option>
                            <option value="SGR">Signer(SGR)</option>
                    	</select>
                    </td>
				</tr>			
			</table>
					<input type="submit" name="submit" value="Simpan Data"><br>
					<?php 
						include 'db.php';

						if(isset($_POST['submit'])){

						$id=$_GET['id'];
						$nama=$_POST['nama'];
						$username = @$_POST['username'];
						$passworda = @$_POST['password'];
						$password = md5($passworda);
						$email=$_POST['email'];
						$level=$_POST['level'];

						mysqli_query($connect,"UPDATE user SET nama='$nama', username='$username', password='$password', email='$email', level='$level' WHERE id='$id'");
					?>
						<script type="text/javascript">
					    alert("Data Terupdate");
					    window.location.href="user.php";
						</script>
					<?php
					}
					?>
				</form>
				<form action="user.php" method=POST>
					<input type="submit" value="Kembali">
					<input type="hidden" name="id" value="<?php echo $d['id'];?>">
				</form>
				<?php
				}
			 ?>
			
	</div>
</div>
</body>
</html>