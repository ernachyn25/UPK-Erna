<title>Restoran</title>
<link rel="stylesheet" type="text/css" href="../design.css">
<div class="wrap">
	<h2><div class="header">APLIKASI KASIR RESTORAN</div></h2>
	<div class="menu">
		<a href="index.php?resto=home"><div class="list-menu">Home</div></a>
		<a href="index.php?resto=menu"><div class="list-menu">Menu</div></a>
		<a href="index.php?resto=order"><div class="list-menu">Order</div></a>
		<a href="index.php?resto=laporan"><div class="list-menu">Laporan</div></a>
		<?php
		$jam = date('d-m-Y H:i:s');
		?>
	 <a href="../logout.php"><div class="list-menu2">Logout</div></a>
	 <div class="list-menu2">WELCOME <?php echo $_SESSION['useraktif'] ?>Waiter
	 </div>
	 <div class="list-menu2"><?php echo $jam ?></div>
	 </div>
	<div class="isi">
	 <?php
	 if (isset($_GET['resto'])) {
	 	$resto = $_GET['resto'];
	 }else{
	 	$resto = "";
	 }
	 switch ($resto) {
	 	case 'halaman':
	 		include 'menu.php';
	 		break;
	 	case 'bayar':
	 		include 'bayar.php';
	 		break;
	 	case 'cetak':
	 		include 'cetak.php';
	 		break;
	 	case 'menu':
	 		include 'menu.php';
	 		break;
	 	case 'medit':
	 		include 'medit.php';
	 		break;
	 	case 'order':
	 		include 'order.php';
	 		break;
	 	case 'halaman1':
	 		include 'order.php';
	 		break;	
	 	case 'laporan':
	 		include 'laporan.php';
	 		break;
	 	case 'halaman4':
	 		include 'laporan.php';
	 		break;
	 	default:
				include 'home.php';
				break;
		}
		?>
	</div>
	<div class="footer">
		<marquee>Erna Cahayani,2019.Copyright &copy; Aplikasi Resto</marquee>
	</div>
</div>