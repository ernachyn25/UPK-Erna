<link rel="stylesheet" type="text/css" href="button.css">
<h2>Tambah Meja</h2>
<form method="post">
	<table cellpadding="7px" cellspacing="7">
		<tr>
			<td>ID Meja</td>
			<td><input type="text" name="id_meja"></td>
		</tr>
		<tr>
			<td>No.Meja</td>
			<td><input type="number" min="1" max="30" name="no_meja"></td>
		</tr>
		<tr>
			<td>Nama Menu</td>
			<td><select name="nama_menu" >
					<option selected="">- Pilih Menu -</option>
					<?php
					include '../koneksi.php';
					$menu = mysqli_query($koneksi,"select * from tb_menu ");
					while ($arrays = mysqli_fetch_array($menu)) {
					?>
					<option value="<?php echo $arrays['nama_menu']?>"><?php echo $arrays['id_menu']?> | <?php echo $arrays['nama_menu']?></option>
					<?php
					}
					?>
				</select></td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td><input type="number" min="1" name="jumlah"></td>
		</tr>
		<tr>
			<td><input type="submit" name="masuk" class="butin" value="+ Data Meja"></td>
		</tr>
	</table>
</form>
<?php
include '../koneksi.php';
	
	if (isset($_POST['masuk'])) {

		$id_meja 	= $_POST['id_meja'];
		$no_meja 	= $_POST['no_meja'];
		$nama_menu  = $_POST['nama_menu'];
		$jumlah 	= $_POST['jumlah'];
		$query  	= mysqli_query($koneksi,"INSERT INTO tb_meja SET 
		id_meja='$id_meja',no_meja='$no_meja',nama_menu='$nama_menu',jumlah='$jumlah'");
?>
<script type="text/javascript">
	window.location.href="index.php?resto=meja";
</script>
<?php
}
?>

	<table align="center" border="1" cellspacing="3" cellpadding="5" style=" width:100%;height: 28%">
		<tr>
    <td height="25" colspan="6" border="0">
    <div align="right">
      <label>
       <input type="text" name="cari"  />
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
		<th bgcolor="cadetblue" colspan="6">Data Meja</th>
	</tr>
	<tr bgcolor="#C3C3C3">
		<th style="text-align:center;">No</th>
		<th style="text-align:center;">ID Meja</th>
		<th style="text-align:center;">No Meja</th>
		<th style="text-align:center;">Nama Menu</th>
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
	
	$data = mysqli_query($koneksi,"SELECT * FROM tb_meja LIMIT $mulai, $halaman");
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
		<td style="text-align:center;"><?php echo $isi['id_meja'] ?></td>
		<td style="text-align:center;"><?php echo $isi['no_meja'] ?></td>
		<td style="text-align:center;"><?php echo $isi['nama_menu'] ?></td>
		<td style="text-align:center;"><?php echo $isi['jumlah'] ?></td>
		<td style="text-align:center;"><a href="mejahapus.php?id_meja=<?php echo $isi['id_meja'] ?>" class='butss'>Hapus</a>
		</td>
	</tr>
	<?php
	}
	?>
</table>

<div>
	<?php
	$result = mysqli_query($koneksi,"SELECT * FROM tb_meja");
	$total = mysqli_num_rows($result);
	$pages = ceil($total/$halaman);

	for ($i=1; $i<=$pages ; $i++){?>
	<a href="?resto=meja&halamann=<?php echo $i; ?>"><?php echo $i; ?></a>

	<?php } ?>

</div>
</form>