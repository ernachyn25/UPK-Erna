<link rel="stylesheet" type="text/css" href="button.css">
<h2>Tambah Order Menu</h2>
<form method="post">
	<table cellpadding="7px" cellspacing="7">
		<tr>
			<td>ID Pesanan</td>
			<td><input type="text" name="id_pesanan"></td>
		</tr>
		<tr>
			<td>Pelanggan</td>
			<td>
				<select name="id_pelanggan">
					<option selected="">- Pilih Pelanggan -</option>
					<?php
					include '../koneksi.php';
					$pelanggan = mysqli_query($koneksi,"select * from tb_pelanggan ");
					while ($array = mysqli_fetch_array($pelanggan)) {
					?>
					<option value="<?php echo $array['nama_pelanggan']?>"><?php echo $array['id_pelanggan']?> | <?php echo $array['nama_pelanggan']?></option>
					<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Menu</td>
			<td>
				<select name="id_menu">
					<option selected="">- Pilih Menu -</option>
					<?php
					include '../koneksi.php';
					$pelanggan = mysqli_query($koneksi,"select * from tb_menu ");
					while ($array = mysqli_fetch_array($pelanggan)) {
					?>
					<option value="<?php echo $array['nama_menu']?>"> <?php echo $array['nama_menu']?>| <?php echo number_format($array['harga'])?></option>
					<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>No.Meja</td>
			<td><input type="number" min="1" max="30" name="no_meja"></td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td><input type="number" min="1" max="200" name="jumlah"></td>
		</tr>
		<tr>
			<td><input type="submit" name="masuk" value="Pesan" class='butin'></td>
		</tr>
	</table>
</form>
<?php
include '../koneksi.php';
	
	if (isset($_POST['masuk'])) {

		$a       = $_POST['id_pesanan'];
		$b       = $_POST['id_menu'];
		$c       = $_POST['id_pelanggan'];
		$d       = $_POST['no_meja'];
		$e 	     = $_POST['jumlah'];
	
		$query  	= mysqli_query($koneksi,"INSERT INTO tb_pesanan VALUES('$a','$b','$c','$d','$e')");
?>
<script type="text/javascript">
	window.location.href="index.php?resto=order";
</script>
<?php
}
?>

	<table align="center" border="1" cellspacing="3" cellpadding="3" style=" width:100%;height: 28%">
		<tr>
	<td height="28" colspan="9" border="0">
    <div align="right">
      <label>
       <input type="text" name="cari" />
       </label>
       <label>
      <input type="submit" value="Cari" />
      </label>
      </div>
      </td>
  </tr>
  	<?php

  include '../koneksi.php';
  if (isset($_GET['cari'])) {
  	$cari = $_GET['cari'];
  	echo "<b>Hasil pencarian : ".$cari."</b>";
  }
  ?>
	<tr>
		<th bgcolor="cadetblue" colspan="9">Daftar Pesanan</th>
	</tr>
	<tr bgcolor="#C3C3C3">
		<th style="text-align:center;">No</th>
		<th style="text-align:center;">ID Pesanan</th>
		<th style="text-align:center;">Pelanggan</th>
		<th style="text-align:center;">Menu</th>
		<th style="text-align:center;">No.Meja</th>
		<th style="text-align:center;">Jumlah</th>
		<th style="text-align:center;">Opsi</th>
	</tr>

	<?php

	include '../koneksi.php';
	$no = '1';
	$halaman = '3';
	if (isset($_GET["halaman"])) {
		$page = $_GET["halaman"];
	}else{
		$page = '1';
	 
	}
	if ($page>1) {
		$mulai =($page * $halaman) - $halaman;
	}else{
		$mulai = '0';
	}

	$data = mysqli_query($koneksi,"SELECT * FROM tb_pesanan LIMIT $mulai, $halaman");
	$nomor = $mulai+1;
	while ($isi = mysqli_fetch_array($data)) {
		if ($no%2==0){
			$bg="white";
		}else{
			$bg="lavender";
		}
	?>
	<tr bgcolor="<?php echo $bg; ?>">	
		<td style="text-align:center;"><?php echo $no++ ?></td>
		<td style="text-align:center;"><?php echo $isi['no_meja'] ?></td>
		<td style="text-align:center;"><?php echo $isi['id_pesanan'] ?></td>
		<td style="text-align:center;"><?php echo $isi['id_pelanggan'] ?></td>
		<td style="text-align:center;"><?php echo $isi['id_menu'] ?></td>
		<td style="text-align:center;"><?php echo $isi['jumlah'] ?></td>
		<td style="text-align:center;"><a href="orderhapus.php?id_pesanan=<?php echo $isi['id_pesanan'] ?>" class='butss'>Hapus</a></td>
	</tr>
	<?php
	}
	?>
</table>

<div>
	<?php
	$result = mysqli_query($koneksi,"SELECT * FROM tb_pesanan");
	$total = mysqli_num_rows($result);
	$pages = ceil($total/$halaman);

	for ($i=1; $i<=$pages ; $i++){?>
	<a href="?resto=order&halaman1=<?php echo $i; ?>"><?php echo $i; ?></a>

	<?php } ?>

</div>
</form>