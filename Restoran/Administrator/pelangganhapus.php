<?php
include '../koneksi.php';
$id_pelanggan = $_GET['id_pelanggan'];
$delete   = mysqli_query($koneksi,"DELETE FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'");
?>

<script type="text/javascript">
	window.location.href="index.php?resto=pelanggan"
</script>