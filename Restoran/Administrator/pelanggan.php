<link rel="stylesheet" type="text/css" href="button.css">
<h2>Tambah Pelanggan</h2>
<form method="post">
	<table cellpadding="7px" cellspacing="7">
		<tr>
			<td>ID Pelanggan</td>
			<td><input type="text" name="id_pelanggan"></td>
		</tr>
		<tr>
			<td>Nama Pelanggan</td>
			<td><input type="text" name="nama_pelanggan"></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td><input type="enum" name="jenis_kelamin"></td>
		</tr>
		<tr>
			<td>No Hp</td>
			<td><input type="text" name="no_hp"></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><input type="text" name="alamat"></td>
		</tr>
		<tr>
			<td><input type="submit" name="masuk" value="+ Data Pelanggan" class='butin'></td>
		</tr>
	</table>
</form>
<?php
include '../koneksi.php';
	
	if (isset($_POST['masuk'])) {

		$id_pelanggan   = $_POST['id_pelanggan'];
		$nama_pelanggan = $_POST['nama_pelanggan'];
		$jenis_kelamin  = $_POST['jenis_kelamin'];
		$no_hp          = $_POST['no_hp'];
		$alamat 	 	= $_POST['alamat'];
		$query  		= mysqli_query($koneksi,"INSERT INTO tb_pelanggan SET 
			id_pelanggan='$id_pelanggan',nama_pelanggan='$nama_pelanggan',jenis_kelamin='$jenis_kelamin',no_hp='$no_hp',alamat='$alamat'");
?>
<script type="text/javascript">
	window.location.href="index.php?resto=pelanggan"
</script>
<?php
}
?>
<form>
	<table align="center" border="1" cellspacing="3" cellpadding="3" style=" width:100%;height: 50%">
		<tr>
    <td height="28" colspan="7" border="0">
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
		<th bgcolor="cadetblue" colspan="7">Data Pelanggan</th>
	</tr>
	<tr bgcolor="#C3C3C3">
		<th style="text-align:center;">No</th>
		<th style="text-align:center;">ID Pelanggan</th>
		<th style="text-align:center;">Nama Pelanggan</th>
		<th style="text-align:center;">Jenis Kelamin</th>
		<th style="text-align:center;">No Hp</th>
		<th style="text-align:center;">Alamat</th>
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
	
	$data = mysqli_query($koneksi,"SELECT * FROM tb_pelanggan LIMIT $mulai, $halaman");
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
		<td style="text-align:center;"><?php echo $isi['id_pelanggan'] ?></td>
		<td style="text-align:center;"><?php echo $isi['nama_pelanggan'] ?></td>
		<td style="text-align:center;"><?php echo $isi['jenis_kelamin'] ?></td>
		<td style="text-align:center;"><?php echo $isi['no_hp'] ?></td>
		<td style="text-align:center;"><?php echo $isi['alamat'] ?></td>
		<td style="text-align:center;"><a href="index.php?resto=pedit&id_pelanggan=<?php echo $isi['id_pelanggan'] ?>" class='buts' >Ubah</a>
			<a href="pelangganhapus.php?id_pelanggan=<?php echo $isi['id_pelanggan'] ?>" class='butss'>Hapus</a>
			</td>
	</tr>
	<?php
	}
	?>
</table>

<div>
	<?php
	$result = mysqli_query($koneksi,"SELECT * FROM tb_pelanggan");
	$total = mysqli_num_rows($result);
	$pages = ceil($total/$halaman);

	for ($i=1; $i<=$pages ; $i++){?>
	<a href="?resto=pelanggan&halaman3=<?php echo $i; ?>"><?php echo $i; ?></a>

	<?php } ?>

</div>
</form>