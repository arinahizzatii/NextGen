<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Daftar Masuk</title>

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
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.php">
					<!--<img src="vendors/images/deskapp-logo.svg" alt="">-->
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
				<div class="col-md-6 col-lg-7">
					<img src="vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Daftar Akaun</h2>
						</div>

						<form action="registerProcess.php" method="POST">

							<div class="input-group custom">
								<input type="text" name="user_IC" id="user_IC" class="form-control form-control-lg" placeholder="No. Kad Pengenalan" required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>

							<div class="input-group custom">
								<input type="text" name="user_Email" id="user_Email" class="form-control form-control-lg" placeholder="Email" required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy fa fa-envelope-o" aria-hidden="true"></i></span>
								</div>
							</div>

							<div class="input-group custom">
								<input type="password" name="user_Password" id="user_Password" class="form-control form-control-lg" placeholder="Password" required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>

							<div class="input-group custom">
								<input type="password" name="user_CPassword" id="user_CPassword" class="form-control form-control-lg" placeholder="Confirm Password" required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>

							<div class="input-group custom">
								<input type="hidden" name="User_ID" id="User_ID"  hidden>

							</div>

							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<input class="btn btn-primary btn-lg btn-block" value="Daftar Masuk" type="submit"></a>
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">ATAU</div>
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