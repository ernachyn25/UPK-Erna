<h2>Edit Pelanggan</h2>
<?php
include '../koneksi.php';

$d = mysqli_query($koneksi,"SELECT * FROM tb_pelanggan");
$data = mysqli_fetch_array($d);
?>
<form method="post" action="uppelanggan.php">
	<table cellpadding="7px">
		<tr>
			<td>ID Menu</td>
			<td><input type="text" name="id_pelanggan" value="<?php echo $data['id_pelanggan']?>"></td>
		</tr>
		<tr>
			<td>Nama Menu</td>
			<td><input type="text" name="nama_pelanggan" value="<?php echo $data['nama_pelanggan']?>"></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td><input type="enum" name="jenis_kelamin" value="<?php echo $data['jenis_kelamin']?>"></td>
		</tr>
		<tr>
			<td>No Hp</td>
			<td><input type="text" name="no_hp" value="<?php echo $data['no_hp']?>"></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><input type="text" name="alamat" value="<?php echo $data['alamat']?>"></td>
		</tr>
		<tr>
			<td><input type="submit" name="masuk" value="Ubah Pesanan" class='buts'></td>
			<td><input type="reset" name="batal" value="Batal" class='buts'></td>
		</tr>
	</table>
</form>
