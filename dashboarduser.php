<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//using session to track user information
session_start();


if (isset($_SESSION["User_ID"])>0)
	{
		include('userconn.php');
		include("func/get_profile.php");
		include("func/nav_menu.php");
	}else{echo "<meta http-equiv=\"refresh\" content=\"1;URL=login.php\"/>";}
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

<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>

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

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				
				<div class="blog-wrap">
					<div class="container pd-0">
						<div class="row">
							<div class="col-md-8 col-sm-12">
								<div class="blog-detail card-box overflow-hidden mb-30">
									<div class="blog-img">
									<img src="img/logonextgen1.png" alt="">
									</div>
									<div class="blog-caption">

									<!-- BERITA UTAMA // MAIN NEWS // ANNOUCENMENTS // PENGUMUMAN UTAMA -->
									<?php
									$QUERY_get_news_BIG = "SELECT * FROM berita WHERE jenis_berita='1' ORDER BY ID_berita DESC LIMIT 1";
									$RESULT_get_news_BIG = mysqli_query($connection,$QUERY_get_news_BIG);
									while ($row_BIG = mysqli_fetch_assoc($RESULT_get_news_BIG)){
										$news_title_BIG = $row_BIG['tajuk_berita'];
										$news_description_BIG = $row_BIG['perkara_berita'];
									}

									?>

										<h5 class="mb-10"><?php echo $news_title_BIG;?></h5>
										<p><?php echo $news_description_BIG;?></p>

									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="card-box mb-30">
									<h5 class="pd-20 h5 mb-0">Program NextGen</h5>

									<div class="list-group">

