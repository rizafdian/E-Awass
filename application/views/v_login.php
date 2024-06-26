<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login APIK</title>
	<link rel="icon" href="<?= base_url() ?>assets/template/dist/img/AdminLTELogo.png" type="image/x-icon" />
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/template/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<p class="fong-weight-bold">APIK</p>
			<p class="font-weight-lighter" style="font-size:medium;">(Aplikasi Pengawasan Internal Kinerja)</p>
		</div>

		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Silahkan login untuk memulai</p>
				<?php if ($this->session->flashdata('message_login_error')) : ?>
					<div class="invalid-feedback">
						<?= $this->session->flashdata('message_login_error') ?>
					</div>
				<?php endif ?>
				<form action="" method="post">
					<div class="input-group mb-3">
						<input type="text" name="username" class="form-control" placeholder="Username" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" name="password" class="form-control" placeholder="Password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
								<!--  <input type="checkbox" id="remember">
              <label for="remember">
                Ingat Saya
              </label> -->
							</div>
						</div>
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" value="Login" class="btn btn-primary btn-block">Masuk</button>
						</div>
						<!-- /.col -->
					</div>
				</form>

				<p class="mb-1">
					<a href="forgot-password.html">Lupa Password? Klik disini</a>
				</p>
				<p class="mb-0">
					<a href="register.html" class="text-center">Belum Punya Akun? Buat Akun Baru</a>
				</p>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?= base_url() ?>assets/template/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url() ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url() ?>assets/template/dist/js/adminlte.min.js"></script>
</body>

</html>