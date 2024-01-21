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
	<title>Ahli Terpilih</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/logo.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/logo.png.png">

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
							
							<?php
								$txtSearch = "";
								if (isset($_POST['searchbtn'])){
									$txtSearch = $_POST['txtsearch'];
								}

								$bil=0;
								$sql = "SELECT * FROM user_profile WHERE IC LIKE '%" . $txtSearch . "%'";
								$query = mysqli_query($connection, $sql) or die("Search not found");
                        	?>
					
						<form action="PesertaProcess.php" method="POST">
							<table class="table hover multiple-select-row data-table-export nowrap">
								<thead>
									<tr>
									<th>
										<div class="dt-checkbox">
											<input type="checkbox" name="select_all" value="1" id="example-select-all">
											<span class="dt-checkbox-label"></span>
										</div>
									</th>
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
										//include 'userconn.php';
		
										/*$sql = "SELECT *
										FROM user_profile";
										$query = mysqli_query($connection, $sql) or die("not found");*/
										
										$count = 1;
										while ($row= mysqli_fetch_array($query)) {
											$bil=$bil+1;
									?>
									<tr>
										<td>
											<!-- Checkbox buttons -->
											<div class="checkbox-container">
												<div class="dt-checkbox">
													<input type="checkbox" name="selected_items[<?php echo $bil; ?>]" class="select-checkbox" value="<?php echo $row['User_ID']; ?>">
													<span class="dt-checkbox-label"></span>
												</div>
											</div>
										</td>
										<th><?php echo $count; ?></th>
										<td><?php echo $row['IC'];?></td>
										<td><?php echo $row['Nama'];?></td>
										<td><?php echo $row['Email'];?></td>
										<td><?php echo $row['NoTel'];?></td>
										<td><?php echo $row['Jantina']?></td>
										<td><?php echo $row['Alamat'];?></td>
										<td><?php echo $row['TahapPendidikan'];?></td>
										<td><?php echo $row['Kursus'];?></td>

										<?php
											$count++;
											}
										?>
									</tr>
								</tbody>
							</table>

							<style>
								.btn-primary {
									margin-left: 20px; 
								}
							</style>
							<div class="form-group mb-20">
								<input type="hidden" name="terpilih" id="terpilih" value="<?php echo $row['user_terpilih']; ?>">
								<input type="submit" class="btn btn-primary" value="Hantar" name="submit">
								<input type="hidden" name="bilangan_pelajar" value="<?php echo $bil; ?>">
							</div>
						</form>
					</div>
				</div>
				<!-- Striped table End -->
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
	<script src="vendors/scripts/datatable-setting.js"></script></body>

<!--SELECT ALL CHECKBOX-->
<script>
    // Get a reference to the "Select All" checkbox
    const selectAllCheckbox = document.getElementById("example-select-all");

    // Get all the individual checkboxes with the class "select-checkbox"
    const individualCheckboxes = document.querySelectorAll(".select-checkbox");

    // Add an event listener to the "Select All" checkbox
    selectAllCheckbox.addEventListener("change", function () {
        const isChecked = this.checked;

        // Set the state of all individual checkboxes to match the "Select All" checkbox
        individualCheckboxes.forEach(function (checkbox) {
            checkbox.checked = isChecked;
        });
    });
</script>

<!--POPUP CHECKBOX-->
<script>
	// Get references to the checkbox elements
	const checkboxes = document.querySelectorAll(".select-checkbox");
	const popup = document.getElementById("popup-dialog");
	const okayButton = document.getElementById("okay-button");

	// Add an event listener to each checkbox
	checkboxes.forEach((checkbox) => {
		checkbox.addEventListener("change", function () {
			if (this.checked) {
				// Display the common popup when a checkbox is checked
				popup.style.display = "block";
			} else {
				// Hide the common popup when a checkbox is unchecked
				popup.style.display = "none";
			}
		});
	});


</script>

</body>
</html>