<!--------------------------- =========================================================================== ------------------------------->
<!--------------------------- PROGRAM TERPILIH START ------------------------------->
<!--------------------------- =========================================================================== ------------------------------->

							<?php
							//if (isset($_SESSION['User_ID'])) {

							$userId = $_SESSION['User_ID'];

							$sql_profile = "SELECT * FROM user_profile WHERE user_terpilih='1' AND User_ID = '$userId'";
							$query_profile = mysqli_query($connection, $sql_profile) or die("Search not found");
							$row_profile = mysqli_fetch_array($query_profile);

							if($row_profile){

							$currentDate = date("Y-m-d");
							$bilangan = 0;

							$query = "SELECT * FROM program WHERE program_terpilih='1' AND DateStart <= '$currentDate' AND DateEnd >= '$currentDate' ORDER BY Program_ID DESC";
							$result = mysqli_query($connection, $query);
							$rows = mysqli_num_rows($result);

							while ($rows = mysqli_fetch_assoc($result)){
								$programid = $rows['Program_ID'];
								$progname = $rows['NamaProg'];
								$start = $rows['DateStart'];
								$end = $rows['DateEnd'];	
								$kod = $rows['Code'];
								//$program_terpilih = $rows['program_terpilih'];

								//add this code to find the boolean of the registered user
								// Check if the user is registered for this program
								$isRegistered = false;
								//if (isset($_SESSION['User_ID'])) {
									//$userId = $_SESSION['User_ID'];
									$checkRegistrationSql = "SELECT * FROM join_program WHERE user_id = '$userId' AND program_id = '$programid'";
									$checkRegistrationQuery = mysqli_query($connection, $checkRegistrationSql);
									if (mysqli_num_rows($checkRegistrationQuery) > 0) {
										$isRegistered = true;
									}
								//}
								?>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">
										<!--List of Program-->
										<?php echo $bilangan = $bilangan + 1; ?>. <?php echo $progname ?> <!--(<?php /*echo*/ "$start - $end"; ?>)-->
										<span>

										<!--List of Program Button (Join/Evaluate)-->
										<?php if($isRegistered){ ?>
											<a type="button" class="btn btn-info btn-sm"  href="evaluation.php">Penilaian Program Terpilih</a>
										<?php } else if ($kod=="No Code") { ?>
											<a type="button" class="btn btn-warning masuk-button btn-sm" data-programid="<?php echo $programid; ?>" data-progname="<?php echo $progname; ?>" data-kod="<?php echo $kod; ?>">Sertai Program Terpilih</a>

								<!------------------------ MASUK PROGRAM START (No need to enter code)-------------------------------------------->

								
								<!--add the program ID in the popup section-->
								<!-- JavaScript for handling the Masuk button -->
								<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
								<script>
									$(document).ready(function () {
										$('.masuk-button').click(function () {
											const programID = $(this).data('programid');
											const codeProgram = $(this).data('progname');
											const kod = $(this).data('kod');
											$('#progID').val(programID);
												$('#textInput_second').val('No Code'); // Enter value 'No Code' for Code
												$('#textInputModal_second').modal('show');
											});
									});
								</script>


								<!--Popup sertai-->
								<div class="modal fade" id="textInputModal_second" tabindex="-1" role="dialog" aria-labelledby="textInputModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="textInputModalLabel_second">PROGRAM NEXTGEN</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											

											<div class="modal-body">
												<!-- Form to enter code -->
												<form action="codeprocess.php" method="POST">
													<div class="form-group">
													<label>Sertai Program</label>
													<label>"<?php echo $progname ?>"</label>

													<!--add the hidden variable to make verify in the process-->
													<input type="hidden" name="progID" id="progID" value=<?php echo $programid ?>>
													<input type="hidden" name="Code" id="textInput_second" value="No Code">

													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-primary" name="submit">Hantar</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>


								<!--MASUK POPUP JAVASCRIPT-->
								<script>
									// Handle the "Save" button click
									$("#saveText").click(function () {
										// Get the entered text
										var enteredText = $("#textInput_second").val();

										// Display the code entered
										alert("Kod Program: " + enteredText);

										// Close the modal
										$("#textInputModal_second").modal("hide");

										// Redirect to dasboarduser1.php
										window.location.href = "evaluation.php";
									});
								</script>

								<!------------------------ MASUK PROGRAM END (No need to enter code)-------------------------------------------->

										<?php } else { ?>
											<a type="button" class="btn btn-warning sertai-button btn-sm" data-programid="<?php echo $programid; ?>" data-progname="<?php echo $progname; ?>">Sertai Program Terpilih</a>

								<!------------------------ SERTAI PROGRAM START (Need to enter code)-------------------------------------------->

								<!--add the program ID in the popup section-->
								<!-- JavaScript for handling the Sertai button -->
								<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
								<script>
									$(document).ready(function () {
										$('.sertai-button').click(function () {
											const programID = $(this).data('programid');
											const codeProgram = $(this).data('progname');
											$('#progID').val(programID);
												$('#textInput').val(''); // Clear the input field
												$('#textInputModal').modal('show');
											});
									});
								</script>
			

								<!--Popup sertai-->
								<div class="modal fade" id="textInputModal" tabindex="-1" role="dialog" aria-labelledby="textInputModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="textInputModalLabel">PROGRAM NEXTGEN</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>


											<div class="modal-body">
												<!-- Form to enter code -->
												<form action="codeprocess.php" method="POST">
													<div class="form-group">
														<label for="textInput">Masukkan Kod Program:</label>
														<input type="text" class="form-control" id="textInput" name="Code" required>

														<!--add the hidden variable to make verify in the process-->
														<input type="hidden" name="progID" id="progID" value=<?php echo $programid ?>>

													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-primary" name="submit">Hantar</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>


								<!--SERTAI POPUP JAVASCRIPT-->
								<script>
									// Handle the "Save" button click
									$("#saveText").click(function () {
										// Get the entered text
										var enteredText = $("#textInput").val();

										// Display the code entered
										alert("Kod Program: " + enteredText);

										// Close the modal
										$("#textInputModal").modal("hide");

										// Redirect to dasboarduser1.php
										window.location.href = "evaluation.php";
									});
								</script>

								<!------------------------ SERTAI PROGRAM END (Need to enter code)-------------------------------------------->

									<?php } } 
									}else{
										#code...
									} //} 
									?>

									</span></a>
			
