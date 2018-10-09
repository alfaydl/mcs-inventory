<?php 

include 'db.php';
?>
<?php
$id_maker = $_GET['id_maker'];
 
mysqli_query($connect,"DELETE FROM maker where id_maker='$id_maker'");

{ ?>
<script type="text/javascript">
	alert("Data Terhapus");
	window.location.href="maker.php";
</script>

<?php 
} 
?>