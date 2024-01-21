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
	<title>Edit Psychometric Test</title>

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
                    if (isset($_GET['Psikometrik_ID'])) {
                        $id = $_GET['Psikometrik_ID'];

                        $sql = "SELECT * FROM psikometrik WHERE Psikometrik_ID = '$id'";
                        $query = mysqli_query($connection, $sql);
                        $row = mysqli_fetch_array($query);
                    ?>

                    <form action="admin_edit_psikometrik_process.php" method="POST" enctype="multipart/form-data" onsubmit="return showUpdateAlert()">
                        <input name="Psikometrik_ID" class="form-control" type="hidden" value="<?php echo $row['Psikometrik_ID']; ?>">

                        <!-- CATEGORY FORM -->
                        <div class="form-group">
                            <label style="font-size: 12px;color:grey">Soalan Psikometrik:</label>
                            <input name="Soalan_Psikometrik" class="form-control" type="text" placeholder="Masukkan Soalan..." value="<?php echo $row['Soalan_Psikometrik']; ?>" required>
                        </div>

                        <!-- SUBMIT BUTTON FORM -->
                        <div class="form-group mb-0">
                            <input type="submit" class="btn btn-primary" value="Kemas Kini Maklumat" name="submit">
                            <a href="admin_psikometrik.php" class="btn btn-danger" role="button" aria-disabled="true">Batal</a>
                        </div>
                    </form>

                    <?php
                        }
                    ?>
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
            var confirmation = confirm("Are you sure you want to update psychometric question information?");

            // Check if the user clicked OK (true) or Cancel (false)
            if (confirmation) {
                alert("Psychometric question updated successfully!");
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