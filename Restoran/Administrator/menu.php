<link rel="stylesheet" type="text/css" href="button.css">
<h2>Tambah Menu</h2>
<form method="post">
	<table cellpadding="7px" cellspacing="7">
		<tr>
			<td>ID Menu</td>
			<td><input type="text" name="id_menu"></td>
		</tr>
		<tr>
			<td>Nama Menu</td>
			<td><input type="text" name="nama_menu"></td>
		</tr>
		<tr>
			<td>Harga</td>
			<td><input type="number" min="5000" max="50000000" name="harga"></td>
		</tr>
		<tr>
			<td><input type="submit" name="masuk" value="Input Pesanan" class='butin'></td>
		</tr>
	</table>
</form>
<?php
include '../koneksi.php';

	if (isset($_POST['masuk'])) {

		$id_menu	= $_POST['id_menu'];
		$nama_menu	= $_POST['nama_menu'];
		$harga      = $_POST['harga'];
		$query  	= mysqli_query($koneksi,"INSERT INTO tb_menu SET id_menu='$id_menu',nama_menu='$nama_menu',harga='$harga'");
?>
<script type="text/javascript">
	window.location.href = "index.php?resto=menu";
</script> 
<?php
}
?>
<form>
	<table align="center" border="1" cellspacing="3" cellpadding="3" style=" width:100%;height: 50%">
		<tr>
    <td height="20" colspan="5" border="0">
    <div align="right">
      <label>
       <input type="text" name="cari">
       </label>
       <label>
      <input type="submit" value="Cari">
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
		<th bgcolor="cadetblue" colspan="5">Daftar Menu</th>
	</tr>
	<tr bgcolor="#C3C3C3">
		<th style="text-align:center;">No</th>
		<th style="text-align:center;">ID Menu</th>
		<th style="text-align:center;">Nama Menu</th>
		<th style="text-align:center;">Harga</th>
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
	
	$data = mysqli_query($koneksi,"SELECT * FROM tb_menu LIMIT $mulai, $halaman");
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
		<td style="text-align:center;"><?php echo $isi['id_menu'] ?></td>
		<td style="text-align:center;"><?php echo $isi['nama_menu'] ?></td>
		<td style="text-align:center;"><?php echo number_format( $isi['harga']) ?></td>
		<td style="text-align:center;"><a href="index.php?resto=medit&id_menu=<?php echo $isi['id_menu'] ?>" class='buts'>Ubah</a>
			<a href="menuhapus.php?id_menu=<?php echo $isi['id_menu'] ?>" class='butss'>Hapus</a>
			</td>
	</tr>
	<?php
	}
	?>
</table>

<div>
	<?php
	$result = mysqli_query($koneksi,"SELECT * FROM tb_menu");
	$total = mysqli_num_rows($result);
	$pages = ceil($total/$halaman);

	for ($i=1; $i<=$pages ; $i++){?>
	<a href="?resto=menu&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>

	<?php } ?>

</div>
</form>