<!--------------------------- =========================================================================== ------------------------------->
<!--------------------------- PROGRAM TERPILIH END ------------------------------->
<!--------------------------- =========================================================================== ------------------------------->
								


<!--------------------------- =========================================================================== ------------------------------->
                                                        <!--------------------------- PROGRAM BIASA START ------------------------------->
<!--------------------------- =========================================================================== ------------------------------->

							<?php
							//if (isset($_SESSION['User_ID'])) {

							$currentDate = date("Y-m-d");
							$bilangan = 0;
							$query = "SELECT * FROM program WHERE program_terpilih='0' AND DateStart <= '$currentDate' AND DateEnd >= '$currentDate' ORDER BY Program_ID DESC";
							$result = mysqli_query($connection, $query);
							$rows = mysqli_num_rows($result);

							while ($rows = mysqli_fetch_assoc($result)){
								$programid = $rows['Program_ID'];
								$progname = $rows['NamaProg'];
								$start = $rows['DateStart'];
								$end = $rows['DateEnd'];	
								$kod = $rows['Code'];

								//add this code to find the boolean of the registered user
								// Check if the user is registered for this program
								$isRegistered = false;
								//if (isset($_SESSION['User_ID'])) {
									$userId = $_SESSION['User_ID'];
									$checkRegistrationSql = "SELECT * FROM join_program WHERE user_id = '$userId' AND program_id = '$programid'";
									$checkRegistrationQuery = mysqli_query($connection, $checkRegistrationSql);
									if (mysqli_num_rows($checkRegistrationQuery) > 0) {
										$isRegistered = true;
									}
								//}
								?>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">
										<!--List of Program-->
										<?php echo $bilangan = $bilangan + 1; ?>. <?php echo $progname ?> <!--(<?php /*echo*/ "$start - $end"; ?>)-->
										<span>

										<!--List of Program Button (Join/Evaluate)-->
										<?php if($isRegistered){ ?>
											<a type="button" class="btn btn-info btn-sm"  href="evaluation.php">Penilaian Program</a>
										<?php } else if ($kod=="No Code") { ?>
											<a type="button" class="btn btn-warning masuk-button btn-sm" data-programid="<?php echo $programid; ?>" data-progname="<?php echo $progname; ?>" data-kod="<?php echo $kod; ?>">Sertai Program</a>

								<!------------------------ MASUK PROGRAM START (No need to enter code)-------------------------------------------->

								
								<!--add the program ID in the popup section-->
								<!-- JavaScript for handling the Masuk button -->
								<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
								<script>
									$(document).ready(function () {
										$('.masuk-button').click(function () {
											const programID = $(this).data('programid');
											const codeProgram = $(this).data('progname');
											const kod = $(this).data('kod');
											$('#progID').val(programID);
												$('#textInput_second').val('No Code'); // Enter value 'No Code' for Code
												$('#textInputModal_second').modal('show');
											});
									});
								</script>


								<!--Popup sertai-->
								<div class="modal fade" id="textInputModal_second" tabindex="-1" role="dialog" aria-labelledby="textInputModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="textInputModalLabel_second">PROGRAM NEXTGEN</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											

											<div class="modal-body">
												<!-- Form to enter code -->
												<form action="codeprocess.php" method="POST">
													<div class="form-group">
													<label>Sertai Program</label>
													<label>"<?php echo $progname ?>"</label>

													<!--add the hidden variable to make verify in the process-->
													<input type="hidden" name="progID" id="progID" value=<?php echo $programid ?>>
													<input type="hidden" name="Code" id="textInput_second" value="No Code">

													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-primary" name="submit">Hantar</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>


								<!--MASUK POPUP JAVASCRIPT-->
								<script>
									// Handle the "Save" button click
									$("#saveText").click(function () {
										// Get the entered text
										var enteredText = $("#textInput_second").val();

										// Display the code entered
										alert("Kod Program: " + enteredText);

										// Close the modal
										$("#textInputModal_second").modal("hide");

										// Redirect to dasboarduser1.php
										window.location.href = "evaluation.php";
									});
								</script>

								<!------------------------ MASUK PROGRAM END (No need to enter code)-------------------------------------------->

										<?php } else { ?>
											<a type="button" class="btn btn-warning sertai-button btn-sm" data-programid="<?php echo $programid; ?>" data-progname="<?php echo $progname; ?>">Sertai Program</a>

								<!------------------------ SERTAI PROGRAM START (Need to enter code)-------------------------------------------->

								<!--add the program ID in the popup section-->
								<!-- JavaScript for handling the Sertai button -->
								<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
								<script>
									$(document).ready(function () {
										$('.sertai-button').click(function () {
											const programID = $(this).data('programid');
											const codeProgram = $(this).data('progname');
											$('#progID').val(programID);
												$('#textInput').val(''); // Clear the input field
												$('#textInputModal').modal('show');
											});
									});
								</script>
			

								<!--Popup sertai-->
								<div class="modal fade" id="textInputModal" tabindex="-1" role="dialog" aria-labelledby="textInputModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="textInputModalLabel">PROGRAM NEXTGEN</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>


											<div class="modal-body">
												<!-- Form to enter code -->
												<form action="codeprocess.php" method="POST">
													<div class="form-group">
														<label for="textInput">Masukkan Kod Program:</label>
														<input type="text" class="form-control" id="textInput" name="Code" required>

														<!--add the hidden variable to make verify in the process-->
														<input type="hidden" name="progID" id="progID" value=<?php echo $programid ?>>

													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-primary" name="submit">Hantar</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>


								<!--SERTAI POPUP JAVASCRIPT-->
								<script>
									// Handle the "Save" button click
									$("#saveText").click(function () {
										// Get the entered text
										var enteredText = $("#textInput").val();

										// Display the code entered
										alert("Kod Program: " + enteredText);

										// Close the modal
										$("#textInputModal").modal("hide");

										// Redirect to dasboarduser1.php
										window.location.href = "evaluation.php";
									});
								</script>

								<!------------------------ SERTAI PROGRAM END (Need to enter code)-------------------------------------------->

										<?php } } ?>

										</span></a>
									</div>
								</div>

