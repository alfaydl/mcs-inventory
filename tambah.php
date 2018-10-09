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
			<li><a href="gudang.php">Gudang</a></li>
		</ul>
	</div>
<div class="main">
	<div class="isimain">
		<span class="span">Input Data</span>
			<form action="" method="POST">

				<table>
				<tr> 
					<td>Nama </td>
					<td> <input type="text" name="nama" placeholder="Nama" required autofocus><br></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" placeholder="Username" required autofocus><br></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="text" name="password" placeholder="Password" required autofocus><br></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" placeholder="Email" required autofocus><br></td>
				</tr>
				<tr>
                    <td>Level</td>
                    <td><select name="level" required autofocus>
                    		<option></option>
                            <option value="ADM">Admin(ADM)</option>
                            <option value="MKR">Maker(MKR)</option>
                            <option value="CKR">Checker(CKR)</option>
                            <option value="SGR">Signer(SGR)</option>
                    	</select>
                    </td>
                    </td>
                </tr>               		
			</table>
				<input type="submit" name="submit" value="Simpan Data">
	
			</form>
			<form action="user.php" method=POST>
				<input type="submit" value="Kembali">
			</form>
	</div>
</div>
</body>
</html>
<?php 
include 'db.php';

if (@$_POST ['submit']){
				
$nama=$_POST['nama'];
$username = @$_POST['username'];
$passworda = @$_POST['password'];
$password = md5($passworda);
$email=$_POST['email'];
$level=$_POST['level'];

 mysqli_query($connect,"INSERT INTO user(nama,username,password,email,level)VALUES('$nama', '$username', '$password', '$email', '$level')");              

?>
<script type="text/javascript">
    alert("Data Tersimpan");
    window.location.href="user.php";
</script>

<?PHP
}
?>