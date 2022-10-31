<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>Perpustakaan - Daftar</title>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/bootstrap.bundle.js"></script>
</head>
<body>
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="card">
					<div class="card-body">
						<form action="" method="post">
							<h1 align="center">DAFTAR</h1>
							<div class="form-group">
								<label for="nama">Name</label>
								<input type="text" class="form-control" id="nama" placeholder="Masukan Nama" name="nama" required="">
							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" id="username" placeholder="Username" name="username" required="">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" placeholder="Password"  name="password" required="" maxlength="18" minlength="8">
							</div>
							<div class="form-group">
								<label for="jenis_kelamin">jenis Kelamin</label>
								<select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required="">
									<option>Masukan Jenis Kelamin</option>
									<option value="Laki-Laki">Laki-Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>	
							<div class="form-group">
								<label for="tp_lahir">Tempat Lahir</label>
								<input type="text" class="form-control" id="tp_lahir" placeholder="Tempat Lahir" name="tp_lahir" required="">
							</div>
							<div class="form-group">
								<label for="tgl_lahir">Tanggal Lahir</label>
								<input type="date" class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir" name="tgl_lahir" required="">
							</div>
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" required="">
							</div>
							<div class="form-group">
								<label for="no_telp">Nomor Telepon</label>
								<input type="text" class="form-control" id="no_telp" placeholder="Nomor Telepon" name="no_telp" required="">
							</div>
							<input type="submit" class="btn btn-outline-primary" value="Daftar" name="daftar">
							<a class="btn btn-outline-primary" href="index.php" role="button">Kembali</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php 
include "config/koneksi.php";

if (isset($_POST['daftar'])) {
	$name = $_POST['nm_user'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$level = "user";
	$jk = $_POST['jenis_kelamin'];
	$tp_lahir = $_POST['tp_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$almt = $_POST['alamat'];
	$no_telp = $_POST['no_telp'];
	$query = mysqli_query($conn,"SELECT * FROM tbl_user where username='$user'");
	if (mysqli_num_rows($query) > 0) {
		echo "
		<div class='alert alert-danger' role='alert' align='center'>
		Username sudah terdaftar !
		</div>";
	} else {
		$save = mysqli_query($conn,"INSERT INTO tbl_user (nm_user,username,password,level,jenis_kelamin,tp_lahir,tgl_lahir,alamat,no_telp) VALUES ('$name','$user','$pass','user','$jk','$tp_lahir','$tgl_lahir','$almt','$no_telp')");
		if ($save) {
			echo "<script> alert('Berhasil Mendaftar ! Silahkan Login')</script>";
			echo "<meta http-equiv='refresh' content='1 url=login.php'>";
		} else {
			echo mysqli_error($conn);
			echo "<script> alert('Proses Gagal !')</script>";
			echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
		}
	}

}

?>