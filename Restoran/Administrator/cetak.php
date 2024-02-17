<body style="text-transform: uppercase;font-family: Trebuchet MS,sans-serif;">
<div align="center">
	<h2 align="center" style="font-size: 50px">Resto</h2>
	<h4 align="center" style="margin-top: -20px"><i>Jl. Boja </i></h4><hr>
	<table cellspacing="5" cellpadding="5">
		<tr>
			<th>Nama Menu</th>
			<th>Jumlah Beli</th>
			<th>Harga</th>
			<th>Total</th>
		</tr>
		<?php
	include '../koneksi.php';
	$no = '1';
	$data = mysqli_query($koneksi,"SELECT * FROM tb_transaksi");
	while ($z = mysqli_fetch_array($data)) {
	?>
		<tr>
			<td><?php echo $z['nama_menu']?></td>
			<td align="center"><?php echo $z['jumlah'] ?></td>
			<td><?php echo $z['harga']?></td>
			<?php
			$subtot = $z['harga']*$z['jumlah'];
			?>
			<td align="center"><?php echo $subtot ?></td>
	
		</tr>

		<tr>
			<td colspan="3" align="right">Bayar</td>
			<td colspan=""><?php echo  number_format($z['bayar']) ?></td>
		</tr>
		<?php
			$subtot = $z['harga']*$z['jumlah'];
		$kembali = $z['bayar']-$subtot;
		?>
		<tr>
			<td colspan="3" align="right">Kembalian</td>
			<td colspan=""><?php echo $kembali ?></td>
		</tr>
<?php 
}
?>
	</table>
</div>
<hr>
	<h4 align="center" style="font-size: 18px">=== Terima Kasih Telah Berkunjung ====</h4>
	<h4 align="center" style="margin-top: -20px">Erna Resto</h4>
	<p align="center" style="font-size: 15px;">Eat,Lunch,dinner,breakfast you can get in here</p>
</body>

<script type="text/javascript">
	window.print();
</script>