<?php
include '../koneksi.php';
$id_transaksi = $_GET['id_transaksi'];
$delete   = mysqli_query($koneksi,"DELETE FROM tb_transaksi WHERE id_transaksi='$id_transaksi'");
?>

<script type="text/javascript">
	window.location.href="index.php?resto=transaksi"
</script>