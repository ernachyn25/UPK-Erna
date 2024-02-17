<?php
session_start();
include 'koneksi.php';

$user  = $_POST['username'];
$pass  = $_POST['password'];
$sel   = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username='$user' AND password='$pass'");
$tab = mysqli_fetch_array($sel);

if (mysqli_num_rows($sel)>0) {
	$_SESSION['useraktif'] = $tab['username'];
	if ($tab['level']==administrator) {
		header("location:administrator/index.php");
	}elseif($tab['level']==kasir) {
		header("location:kasir/index.php");
	}elseif ($tab['level']==owner) {
		header("location:owner/index.php");
	}elseif ($tab['level']==waiter) {
		header("location:waiter/index.php");
	}
}else{
?>
<script type="text/javascript">
	alert('Username dan Password salah !!');
	window.location.href = 'login.php';
</script>
<?php
}
?>