<!--------------------------- =========================================================================== ------------------------------->
                                                        <!--------------------------- PROGRAM BIASA END ------------------------------->
<!--------------------------- =========================================================================== ------------------------------->


									<!-- PENGUMUMAN LIST -->
								<div class="card-box mb-30">
									<h5 class="pd-20 h5 mb-0">Pengumuman NextGen</h5>
									<?php
									$QUERY_get_news_SMALL = "SELECT * FROM berita WHERE jenis_berita='2' ORDER BY ID_berita DESC LIMIT 3";
									$RESULT_get_news_SMALL = mysqli_query($connection,$QUERY_get_news_SMALL);
									while ($row_SMALL = mysqli_fetch_assoc($RESULT_get_news_SMALL)){
										$news_title_SMALL = $row_SMALL['tajuk_berita'];
										$news_description_SMALL = $row_SMALL['perkara_berita'];
									?>
									<div class="latest-post">
										<ul>
											<li>
												<h4><a href="#"><?php echo $news_title_SMALL;?></a></h4>
												<!-- <span><?php //echo $news_description_SMALL;?></span> -->
											</li>
											<?php } ?>
											<li>
											<style>h6 {text-align: center;}</style>
											<h6><a href="news_page.php" text-align: center;>Lihat Semua Berita...</a></h6>
											</li>
										</ul>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>

			<?php
			//}
			?>

			<div class="footer-wrap pd-20 mb-20 card-box">
				Laman ini dibangunkan oleh Unit Teknologi Maklumat Yayasan Pahang
			</div>
		</div>
	</div>

	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard.js"></script>
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<!-- add sweet alert js & css in footer -->
	<script src="src/plugins/sweetalert2/sweetalert2.all.js"></script>
	<link rel="stylesheet" type="text/css" href="src/plugins/sweetalert2/sweetalert2.css">
	<script src="src/plugins/sweetalert2/sweet-alert.init.js"></script>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>


</body>
</html>