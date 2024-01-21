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
	<title>EDIT - PROGRAM</title>

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
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
			</div>
		</div>
		<div class="header-right">
			<div class="user-info-dropdown">
				<div class="dropdown">
						<?php
								/*if(isset($_SESSION['User_ID'])) {

									$sql = "SELECT * FROM user_profile WHERE User_ID = '".$_SESSION["User_ID"]."'";
									$query = mysqli_query($connection, $sql) or die("Search not found");
									$row = mysqli_fetch_array($query);

									echo '<span class="ic">' . $row['Nama'] .'</span>';
									echo '<p class="email">' . $row["Email"].'</p>';
								}
								else{
									echo "<meta http-equiv=\"refresh\" content=\"2;URL=../login.php\"/>";
								}*/
							?>
					</a>
				</div>
			</div>

		</div>
	</div>
                
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
          
                <div class="html-editor pd-20 card-box mb-30">
                <h4 class="h4 text-blue">EDIT PROGRAM</h4>

                <?php
					if (isset($_GET['Program_ID'])) {
						// Retrieve the question details based on the provided ID_soalan
						$Program_ID = $_GET['Program_ID'];

						$sql = "SELECT * FROM program WHERE Program_ID = $Program_ID";

						$query = mysqli_query($connection, $sql);
						$row = mysqli_fetch_array($query);
						
					
					?>

					<form action="admin_edit_program_process.php" method="POST" enctype="multipart/form-data" onsubmit="return showUpdateAlert()">
						<input name="Program_ID" type="hidden" value="<?php echo $Program_ID; ?>">

						<!-- NAMA PROG -->
						<div class="form-group">
							<label style="font-size: 12px;color:grey">Nama Program:</label>
							<input name="NamaProg" class="form-control" type="text" value="<?php echo $row['NamaProg']; ?>" required>
						</div>
                        

                        <!--Date Start-->
						<div class="form-group">
                        <label style="font-size: 12px;color:grey">Tarikh Mula:</label>
							<input class="form-control" type="date" name="DateStart" id="DateStart" value="<?php echo $row['DateStart']; ?>" required>
						</div>

                        <!--Date End-->
						<div class="form-group">
                        <label style="font-size: 12px;color:grey">Tarikh Tamat:</label>
							<input class="form-control" type="date" name="DateEnd" id="DateEnd" value="<?php echo $row['DateEnd']; ?>" required>
						</div>

                        <!-- CODE -->
						<div class="form-group">
							<label style="font-size: 12px;color:grey">Kod Program:</label>
							<input name="Code" class="form-control" type="text" value="<?php echo $row['Code']; ?>" required>
						</div>

						<!-- Program Terpilih -->
						<div class="form-group">
							<label for="program_terpilih" style="font-size: 12px; color: grey">Program Terpilih:</label>
							<select class="selectpicker form-control form-control-lg" name="program_terpilih" id="program_terpilih" data-style="btn-outline-secondary btn-lg" required>
								<option value="1" <?php echo ($row['program_terpilih'] === '1') ? 'selected' : ''; ?>>Ya</option>
								<option value="0" <?php echo ($row['program_terpilih'] === '0') ? 'selected' : ''; ?>>Tidak</option>
							</select>
						</div>

						<!-- SUBMIT BUTTON FORM -->
						<div class="form-group mb-0">
							<input type="submit" class="btn btn-primary" value="Kemas Kini Maklumat" name="update">
							<a href="admin_update_program.php" class="btn btn-danger" role="button">Batal</a>
						</div>
					</form>
					<?php
					}?>
                </div>
            </div> 
           

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

	<script>
        function showUpdateAlert() {
            // Display a confirmation dialog with a custom message
            var confirmation = confirm("Are you sure you want to update program information?");

            // Check if the user clicked OK (true) or Cancel (false)
            if (confirmation) {
                alert("Program updated successfully!");
                // You can add code here to perform the actual update
                return true; // Allow the form to submit
            } else {
                alert("Update canceled.");
                return false; // Prevent the form from submitting
            }
        }
    </script>

</body>
</html>