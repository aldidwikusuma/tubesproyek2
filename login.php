<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <title>APOTEK - Login</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <h1 align="center">LOGIN</h1>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Username"
                                    name="username" required="">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password"
                                    name="password" required="">
                            </div>
                            <input type="submit" class="btn btn-outline-primary" value="Masuk" name="login">
                            <a class="btn btn-outline-primary" href="index.php" role="button">Kembali</a>
							<hr>
							<a href="daftar.php">Belum punya akun ? Silahkan daftar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php

if (isset($_POST['login'])) {
	if (isset($_POST['auth'])) {
		session_start();
		include "config/koneksi.php";
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$query = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username='$user'");
		$tampung = mysqli_fetch_array($query);
		$cek = mysqli_num_rows($query);

		if ($cek == 0) {
			echo "
			<br />
			<div class='alert alert-danger' role='alert' align='center'>
			Username tidak terdaftar !
			</div>";
		} elseif ($pass <> $tampung['password']) {
			echo "
			<br />
			<div class='alert alert-danger' role='alert' align='center'>
			Password salah !
			</div>";
		} elseif ($user && $pass = $tampung['username'] && $tampung['password']) {
			$_SESSION['level'] = $tampung['level'];
			$_SESSION['id'] = $tampung['id_user'];
			$_SESSION['name'] = $tampung['nm_user'];
?>
<script>
alert('Anda Berhasil Login !');
document.location = "index.php";
</script>
<?php
		}
	} else {
		session_start();
		include "config/koneksi.php";
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$query = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username='$user'");
		$tampung = mysqli_fetch_array($query);
		$cek = mysqli_num_rows($query);

		if ($cek == 0) {
			echo "
			<br />
			<div class='alert alert-danger' role='alert' align='center'>
			Username tidak terdaftar !
			</div>";
		} elseif ($pass <> $tampung['password']) {
			echo "
			<br />
			<div class='alert alert-danger' role='alert' align='center'>
			Password salah !
			</div>";
		} elseif ($user && $pass = $tampung['username'] && $tampung['password']) {
			$_SESSION['level'] = $tampung['level'];
			$_SESSION['id'] = $tampung['id_user'];
			$_SESSION['name'] = $tampung['nm_user'];
		?>
<script>
alert('Anda Berhasil Login !');
document.location = "index.php";
</script>
<?php
		}
	}
}
?>