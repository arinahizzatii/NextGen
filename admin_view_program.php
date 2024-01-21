<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//using session to track user information
session_start();

include("userconn.php"); 
include("func/nav_menu_admin.php");
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Lihat - Ahli Terpilih</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/logo.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/logo.png.png">

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
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

<div class="header">
		<div class="header-left">
		<div class="menu-icon dw dw-menu"></div>
		</div>
		<div class="header-right">
		

		</div>
	</div>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
    
    <!-- Export Datatable start -->
    <div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">List Ahli Terpilih</h4>
					</div>

					<div class="pb-20">
						<table class="table hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
									<th>No</th>
									<th>No.Kad Pengenalan</th>
									<th>Nama</th>
									<th>Email</th>
									<th>No. Tel</th>
									<th>Jantina</th>
									<th>Alamat</th>
									<th>Pendidikan</th>
									<th>Bidang Kursus</th>
									<th>Program</th>
								</tr>
							</thead>
							<tbody>

						<?php
							//$query_view_program = "SELECT * FROM user_profile";

                            $query_view_program = 
                            "SELECT * 
                            FROM program
                            INNER JOIN join_program ON program.Program_ID = join_program.Program_ID
                            INNER JOIN user_profile ON user_profile.User_ID = join_program.User_ID
                            ";

							$count = 1;
                            
							$result_view_program = mysqli_query($connection, $query_view_program);
							while($row_view_program = mysqli_fetch_assoc($result_view_program)){
								$program_User_ID = $row_view_program['User_ID'];
								$program_IC = $row_view_program['IC'];
								$program_Nama = $row_view_program['Nama'];
								$program_NoTel = $row_view_program['NoTel'];
								$program_Email = $row_view_program['Email'];
								$program_Jantina = $row_view_program['Jantina'];
								$program_Bangsa = $row_view_program['Bangsa'];
								$program_TarikhLahir = $row_view_program['TarikhLahir'];
								$program_Umur = $row_view_program['Umur'];
								$program_Alamat = $row_view_program['Alamat'];
								$program_TahapPendidikan = $row_view_program['TahapPendidikan'];
								$program_Kursus = $row_view_program['Kursus'];
                                $program_progNAME = $row_view_program['NamaProg'];
						?>

								<tr>
									<td><?php echo $count; ?></td>
									<td><?php echo $program_IC; ?></td>
									<td><?php echo $program_Nama; ?></td>
									<td><?php echo $program_Email; ?></td>
									<td><?php echo $program_NoTel; ?></td>
									<td><?php echo $program_Jantina; ?></td>
                                    <td><?php echo $program_Alamat; ?></td>
                                    <td><?php echo $program_Bangsa; ?></td>
                                    <td><?php echo $program_Kursus; ?></td>
                                    <td><?php echo $program_progNAME; ?></td>
								</tr>

								<?php $count++; } ?>

							</tbody>
						</table>
					</div>
				</div>
				<!-- Export Datatable End -->
            

			<div class="footer-wrap pd-20 mb-20 card-box">
				<!-- DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a> -->
				Laman ini dibangunkan oleh Unit Teknologi Maklumat Yayasan Pahang
			</div>

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
	<script src="vendors/scripts/datatable-setting.js"></script></body>

<script>
    function showSuccessAlert() {

        alert("Category has been successfully added!"); 
    }
</script>

</body>
</html>