<?php

session_start();
include "config/koneksi.php";
error_reporting(0);

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>APOTEK - Identifikasi User</title>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/bootstrap.bundle.js"></script>
</head>
<body>
	<?php
	include "navs.php";
	if (isset($_SESSION['level'])){
		?>
		<div class="container mt-5">
			<div class="row justify-content-center">
				<div class="col-md-5">
					<div class="card">
						<div class="card-body">
							<form action="edit-user.php?id=<?php echo $_SESSION['id']; ?>" method="post">
								<h1>Identifikasi</h1>
								<div class="form-group">
									<label for="password">Masukan Password</label>
									<input type="password" class="form-control" id="password" name="password" required="">
								</div>
								<input type="submit" name="auth" class="btn btn-outline-primary" value="Lanjutkan">
								<a class="btn btn-outline-primary" href="profil-user.php" role="button">Batal</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php		
	}?>
</body>
</html>
<?php 

if (isset($_POST['auth'])) {
	$pass = $_POST['password'];
	if($_SESSION['level']=="admin"){
		$query = mysqli_query($conn,"SELECT * FROM tbl_user WHERE password='$pass'");
		$tampung = mysqli_fetch_array($query);
		if ( $pass <> $tampung['password']){
			echo "
			<br />
			<div class='alert alert-danger' role='alert' align='center'>
			Password salah !
			</div>";
		} else {
			echo "<script>
				document.location='edit-user.php';
			</script>";
		}
	} elseif ($_SESSION['level']=="user") {

	}
}

?>		