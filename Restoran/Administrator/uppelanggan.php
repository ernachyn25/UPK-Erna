<?php
include '../koneksi.php';

if (isset($_POST['id_pelanggan'])) {
		$id_pelanggan = $_POST['id_pelanggan'];
		$nama_pelanggan = $_POST['nama_pelanggan'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$no_hp = $_POST['no_hp'];
		$alamat = $_POST['alamat'];
			$query  	= mysqli_query($koneksi,"UPDATE tb_pelanggan  SET nama_pelanggan='$nama_pelanggan',jenis_kelamin='$jenis_kelamin',no_hp='$no_hp',alamat='$alamat'WHERE id_pelanggan='$id_pelanggan'");
?>
<script type="text/javascript">
	window.location.href="index.php?resto=pelanggan";
</script>
<?php
}
?>