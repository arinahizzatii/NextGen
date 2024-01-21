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

        

                <div class="html-editor pd-20 card-box mb-30">
                    <h4 class="h4 text-blue">PROGRAM NEXTGEN</h4>

                    <?php $jenis_program = ''; if (isset($_POST["jenis_program"])) {$jenis_program=$_POST["jenis_program"];} ?>

                <form action="" method="POST">
                    <div class="form-group">
                    <label for="jenis_program" style="font-size: 12px;color:grey">Jenis Program:</label>
                    <select class="selectpicker form-control form-control-lg" name="jenis_program" id="jenis_program" title="- Pilih -" data-style="btn-outline-secondary btn-lg" required onChange="submit()">
                    <option value="0" <?php if ($jenis_program == '0') echo 'selected'; ?>>Program Tanpa Kod</option>
                    <option value="1" <?php if ($jenis_program == '1') echo 'selected'; ?>>Program Dengan Kod</option>
                    </select>
                    </div>
                </form>


				
            <form action="admin_create_new_program_process.php" method="POST">

			<?php $program_terpilih = ''; if (isset($_POST["program_terpilih"])) {$jenis_program=$_POST["program_terpilih"];} ?>

				<div class="form-group">
                    <label for="program_terpilih" style="font-size: 12px;color:grey">Program Terpilih:</label>
                    <select class="selectpicker form-control form-control-lg" name="program_terpilih" id="program_terpilih" title="- Pilih -" data-style="btn-outline-secondary btn-lg" required onChange="submit()">
                    <option value="0" <?php if ($program_terpilih == '0') echo 'selected'; ?>>Tidak</option>
                    <option value="1" <?php if ($program_terpilih == '1') echo 'selected'; ?>>Ya</option>
                    </select>
                </div>


                    <input name="jenis_program" type="hidden" value="<?php echo $jenis_program ?>">
                <?php if($jenis_program=='0') { ?>
                        <div class="form-group">
							<label style="font-size: 12px;color:grey">Kod Program:</label>
							<input name="kod_program" class="form-control" type="text" placeholder="Masukkan kod..." value="No Code" disabled>
						</div>
                    <?php } else { ?>
                        <div class="form-group">
							<label style="font-size: 12px;color:grey">Kod Program:</label>
							<input name="kod_program" class="form-control" type="text" placeholder="Masukkan kod..." required>
						</div>
                    <?php } ?>


                    <div class="form-group">
							<label style="font-size: 12px;color:grey">Tajuk Program:</label>
							<input name="tajuk_program" class="form-control" type="text" placeholder="Masukkan tajuk..." required>
						</div>

                    <div class="form-group">
					<label>Tarikh Mula</label>
					<input class="form-control" type="date" name="datestart" id="datestart" required>
					</div>

                    <div class="form-group">
					<label>Tarikh Tamat</label>
					<input class="form-control" type="date" name="dateend" id="dateend" required>
					</div>

                    <div class="form-group mb-0">
                        <input type="submit" class="btn btn-primary" value="Hantar" name="submit">
                    </div>
            </form>
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