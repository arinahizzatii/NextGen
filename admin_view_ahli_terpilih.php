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

	<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
    
    <!-- Striped table start -->
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
								</tr>
							</thead>
							<tbody>
								<?PHP 	
								
									$query_view_terpilih = "SELECT * FROM user_profile WHERE user_terpilih='1'";
									$result_view_terpilih = mysqli_query($connection, $query_view_terpilih);

									$count = 1;

									while($row_view_terpilih = mysqli_fetch_assoc($result_view_terpilih)){
									
										?>
								<tr>
									<th><?php echo $count; ?></th>
									<td><?php echo $row_view_terpilih['IC'];?></td>
									<td><?php echo $row_view_terpilih['Nama'];?></td>
									<td><?php echo $row_view_terpilih['Email'];?></td>
									<td><?php echo $row_view_terpilih['NoTel'];?></td>
									<td><?php echo $row_view_terpilih['Jantina']?></td>
									<td><?php echo $row_view_terpilih['Alamat'];?></td>
									<td><?php echo $row_view_terpilih['TahapPendidikan'];?></td>
									<td><?php echo $row_view_terpilih['Kursus'];?></td>

									<?php
										$count++;
										}
									?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- Striped table End -->
            

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