<script type="text/javascript">
	function pelanggan(str) {
		window.location.href = "index.php?resto=transaksi&idp="+str;
	}
</script>
<link rel="stylesheet" type="text/css" href="button.css">
<h2>Pilih Pelanggan</h2>
<form method="post">
	<table cellpadding="7px" cellspacing="7">
		<tr>
			<td>ID Pelanggan</td>
			<td><select name="idp" onchange="pelanggan(idp.value)">
					<option selected="">- Pilih Pelanggan -</option>
					<?php
					include '../koneksi.php';
					$pelanggan = mysqli_query($koneksi,"select * from tb_pelanggan ");
					while ($array = mysqli_fetch_array($pelanggan)) {
					?>
					<option value="<?php echo $array['id_pelanggan']?>"><?php echo $array['id_pelanggan']?> | <?php echo $array['nama_pelanggan']?></option>
					<?php
					}
					?>
				</select></td>
		</tr>
<?php
include '../koneksi.php';

	if(isset($_GET['idp'])){
	$_SESSION['idp'] = $_GET['idp'];
	}else{
		$sidp = "";
	}
	if (isset($_SESSION['idp'])) {
		$sidp = $_SESSION['idp'];
	}else{
		$sidp = "";
	}
 			$select = mysqli_query($koneksi,"SELECT * FROM tb_pelanggan WHERE id_pelanggan='$sidp'");
 			$array = mysqli_fetch_array($select);
?>

		<tr>
			<td>Nama Pelanggan</td>
			<td><input type="text" name="nama_pelanggan" placeholder="Nama Pelanggan" readonly="" value="<?php echo $array['nama_pelanggan']?>"></td>
		</tr>
		<tr>
			<td>No.HP</td>
			<td><input type="text" name="no_hp" placeholder="No.HP" readonly=""
				 value="<?php echo $array['no_hp']?>"></td>
		</tr>
	</table>
</form>

<h2>Menu Makanan dan Minuman</h2>
<form method="post">
	<table cellpadding="7px" cellspacing="7">		
<?php
$selects = mysqli_query($koneksi,"SELECT * FROM tb_menu WHERE id_menu='$idm'");
$arrays = mysqli_fetch_array($selects);?>
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
			<td>Harga</td>
			<td><input type="number" min="1" max="100000" name="harga"></td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td><input type="number" min="1" max="100000" name="jumlah"></td>
		</tr>
		<tr>
			<td><input type="submit" name="in" value="Input Pesanan" class='butin'></td>
		</tr>
	</table>
</form>
<?php
include '../koneksi.php';
	
	if (isset($_POST['in'])) {
		$a	= $_POST['nama_menu'];
		$b      = $_POST['jumlah'];
		$c   = $_POST['harga'];
		$query  	= mysqli_query($koneksi,"INSERT INTO tb_transaksi SET nama_menu='$a',jumlah='$b',harga = '$c'");
?>
<script type="text/javascript">
	window.location.href = "index.php?resto=transaksi";
</script> 
<?php
}
?>

	<table align="center" border="1" cellspacing="5" cellpadding="5" style=" width:100%;;height: 28%">
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
		<th bgcolor="cadetblue" colspan="7">Daftar Pembelian</th>
	</tr>
	<tr bgcolor="#C3C3C3">
		<th style="text-align:center;">No</th>
		<th style="text-align:center;">ID Transaksi</th>
		<th style="text-align:center;">Nama Menu</th>
		<th style="text-align:center;">Jumlah</th>
		<th style="text-align:center;">Harga</th>
		<th style="text-align:center;">Subtotal</th>
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
	
	$data = mysqli_query($koneksi,"SELECT * FROM tb_transaksi LIMIT $mulai, $halaman");
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
		<td style="text-align:center;"><?php echo $isi['id_transaksi'] ?></td>	
		<td style="text-align:center;"><?php echo $isi['nama_menu'] ?></td>
		<td style="text-align:center;"><?php echo $isi['jumlah'] ?></td>
			<td style="text-align:center;"><?php echo $isi['harga'] ?></td>	
			<?php
			$subtot = $isi['harga']*$isi['jumlah']; 
			?>
			<td style="text-align:center;"><?php echo $subtot ?></td>	
		<td style="text-align:center;">
			<a href="transaksihapus.php?id_transaksi=<?php echo $isi['id_transaksi'] ?>" class='butss'>Hapus</a>
			</td>
	</tr>
	<?php
	}
	?>
</table>
<br>
<form method="post">
	<table>
		<tr>
			<td>Bayar</td>
			<td><input type="number" min="1" max="100000" name="bayar"></td>
		</tr>
		<tr>
			<td><input type="submit" name="pay" value="Bayar" class='buts'></td>
		</tr>
	</table>
	<div>
	<?php
	$result = mysqli_query($koneksi,"SELECT * FROM tb_transaksi");
	$total = mysqli_num_rows($result);
	$pages = ceil($total/$halaman);

	for ($i=1; $i<=$pages ; $i++){?>
	<a href="?resto=transaksi&halaman2=<?php echo $i; ?>"><?php echo $i; ?></a>

	<?php } ?>

</div>
</form>
<?php
include '../koneksi.php';
	
	if (isset($_POST['pay'])) {
		$d	= $_POST['bayar'];
		$query  	= mysqli_query($koneksi,"UPDATE tb_transaksi SET bayar='$d'");
?>
<script type="text/javascript">
	window.location.href = "index.php?resto=transaksi";
</script> 
<?php
}
?>


<div align="center">
<a class="buts" href="cetak.php">Cetak</a>
</div>