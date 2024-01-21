<?php
	//using session to track user information
	session_start();
?>

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
	<link rel="stylesheet" type="text/css" href="src/plugins/cropperjs/dist/cropper.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>

<?php include("userconn.php");  ?>

</head>
<body>

	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
					</a>
				</div>
			</div>
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown"></a>
				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
						<?php
							if(isset($_SESSION['User_ID'])) {

								$sql = "SELECT * FROM user_profile WHERE User_ID = '".$_SESSION["User_ID"]."'";
								$query = mysqli_query($connection, $sql) or die("Search not found");
								$row = mysqli_fetch_array($query);

								echo '<span class="ic">' . $row['Nama'] .'</span>';
								echo '<p class="email">' . $row["Email"].'</p>';
							}
							else{
								echo "<meta http-equiv=\"refresh\" content=\"2;URL=login.php\"/>";
							}
						?>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.html">
				<img src="/nextgen/img/logonextgen.png" alt="" class="dark-logo">
				<img src="/nextgen/img/logonextgen.png" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">

					<!--DASHBOARD-->
					<li>
						<a href="#" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
						</a>
					</li>

					<!--MAKLUMAT PERIBADI-->
					<li>
						<a href="profile1.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user1"></span><span class="mtext">Maklumat Peribadi</span>
						</a>
					</li>

					<!--EVALUASI-->
					<li>
						<a href="evaluation.php" class="dropdown-toggle no-arrow">
							<span class="micon icon-copy ion-android-create"></span><span class="mtext">Evaluasi</span>
						</a>
					</li>

					<!--SHARING-->
					<li>
						<a href="#" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-heart-o"></span><span class="mtext">Sharing</span>
						</a>
					</li>
					
					<!--IKLAN PROGRAM--> 
					<li>
						<a href="#" class="dropdown-toggle no-arrow">
							<span class="micon icon-copy ti-announcement"></span><span class="mtext">Iklan Program</span>
						</a>
					</li>
	
					<!--APLIKASI-->
					<li>
						<a href="#" class="dropdown-toggle no-arrow">
							<span class="micon icon-copy ti-import"></span><span class="mtext">Muat Turun Aplikasi</span>
						</a>
					</li>

					<!--LOGOUT-->
					<li>
						<a onclick="out()" href="logout.php" class="dropdown-toggle no-arrow">
							<span class="micon icon-copy dw dw-logout-2"></span><span class="mtext">Log Keluar</span>
						</a>
					</li>
					
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					
                    <div class="col-md-4">
						<img src="img/logonextgen.png" alt="">
					</div>

                        <div class="col-md-8">
                                <?php
                                    if (isset($_SESSION['User_ID'])) {

                                        $sql = "SELECT * FROM user_profile WHERE User_ID = '".$_SESSION["User_ID"]."'";
                                        $query = mysqli_query($connection, $sql) or die("Search not found");
                                        $row = mysqli_fetch_array($query);
                                ?>

                                <h3 class="font-22 weight-500 mb-10 text-capitalize">
                                	<b>SELAMAT DATANG</b>
                                    <div class="weight-600 font-30 text-blue"><i><?php echo $row['Nama']; ?></i></div>
                                </h3>                          
	
                                <p class="font-18 max-width-600">lalalal</p>
								
                                <?php
                                    }
                                ?>

								<?php 
								/* accesses the value stored in the 'formSubmitted' session variable. If the variable exists and is set, it retrieves its value.
								$formSubmitted will be true only if the session variable 'formSubmitted' exists and is set to true. 
								It's a way to check whether a specific condition has been met or whether a particular action, such as submitting a form, 
								has occurred during the user's session.*/

								$formSubmitted = isset($_SESSION['formSubmitted']) && $_SESSION['formSubmitted'];
                                //$quesSubmitted = isset($_SESSION['quesSubmitted']) && $_SESSION['quesSubmitted'];
								?>
								<div class="form-group mb-0">
									<?php if (!$formSubmitted) { ?>
										<a class="btn btn-primary" href="soalanmasuk.php" role="button">Soalan Masuk</a>
									<?php } else { ?>
										<a class="btn btn-primary" href="soalankeluar.php" role="button">Soalan Keluar</a>
									<?php } ?>
								</div>
						</div>
					</div>
				</div>

			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Holy guacamole!</strong> You should check in on some of those fields below.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
          
			<div class="footer-wrap pd-20 mb-20 card-box">
			Laman ini dibangunkan oleh Unit Teknologi Maklumat Yayasan Pahang
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard.js"></script>

    <script>
		function out() {
            var result = confirm('Are you sure to logout?');
            if (result == false) {
                event.preventDefault();
            }
        }
	</script>

    <script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>

	<!-- add sweet alert js & css in footer -->
	<script src="src/plugins/sweetalert2/sweetalert2.all.js"></script>
	<link rel="stylesheet" type="text/css" href="src/plugins/sweetalert2/sweetalert2.css">
	<script src="src/plugins/sweetalert2/sweet-alert.init.js"></script>

</body>
</html>