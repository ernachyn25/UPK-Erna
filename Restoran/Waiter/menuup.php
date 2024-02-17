<?php
include '../koneksi.php';

if (isset($_POST['id_menu'])) {
		$id_menu	= $_POST['id_menu'];
		$nama_menu	= $_POST['nama_menu'];
		$harga		= $_POST['harga'];
		$query  	= mysqli_query($koneksi,"UPDATE tb_menu SET nama_menu='$nama_menu',harga='$harga'WHERE id_menu='$id_menu'");
?>
<script type="text/javascript">
	window.location.href = "index.php?resto=menu";
</script>
<?php
}
?>
