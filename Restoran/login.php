<link rel="stylesheet" type="text/css" href="style.css">

<body>
	<div class="header">
  		<h2>Erna Resto</h2>
  </div>

  <form method="post" action="plogin.php">
	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div align="center" class="input-group">
  		<button type="submit" class="btn" name="login_user">Masuk</button>
      <button type="reset" class="btnn" name="reset">Batal</button>
  	</div>
	<p>
		Belum Punya Akun? <a href="register.php">Buat Akun</a>
	</p>
</form>
</body>