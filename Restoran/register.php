<?php
include 'koneksi.php';
if(isset($_POST['daftar'])) {
$a  = $_POST['username'];
$b  = $_POST['password'];
$c = $_POST['level'];
$sel   = mysqli_query($koneksi,"INSERT INTO tb_user SET username='$a',password='$b',level='$c'");
?>
<script type="text/javascript">
	alert('Selamat Register Berhasil !!!');
	window.location.href = 'login.php';
</script>
<?php
}
?>
<link rel="stylesheet" type="text/css" href="style.css">


<body>
	<div class="header">
  		<h2>Registrasi</h2>
  </div>
<form method="post">

<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username">
  	</div>

	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>

	<div class="input-group">
	<label>Level</label>
	<select name="level">
		<option selected="">Pilih Level</option>
		<option value="kasir">Administrator</option>
		<option value="waiter">Waiter</option>
		<option value="kasir">Kasir</option>
		<option value="waiter">Owner</option>
	</select>	
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="daftar">Daftar</button>
		<button type="reset" class="btnn" name="batal">Batal</button>
	</div>
	<p>
		Sudah Punya Akun? <a href="login.php">Login</a>
	</p>
</form>
</body>
