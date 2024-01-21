<?php
	//using session to track user information
	session_start();

	if (isset($_SESSION["User_ID"])>0)
	{
		include('userconn.php');
		//include("func/check_profile.php");
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

<?php include("userconn.php"); ?>

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
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p">

							<h5 class="text-center h5 mb-0">MAKLUMAT PERIBADI</h5>

							<p class="text-center text-muted font-14"></p>

							<?php
								if (isset($_SESSION['User_ID'])) {

									$sql = "SELECT * FROM user_profile WHERE User_ID = '".$_SESSION["User_ID"]."'";
									$query = mysqli_query($connection, $sql) or die("Search not found");
									$row = mysqli_fetch_array($query);
							?>

							<div class="profile-info">
								<!--<h5 class="mb-20 h5 text-blue">Maklumat Peribadi</h5>-->
								<ul>
									<li>
										<span>No. Kad Pengenalan:</span>
										<?php echo $row['IC']; ?>
									</li>

									<li>
										<span>Nama Penuh:</span>
										<?php echo $row['Nama']; ?>
									</li>

									<li>
										<span>Nombor Telefon:</span>
										<?php echo $row['NoTel']; ?>
									</li>

									<li>
										<span>Email:</span>
										<?php echo $row['Email']; ?>
									</li>

									<li>
										<span>Jantina:</span>
										<?php echo $row['Jantina']; ?>
									</li>

									<li>
										<span>Bangsa:</span>
										<?php echo $row['Bangsa']; ?>
									</li>

									<li>
										<span>Tarikh Lahir:</span>
										<?php echo $row['TarikhLahir']; ?>
									</li>

									<li>
										<span>Umur:</span>
										<?php echo $row['Umur']; ?>
									</li>

									<li>
										<span>Alamat:</span>
										<?php echo $row['Alamat']; ?>
									</li>

									<li>
										<span>Daerah:</span>
										<?php echo $row['Daerah']; ?>
									</li>

									<li>
										<span>Tahap Pendidikan:</span>
										<?php echo $row['TahapPendidikan']; ?>
									</li>

									<li>
										<span>Kursus:</span>
										<?php echo $row['Kursus']; ?>
									</li>

									<li>
										<span>Pendapatan Isi Rumah:</span>
										<?php echo $row['Pendapatan_Rumah']; ?>
									</li>

								</ul>
							</div>
							<?php
								}
							?>
						</div>
					</div>
					
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="card-box height-100-p overflow-hidden">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#setting" role="tab"><h5 class="text-center h5 mb-0">TETAPAN</h5></a>
										</li>
									</ul>

									<?php
										if (isset($_SESSION['User_ID'])) {

											$sql = "SELECT * FROM user_profile WHERE User_ID = '".$_SESSION["User_ID"]."'";
											$query = mysqli_query($connection, $sql) or die("Search not found");
											$row = mysqli_fetch_array($query);
									?>

									<div class="tab-content">
										<!-- setting Tab start -->
										<div class="tab-pane fade show active" id="timeline" role="tabpanel">
											<div class="pd-20">	
																						
												<form action="profileprocess.php" method="POST" onsubmit="return showUpdateAlert()">

													<ul class="profile-edit-list row">
														<li class="weight-500 col-md-6">
															<!--<h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4>-->

															<!--No Kad Pengenalan-->
															<div class="form-group">
																<label>No. Kad Pengenalan</label>
																<input class="form-control form-control-lg" name="useric" id="useric" type="text" value="<?php echo $row['IC']; ?>" readonly>
															</div>

															<!--Email-->
															<div class="form-group">
																<label>Email</label>
																<input class="form-control form-control-lg" type="email" name="Email" id="Email" value="<?php echo $row['Email']; ?>">
															</div> 
															
															<!-- Gender -->
															<div class="form-group" id="Jantina">
																<label for="customRadio4">Jantina</label>
																<div class="d-flex">
																	<div class="custom-control custom-radio mb-5 mr-20">
																		<input type="radio" id="customRadio4" name="Jantina" class="custom-control-input" value="Lelaki" <?php if ($row['Jantina'] == 'Lelaki') echo 'checked'; ?> required>
																		<label class="custom-control-label weight-400" for="customRadio4">Lelaki</label>
																	</div>
																	<div class="custom-control custom-radio mb-5">
																		<input type="radio" id="customRadio5" name="Jantina" class="custom-control-input" value="Perempuan" <?php if ($row['Jantina'] == 'Perempuan') echo 'checked'; ?> required>
																		<label class="custom-control-label weight-400" for="customRadio5">Perempuan</label>
																	</div>
																</div>
															</div>

															<!--Tarikh Lahir-->
															<div class="form-group">
																<label>Tarikh Lahir</label>
																<input class="form-control" type="date" name="TarikhLahir" id="TarikhLahir" value="<?php echo $row['TarikhLahir']; ?>" required>
															</div>

															<!--Address-->
															<div class="form-group">
																<label>Alamat</label>
																<textarea class="form-control" type="text" name="Alamat" id="Alamat"  required><?php echo $row['Alamat']; ?></textarea>
															</div>

															<!--DAERAH-->
															<div class="form-group">
																<label>Daerah</label>
																<select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="- Pilih -" name="Daerah" id="Daerah" required>
																	<option value="Kuantan" <?php if ($row['Daerah'] == 'Kuantan') echo 'selected'; ?>>Kuantan</option>
																	<option value="Temerloh"  <?php if ($row['Daerah'] == 'Temerloh') echo 'selected'; ?>>Temerloh</option>
																	<option value="Bentong"  <?php if ($row['Daerah'] == 'Bentong') echo 'selected'; ?>>Bentong</option>
																	<option value="Pekan"  <?php if ($row['Daerah'] == 'Pekan') echo 'selected'; ?>>Pekan</option>
																	<option value="Raub"  <?php if ($row['Daerah'] == 'Raub') echo 'selected'; ?>>Raub</option>
																	<option value="Jerantut" <?php if ($row['Daerah'] == 'Jerantut') echo 'selected'; ?>>Jerantut</option>
																	<option value="Maran"  <?php if ($row['Daerah'] == 'Maran') echo 'selected'; ?>>Maran</option>
																	<option value="Bera"  <?php if ($row['Daerah'] == 'Bera') echo 'selected'; ?>>Bera</option>
																	<option value="Rompin"  <?php if ($row['Daerah'] == 'Rompin') echo 'selected'; ?>>Rompin</option>
																	<option value="Lipis"  <?php if ($row['Daerah'] == 'Lipis') echo 'selected'; ?>>Lipis</option>
																	<option value="Cameron Highlands"  <?php if ($row['Daerah'] == 'Cameron Highlands') echo 'selected'; ?>>Cameron Highlands</option>
																	<option value="Lain-lain"  <?php if ($row['Daerah'] == 'Lain-lain') echo 'selected'; ?>>Lain-lain</option>
																</select>
															</div>
														</li>

														<li class="weight-500 col-md-6">
		
															<!--Nama Penuh-->
															<div class="form-group">
																<label>Nama Penuh</label>
																<input class="form-control form-control-lg" type="text" name="Nama" id="Nama" value="<?php echo $row['Nama']; ?>" required>
															</div>

															<!--Phone Number-->
															<div class="form-group">
																<label>Nombor Telefon</label>
																<input class="form-control form-control-lg" type="text" name="NoTel" id="NoTel" value="<?php echo $row['NoTel']; ?>" required>
															</div>

															<!--Bangsa-->
															<div class="form-group">
																<label for="Bangsa">Bangsa</label>
																<select class="selectpicker form-control form-control-lg" name="Bangsa" id="Bangsa" title="- Pilih -" data-style="btn-outline-secondary btn-lg" required>
																	<option value="Melayu" <?php if ($row['Bangsa'] == 'Melayu') echo 'selected'; ?>>Melayu</option>
																	<option value="Cina" <?php if ($row['Bangsa'] == 'Cina') echo 'selected'; ?>>Cina</option>
																	<option value="India" <?php if ($row['Bangsa'] == 'India') echo 'selected'; ?>>India</option>
																	<option value="Orang Asli" <?php if ($row['Bangsa'] == 'Orang Asli') echo 'selected'; ?>>Orang Asli</option>
																</select>
															</div>

															<!--Umur-->
															<div class="form-group">
																<label>Umur</label>
																<input class="form-control form-control-lg" type="text" name="Umur" id="Umur" value="<?php echo $row['Umur']; ?>" required>
															</div>

															<!--Tahap Pendidikan-->
															<div class="form-group">
																<label>Tahap Pendidkan</label>
																<select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="- Pilih -" name="TahapPendidikan" id="TahapPendidikan" required>
																	<option value="Asasi" <?php if ($row['TahapPendidikan'] == 'Asasi') echo 'selected'; ?>>Asasi</option>
																	<option value="Diploma"  <?php if ($row['TahapPendidikan'] == 'Diploma') echo 'selected'; ?>>Diploma</option>
																	<option value="Degree"  <?php if ($row['TahapPendidikan'] == 'Degree') echo 'selected'; ?>>Degree</option>
																	<option value="Master"  <?php if ($row['TahapPendidikan'] == 'Master') echo 'selected'; ?>>Master</option>
																	<option value="PHD"  <?php if ($row['TahapPendidikan'] == 'PHD') echo 'selected'; ?>>PHD</option>
																</select>
															</div>

															<!--Kursus-->
															<div class="form-group">
																<label>Bidang Kursus</label>
																<input class="form-control form-control-lg" type="text" name="Kursus" id="Kursus" value="<?php echo $row['Kursus']; ?>" required>
															</div>

															<!--PENDAPATAN ISI RUMAH-->
															<div class="form-group">
																<label>Pendapatan Isi Rumah</label>
																<select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="- Pilih -" name="Pendapatan_Rumah" id="Pendapatan_Rumah" required>
																	<option value="Lebih dari RM7,600" <?php if ($row['Pendapatan_Rumah'] == 'Lebih dari RM7,600') echo 'selected'; ?>>Lebih dari RM7,600</option>
																	<option value="RM 4,000 - RM 7,500"  <?php if ($row['Pendapatan_Rumah'] == 'RM 4,000 - RM 7,500') echo 'selected'; ?>>RM 4,000 - RM 7,500</option>
																	<option value="RM 2,600 - RM 3,900"  <?php if ($row['Pendapatan_Rumah'] == 'RM 2,600 - RM 3,900') echo 'selected'; ?>>RM 2,600 - RM 3,900</option>
																	<option value="Bawah RM 2,500"  <?php if ($row['Pendapatan_Rumah'] == 'Bawah RM 2,500') echo 'selected'; ?>>Bawah RM 2,500</option>
																</select>
															</div>

															<div class="form-group mb-0">
																<input type="submit" class="btn btn-primary" value="Kemas Kini Maklumat" name="update">
															</div>
														</li>
													</ul>	
												</form>
											</div>
										</div>
										<!-- Setting Tab End -->

										<?php
											}
										 ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				<!-- DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a> -->
				Laman ini dibangunkan oleh Unit Teknologi Maklumat Yayasan Pahang
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/cropperjs/dist/cropper.js"></script>
	
	

	<script>
		function out() {
            var result = confirm('Are you sure to logout?');
            if (result == false) {
                event.preventDefault();
            }
        }
	</script>

	<script>
			function showUpdateAlert() {
				// Display a confirmation dialog with a custom message
				var confirmation = confirm("Are you sure you want to update your information?");

				// Check if the user clicked OK (true) or Cancel (false)
				if (confirmation) {
					alert("Information updated successfully!");
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