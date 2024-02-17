<link rel="stylesheet" type="text/css" href="button.css">
<h2>Laporan Penjualan Erna Resto</h2>
<form method="post">
<form>
	<table align="center" border="1" cellspacing="3" cellpadding="3" style=" width:100%;height: 50%">
    <td height="20" colspan="7" border="0">
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
		<th bgcolor="cadetblue" colspan="7">Laporan Penjualan</th>
	</tr>
	<tr bgcolor="#C3C3C3">
		<th style="text-align:center;">No</th>
		<th style="text-align:center;">Pelanggan</th>
		<th style="text-align:center;">Menu</th>
		<th style="text-align:center;">Jumlah</th>
		<th style="text-align:center;">Harga</th>
		<th style="text-align:center;">Tot Belanja(Rp)</th>
		<th style="text-align:center;">Tanggal</th>
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
	
	$data = mysqli_query($koneksi,"SELECT * FROM v_all LIMIT $mulai, $halaman");
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
		<td style="text-align:center;"><?php echo $isi['nama_pelanggan'] ?></td>
		<td style="text-align:center;"><?php echo $isi['nama_menu'] ?></td>
		<td style="text-align:center;"><?php echo $isi['jumlah'] ?></td>
		<td style="text-align:center;"><?php echo $isi['harga'] ?></td>	
			<?php
			$subtot = $isi['harga']*$isi['jumlah']; 
			?>
			<td style="text-align:center;"><?php echo $subtot ?></td>
			<td style="text-align:center;"><?php echo $isi['tanggal'] ?></td>	

	</tr>
	<?php
	}
	?>
</table>

<div>
	<?php
	$result = mysqli_query($koneksi,"SELECT * FROM v_all");
	$total = mysqli_num_rows($result);
	$pages = ceil($total/$halaman);

	for ($i=1; $i<=$pages ; $i++){?>
	<a href="?resto=menu&halaman4=<?php echo $i; ?>"><?php echo $i; ?></a>

	<?php } ?>

</div>
</form>
<div align="center">
<a class="buts" href="cetakview.php">Cetak</a>
</div>