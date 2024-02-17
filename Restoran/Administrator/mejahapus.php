<?php
include '../koneksi.php';
$id_meja = $_GET['id_meja'];
$delete   = mysqli_query($koneksi,"DELETE FROM tb_meja WHERE id_meja='$id_meja'");
?>

<script type="text/javascript">
	window.location.href="index.php?resto=meja"
</script>