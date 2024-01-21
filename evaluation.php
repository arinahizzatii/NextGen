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
			<?php include 'func/user_topper.php'; ?>
		</div>
	</div>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">

                <!-- Bordered table  start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Evaluasi</h4>
						</div>						
					</div>
					<table class="table table-bordered">
						<thead>
                                <tr>
                                    <th class="text-center table-plus datatable-nosort" >NO</th>
                                    <th class="text-center table-plus datatable-nosort" >PROGRAM</th>
                                    <th class="text-center" >PENILAIAN MASUK</th>
                                    <th class="text-center" >PENILAIAN KELUAR</th>
                                </tr>
						</thead>
						<tbody>
                                <?php
                                $sqlTable = "SELECT user_profile.*, join_program.Program_ID, program.NamaProg
                                            FROM user_profile
                                            INNER JOIN join_program ON user_profile.User_ID = join_program.User_ID
                                            INNER JOIN program ON join_program.Program_ID = program.Program_ID
                                            WHERE user_profile.User_ID = '" . $_SESSION["User_ID"] . "'";

                                // Execute the query
                                $queryTable = mysqli_query($connection, $sqlTable);

                                $count = 1;

                                // Loop through the results and display the data in the table
                                while ($rowTable = mysqli_fetch_array($queryTable)) {
                                ?>
                                    <tr>
                                        <style>
                                            td .btn {
                                                width: 80%;
                                                border-radius: 50px;
                                            }
                                        </style>
										<?php 
												$Program_ID = $rowTable["Program_ID"];
												$isAnsweredMasuk = false; 
												$isAnsweredKeluar = false; 

												if (isset($_SESSION['User_ID'])) {
													$userId = $_SESSION['User_ID'];
													$checkAnsMSql = "SELECT j.*FROM jawapan_r j INNER JOIN soalan_r s ON j.ID_soalan = s.ID_soalan WHERE 
													j.User_ID = '$userId' AND j.Program_ID = '$Program_ID' AND s.cin_cout = 'Mula';";
													$checkAnsMQuery = mysqli_query($connection, $checkAnsMSql);

													$checkAnsKSql = "SELECT j.*FROM jawapan_r j INNER JOIN soalan_r s ON j.ID_soalan = s.ID_soalan
													WHERE j.User_ID = '$userId' AND j.Program_ID = '$Program_ID' AND s.cin_cout = 'Akhir';";
													$checkAnsKQuery = mysqli_query($connection, $checkAnsKSql);

													if (mysqli_num_rows($checkAnsMQuery) > 0) {
														$isAnsweredMasuk = true;
													}else{
														$isAnsweredMasuk = false;
													}
													if (mysqli_num_rows($checkAnsKQuery) > 0) {
														$isAnsweredKeluar = true;
													}else{
														$isAnsweredKeluar = false;
													}
												}
											?>

                                        <td class="text-center"><?php echo $count; ?></td>
                                        <td class="text-center"><?php echo $rowTable["NamaProg"]; ?></td>
                                        <td class="text-center">
										<?php if ($isAnsweredMasuk==true) { ?>
											<button type="button" class="btn btn-info btn-sm" disabled>Selesai Menjawab</button>
											<?php } else { ?>
											<a href="soalanmasuk.php?Program_ID=<?php echo $rowTable['Program_ID']; ?>" type="button" class="btn btn-success btn-sm">Jawab Soalan</a>
											<?php } ?>

										</td>
                                        <td class="text-center">

										<!-- <?php //if ($isAnsweredKeluar) { ?>
											<button type="button" class="btn btn-info btn-sm" disabled>Sudah Dijawab</button>
											<?php //} else { ?>
											<a href="soalankeluar.php?Program_ID=<?php //echo $rowTable['Program_ID']; ?>" type="button" class="btn btn-success btn-sm">Soalan Keluar</a>
											<?php //} ?> -->

											<?php if ($isAnsweredMasuk==false) { ?>
											<button type="button" class="btn btn-danger btn-sm" disabled>Selepas Program</button>
											<?php } else if ($isAnsweredKeluar==true) {?>
											<button type="button" class="btn btn-info btn-sm" disabled>Selesai Menjawab</button>
											<?php } else { ?>
											<a href="soalankeluar.php?Program_ID=<?php echo $rowTable['Program_ID']; ?>" type="button" class="btn btn-success btn-sm">Jawab Soalan</a>
											<?php } ?>
										</td>
                                    </tr>
                                <?php
                                    $count++;
                                }
                                ?>
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