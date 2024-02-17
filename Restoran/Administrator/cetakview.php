<link rel="stylesheet" type="text/css" href="button.css">
<h2>Laporan Penjualan Erna Resto</h2>
<form method="post">
<form>
	<table align="center" border="1" cellspacing="3" cellpadding="3" style=" width:100%;height: 50%">
    <td height="20" colspan="8" border="0">
    <div align="right">
	<tr bgcolor="#C3C3C3">
		<th style="text-align:center;">No</th>
		<th style="text-align:center;">Pelanggan</th>
		<th style="text-align:center;">Menu</th>
		<th style="text-align:center;">Jumlah</th>
		<th style="text-align:center;">Harga</th>
		<th style="text-align:center;">Tot Belanja(Rp)</th>
		<th style="text-align:center;">Tanggal</th>
		<th style="text-align:center;">Opsi</th>
	</tr>

	<?php

	include '../koneksi.php';
	$no = '1';	
	$data = mysqli_query($koneksi,"SELECT * FROM v_all");
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
		<td style="text-align:center;"><a href="cetak.php" class='butss'>View</a></td>

	</tr>
	<?php
	}
	?>
</table>
<script type="text/javascript">
	window.print();
</script>