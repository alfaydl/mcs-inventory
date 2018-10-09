<?php 

include 'db.php';
?>
<?php
$id_user = $_GET['id'];
 
mysqli_query($connect,"DELETE FROM user where id='$id_user'");

{ ?>
<script type="text/javascript">
	alert("Data Terhapus");
	window.location.href="user.php";
</script>

<?php 
} 
?>