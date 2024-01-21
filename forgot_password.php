<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>NEXTGEN</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="/nextgen/img/Logo.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/nextgen/img/Logo.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/nextgen/img/Logo.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>

<body>
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<!-- <img src="vendors/images/deskapp-logo.svg" alt=""> -->
					<img src="img/logonextgen.png" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="login.php">Log Masuk</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<img src="vendors/images/forgot-password.png" alt="">
				</div>
				<div class="col-md-6">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Lupa Kata Laluan</h2>
						</div>

						<form action="forgot_password_process.php" method="post">
						<h6 class="mb-20">Masukkan maklumat untuk reset kata laluan</h6>

							<div class="input-group custom">
								<input type="text" name="user_Email" id="user_Email" class="form-control form-control-lg" placeholder="Emel" required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
								</div>
							</div>

							<div class="input-group custom">
								<input type="text" name="user_IC" id="user_IC" class="form-control form-control-lg" placeholder="No. Kad Pengenalan" required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
								</div>
							</div>

							<h6 class="mb-20">Masukkan kata laluan baharu</h6>

							<div class="input-group custom">
								<input type="text" name="user_Password" id="user_Password" class="form-control form-control-lg" placeholder="Kata Laluan Baharu" required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1" aria-hidden="true"></i></span>
								</div>
							</div>

							<div class="input-group custom">
								<input type="text" name="user_Password_Confirm" id="user_Password_Confirm" class="form-control form-control-lg" placeholder="Sahkan Kata Laluan" required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1" aria-hidden="true"></i></span>
								</div>
							</div>

							<div class="row align-items-center">
								<div class="col-5">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
										-->
										<input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
									</div>
								</div>
								<div class="col-2">
									<div class="font-16 weight-600 text-center" data-color="#707373">ATAU</div>
								</div>
								<div class="col-5">
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="login.php">Log Masuk</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>

</html>