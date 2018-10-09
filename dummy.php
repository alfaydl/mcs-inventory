<?php
include 'db.php';

$level = $_GET['level'];
$data = mysqli_query($connect, "SELECT * FROM user WHERE level='$level'");

if ($level=='MKR') {
	
	header("Location: maker.php");
} elseif ($level=='ADM') {
	
	header("Location: user.php");
} elseif ($level=='CKR') {
	
	header("Location: checker.php");
}else {
	echo header("Location: signer.php");
}

?>