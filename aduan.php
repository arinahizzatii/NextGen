<?php
session_start();
include("userconn.php");

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
	<div class="pre-loader">

	</div>

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
	
				<!-- horizontal Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Aduan</h4>
						</div>
						
					</div>
					<form action="aduan_process.php" method="POST" onsubmit="return showUpdateAlert()">
                        <div class="form-group">
                                <label style="font-size: 12px;color:grey">Tajuk Aduan:</label>
                                <input name="tajuk_aduan" class="form-control" type="text" placeholder="Masukkan tajuk..." required>
                            </div>

                        <div class="form-group">
                        <label style="font-size: 12px;color:grey">Perkara Aduan:</label>
                        <textarea name="perkara_aduan" class="textarea_editor form-control border-radius-0" placeholder="Masukkan perkara..." required></textarea>
                        </div>

                        <div class="form-group mb-0">
                            <input type="submit" class="btn btn-primary" value="Hantar" name="submit">
                        </div>
                    </form> 

                        </code></pre>
						</div>
					</div>
				</div>
				<!-- horizontal Basic Forms End -->
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
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
            var confirmation = confirm("Are you sure you want to send this aduan?");

            // Check if the user clicked OK (true) or Cancel (false)
            if (confirmation) {
                alert("Succesfull!");
                // You can add code here to perform the actual update
                return true; // Allow the form to submit
            } else {
                alert("Unsuccessful.");
                return false; // Prevent the form from submitting
            }
        }
    </script>
</body>
</html>