<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//using session to track user information
session_start();


		include('userconn.php');
		include("func/get_profile.php");
		include("func/nav_menu.php");

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
			<?php include 'func/user_topper.php'; ?>
		</div>
	</div>

    <div class="mobile-menu-overlay"></div>

    <!-- PAGE CODE HERE LATER -->

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				
				<div class="faq-wrap">
					<h4 class="mb-20 h4 text-blue">Pengumuman Utama</h4>
					<div id="accordion">

					<?php

					$sql_berita_UTAMA = "SELECT * FROM berita WHERE jenis_berita='1'";
					$res_berita_UTAMA = mysqli_query($connection, $sql_berita_UTAMA);

					while($row_berita_UTAMA = mysqli_fetch_array($res_berita_UTAMA)){
						$ID_berita = $row_berita_UTAMA['ID_berita'];
						$tajuk_berita = $row_berita_UTAMA['tajuk_berita'];
						$perkara_berita = $row_berita_UTAMA['perkara_berita'];

					?>	
				
						<div class="card">
							<div class="card-header">
								<button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq<?php echo $ID_berita; ?>">
								<?php echo $tajuk_berita;?>
								</button>
							</div>
							<div id="faq<?php echo $ID_berita; ?>" class="collapse" data-parent="#accordion">
								<div class="card-body">
									<p><?php echo $tajuk_berita;?></p>
									<p class="mb-0"><?php echo $perkara_berita;?></p>
								</div>
							</div>
						</div>
						<?php } ?> 
					</div>


					<h4 class="mb-30 h4 text-blue padding-top-30">Pengumuman Sampingan</h4>
                    <div class="padding-bottom-30">

					<?php

					$sql_berita_UTAMA = "SELECT * FROM berita WHERE jenis_berita='2'";
					$res_berita_UTAMA = mysqli_query($connection, $sql_berita_UTAMA);

					while($row_berita_UTAMA = mysqli_fetch_array($res_berita_UTAMA)){
					$ID_berita = $row_berita_UTAMA['ID_berita'];
					$tajuk_berita = $row_berita_UTAMA['tajuk_berita'];
					$perkara_berita = $row_berita_UTAMA['perkara_berita'];

					?>

                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq6-<?php echo $ID_berita; ?>">
								<?php echo $tajuk_berita;?>
                                </button>
                            </div>
                            <div id="faq6-<?php echo $ID_berita; ?>" class="collapse">
                                <div class="card-body">
                                    <p><?php echo $tajuk_berita;?></p>
                                    <p class="mb-0"><?php echo $perkara_berita;?></p>
                                </div>
                            </div>
                        </div>
						<?php } ?> 
                    </div>


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
</body>
</html>