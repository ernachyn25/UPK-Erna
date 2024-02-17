<?php
include '../koneksi.php';
$id_menu = $_GET['id_menu'];
$delete   = mysqli_query($koneksi,"DELETE FROM tb_menu WHERE id_menu='$id_menu'");
?>

<script type="text/javascript">
	window.location.href="index.php?resto=menu"
</script>