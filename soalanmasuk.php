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

	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<!--<i class="dw dw-settings2"></i>-->
					</a>
				</div>
			</div>
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown"></a>
				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">

					<?php
						if(isset($_SESSION['User_ID'])) {

							$sql = "SELECT * FROM user_profile WHERE User_ID = '".$_SESSION["User_ID"]."'";
							$query = mysqli_query($connection, $sql) or die("Search not found");
							$row = mysqli_fetch_array($query);

							echo '<span class="ic">' . $row['Nama'] .'</span>';
							echo '<p class="email">' . $_SESSION["useremail"].'</p>';
						}
						else{
							echo "<meta http-equiv=\"refresh\" content=\"2;URL=login.php\"/>";
						}
					?>
				
				</div>
			</div>
		</div>
	</div>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				
						<!-- FORM -->
						<div class="pd-20 card-box mb-30">
							<?php
								$cat = "SELECT * FROM kategori_soalan";
								$res = mysqli_query($connection, $cat);
								
								// Initialize variables for category outside the loop
								$categoryid = "";
								$categoryques = "";
								
								while ($row = mysqli_fetch_assoc($res)) {
									// Assign category values inside the loop
									$categoryid = $row['ID_kategori_soalan'];
									$categoryques = $row['kategori_soalan'];
							?>	

							<?php
								//query bawah category
								$queryx = "SELECT * FROM soalan_r where ID_kategori_soalan='$categoryid' AND cin_cout='Mula'";
								$resultx = mysqli_query($connection, $queryx);
								if (mysqli_num_rows($resultx)>0){
							?>	
						
							<div class="clearfix">
									<div class="pull-left">
										<h4 class="text-blue h4"><?php echo $categoryques; ?></h4>
										<h5 class="mb-30"></h5>
									</div>
							</div>

							<form action="SoalanProcess.php" method="POST">
									<?php
									// Query for questions
									$query = "SELECT * FROM soalan_r WHERE ID_kategori_soalan = '$categoryid' AND cin_cout = 'Mula'";
									$result = mysqli_query($connection, $query);

									$bilangan = 0; // Initialize a variable to keep track of the question number

									while ($row = mysqli_fetch_assoc($result)) {
										$questionId = $row['ID_soalan'];
										$questionText = $row['soalan'];					

										$rating = '';
									?>
									<div class="form-group">
										<label class="weight-600"><?= ++$bilangan; ?>. <?= $questionText; ?></label>
										<input type="hidden" name="questionId[]" id="progID" value="<?= $questionId; ?>">
										<br>
										<select name="rating[]" class="selectpicker form-control" title="- Pilih -"> 
											<option value="1" <?php if ($rating == '1') { echo 'selected'; } ?>>Sangat Tidak Setuju</option>
											<option value="2" <?php if ($rating == '2') { echo 'selected'; } ?>>Tidak Setuju</option>
											<option value="3" <?php if ($rating == '3') { echo 'selected'; } ?>>Tidak Pasti</option>
											<option value="4" <?php if ($rating == '4') { echo 'selected'; } ?>>Setuju</option>
											<option value="5" <?php if ($rating == '5') { echo 'selected'; } ?>>Sangat Setuju</option>
										</select>
										<br>
									</div>
									<?php
										}

									$progID = $_GET['Program_ID'];
									?>

									<input type="hidden" name="Program_ID" id="Program_ID" value="<?php echo $progID; ?>" placeholder="<?php echo $progID; ?>">
								<?php 
								}}
								?>
									<div class="form-group mb-0">
										<input type="submit" class="btn btn-primary" value="Hantar" name="submit">
									</div>
							</form>
							</div>
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
</body>
</html>