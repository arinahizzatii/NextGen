<?php
	//using session to track user information
session_start();

if (isset($_SESSION["User_ID"])>0)
{
	include('userconn.php');
	include("func/check_profile.php");
	include("func/get_profile.php");
	include("func/nav_menu.php");
}
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
				</div>
			</div>
		</div>
	</div>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">

				<!-- Bordered table  start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Soalan Psikometrik</h4>
						</div>						
					</div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th class="text-center" colspan="2">SOALAN PSIKOMETRIK</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<style>
									td .btn {
										width: 80%;
										border-radius: 50px;
									}
								</style>

								<?php 
								$isAnsweredMasuk = false; 

								if (isset($_SESSION['User_ID'])) {

									$userId = $_SESSION['User_ID'];

									$checkAns = "SELECT p.Psikometrik_ID, p.Soalan_Psikometrik, j.JawapanPsi_ID, j.jawapan, j.User_ID
									FROM psikometrik p
									JOIN jawapan_psikometrik j ON p.Psikometrik_ID = j.Psikometrik_ID
									WHERE j.User_ID = '".$userId."'";

									$checkAnsQuery = mysqli_query($connection, $checkAns);

									if (mysqli_num_rows($checkAnsQuery) > 0) {
										$isAnsweredMasuk = true;
									}
								}
								?>
								<td colspan="2" class="text-center">
									<?php if ($isAnsweredMasuk==true) { ?>
										<button type="button" class="btn btn-info btn-sm" disabled>Selesai Menjawab</button>
									<?php } else { ?>
										<a href="SoalanPsikometrik.php" type="button" class="btn btn-success btn-sm">Jawab Soalan</a>
									<?php } ?>

								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- Bordered table End -->

			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				<!--DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>-->
				Laman ini dibangunkan oleh Unit Teknologi Maklumat Yayasan Pahang
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script>

</body>
</html>