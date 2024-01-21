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
		</div>
	</div>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">

            <form action="admin_create_news_process.php" method="POST">

                <div class="html-editor pd-20 card-box mb-30">
                    <h4 class="h4 text-blue">PENGUMUMAN NEXTGEN</h4>

                    <?php $jenis_berita = ''; ?>

                    <div class="form-group">
                    <label for="jenis_berita" style="font-size: 12px;color:grey">Jenis Pengumuman:</label>
                    <select class="selectpicker form-control form-control-lg" name="jenis_berita" id="jenis_berita" title="- Pilih -" data-style="btn-outline-secondary btn-lg" required>
                    <option value="">-Pilih-</option>
                    <option value="1" <?php if ($jenis_berita == '1') echo 'selected'; ?>>Pengumuman Utama NextGen</option>
                    <option value="2" <?php if ($jenis_berita == '2') echo 'selected'; ?>>Pengumuman Sampingan NextGen</option>
                    </select>
                    </div>

                    <div class="form-group">
							<label style="font-size: 12px;color:grey">Tajuk Pengumuman:</label>
							<input name="tajuk_berita" class="form-control" type="text" placeholder="Masukkan tajuk..." required>
					</div>

					<div class="form-group">
							<label style="font-size: 12px;color:grey">Created By:</label>
							<input name="createby" class="form-control" type="text" placeholder="Masukkan Nama..." required>
					</div>

                    <div class="form-group">
					<label style="font-size: 12px;color:grey">Perkara Pengumuman:</label>
                    <textarea name="perkara_berita" class="textarea_editor form-control border-radius-0" placeholder="Masukkan perkara..." required></textarea>
                    </div>

                    <div class="form-group mb-0">
                        <input type="submit" class="btn btn-primary" value="Hantar" name="submit">
                    </div>

                </div>
            </div>
            </form>

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