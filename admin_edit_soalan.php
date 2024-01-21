<?php
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
	<title>Edit Soalan</title>

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
                <h4 class="h4 text-blue">EDIT</h4>

                <?php
					if (isset($_GET['ID_soalan'])) {
						// Retrieve the question details based on the provided ID_soalan
						$id_soalan = $_GET['ID_soalan'];

						$sql = "SELECT sr.ID_soalan, sr.soalan, sr.cin_cout, ks.ID_kategori_soalan, ks.kategori_soalan
								FROM soalan_r sr
								INNER JOIN kategori_soalan ks ON sr.ID_kategori_soalan = ks.ID_kategori_soalan
								WHERE sr.ID_soalan = $id_soalan";

						$query = mysqli_query($connection, $sql);
						$row = mysqli_fetch_array($query);
						
					
					?>

					<form action="admin_edit_soalan_process.php" method="POST" enctype="multipart/form-data" onsubmit="return showUpdateAlert()">
						<input name="ID_soalan" type="hidden" value="<?php echo $id_soalan; ?>">

						<!-- SOALAN FORM -->
						<div class="form-group">
							<label style="font-size: 12px;color:grey">Soalan:</label>
							<input name="soalan" class="form-control" type="text" value="<?php echo $row['soalan']; ?>" required>
						</div>

						<!-- CHOOSE KATEGORI FORM -->
						<div class="form-group">
							<label for="kategori_soalan" style="font-size: 12px; color: grey">Kategori:</label>
							<select class="selectpicker form-control form-control-lg" name="ID_kategori_soalan" id="ID_kategori_soalan" data-style="btn-outline-secondary btn-lg" required>
								<?php
								// Create an SQL query to fetch the data from the "kategori_soalan" table
								$sqlCat = "SELECT ID_kategori_soalan, kategori_soalan FROM kategori_soalan";
								$resultCat = mysqli_query($connection, $sqlCat);

								while ($data = mysqli_fetch_array($resultCat)) {
									$selected = ($data["ID_kategori_soalan"] == $row["ID_kategori_soalan"]) ? "selected" : "";
									echo "<option value='{$data['ID_kategori_soalan']}' $selected>{$data['kategori_soalan']}</option>";
								}
								?>
							</select>
						</div>

						<!-- CHECK IN / CHECK OUT -->
						<div class="form-group">
							<label for="cin_cout" style="font-size: 12px; color: grey">Mula/Akhir Program:</label>
							<select class="selectpicker form-control form-control-lg" name="cin_cout" id="cin_cout" data-style="btn-outline-secondary btn-lg" required>
								<?php

								$sqlQues = "SELECT  `ID_soalan`, `soalan`, `ID_kategori_soalan`, `cin_cout` FROM soalan_r";
								$resultQues = mysqli_query($connection, $sqlQues);

								while ($dataQues = mysqli_fetch_array($resultQues)){
									$selectedQues = ($dataQues["ID_soalan"] == $row["ID_soalan"]) ? "selected" : "";
									echo "<option value='{$dataQues['ID_soalan']}' $selected>{$dataQues['cin_cout']}</option>";
								}
		
								?>
							</select>
						</div>

						<!-- SUBMIT BUTTON FORM -->
						<div class="form-group mb-0">
							<input type="submit" class="btn btn-primary" value="Kemas Kini Maklumat" name="update">
							<a href="admin_soalan.php" class="btn btn-danger" role="button">Batal</a>
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
            var confirmation = confirm("Are you sure you want to update question information?");

            // Check if the user clicked OK (true) or Cancel (false)
            if (confirmation) {
                alert("Question updated successfully!");
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