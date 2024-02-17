<h2>Edit Menu</h2>
<?php
include '../koneksi.php';

$d = mysqli_query($koneksi,"SELECT * FROM tb_menu");
$data = mysqli_fetch_array($d);
?>
<form method="post" action="menuup.php">
	<table cellpadding="7px">
		<tr>
			<td>ID Menu</td>
			<td><input type="text" name="id_menu" value="<?php echo $data['id_menu']?>"></td>
		</tr>
		<tr>
			<td>Nama Menu</td>
			<td><input type="text" name="nama_menu" value="<?php echo $data['nama_menu']?>"></td>
		</tr>
		<tr>
			<td>Harga</td>
			<td><input type="number" min="5000" max="50000000" name="harga" value="<?php echo $data['harga']?>"></td>
		</tr>
		<tr>
			<td><input type="submit" name="masuk" value="Ubah Pesanan" class='buts'></td>
			<td><input type="reset" name="batal" value="Batal" class='buts'></td>
		</tr>
	</table>
</form>
