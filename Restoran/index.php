<title>Restoran</title>
<link rel="stylesheet" type="text/css" href="design.css">
<div class="wrap">
	<h2><div class="header">APLIKASI KASIR RESTORAN</div></h2>
	<div class="menu">
		<a href="index.php"><div class="list-menu">Home</div></a>
		<a href="login.php"><div class="list-menu">Login</div></a>
		<a href="register.php"><div class="list-menu">Registrasi</div></a>
	</div>
	<div class="isi">
		<?php
		if (isset($_GET['act'])) {
			$act = $_GET['act'];
		}else{ 
			$act = "";
		}
		switch ($act) {
			case 'menu':
				include 'menu.php';
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


