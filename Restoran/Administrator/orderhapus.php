<?php
include '../koneksi.php';
$id_pesanan = $_GET['id_pesanan'];
$delete   = mysqli_query($koneksi,"DELETE FROM tb_pesanan WHERE id_pesanan='$id_pesanan'");
?>

<script type="text/javascript">
	window.location.href="index.php?resto=order"
</script>