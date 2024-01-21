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
	<title>Dashboard Admin</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/logo.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/logo.png.png">

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

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
		<div class="pd-ltr-20">

			<div class="row">
				<!--AHLI AKTIF-->
				<div class="col-xl-4 mb-30">
					<div class="card-box height-80-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div><img src="img/58.png" alt=""></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">
								<?php
										$sql = "SELECT UserAccount_ID
												FROM user_account
												WHERE YEAR(last_login) = YEAR(NOW())";
										$user = mysqli_query($connection,$sql);

										if($totaluser = mysqli_num_rows($user)){
											echo '<div class="numbers"><h3> '.$totaluser.' </h3></div>';
										}
										else{
											echo '<div class="numbers"><h3> 0 </h3></div>';
										}
									?>
								</div>
								<div class="weight-600 font-14"><h5>Ahli Aktif</h5></div>
							</div>
						</div>
					</div>
				</div>
				<!--ALUMNI-->
				<div class="col-xl-4 mb-30">
					<div class="card-box height-80-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div><img src="img/59.png" alt=""></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">
									<?php
										$sql_total_program = "SELECT * FROM program";
										$res_total_program = mysqli_query($connection, $sql_total_program);
	
										if($totalprogram = mysqli_num_rows($res_total_program)){
											echo '<div class="numbers"><h3> '.$totalprogram.' </h3></div>';
										}else{
											echo '<div class="numbers"><h3> 0 </h3></div>';
										}
										/*
										$currentDate = date("Y-m-d");
										$sql = "SELECT * FROM program WHERE DateEnd = '$currentDate'";
										$alumni = mysqli_query($connection,$sql);

										if($totalAlumni = mysqli_num_rows($alumni)){
											echo '<div class="numbers"><h3> '.$totalAlumni.' </h3></div>';
										}
										else{
											echo '<div class="numbers"><h3> 0 </h3></div>';
										}
									*/
									?> 
								</div>
								<div class="weight-600 font-14"><h5>Alumni</h5></div>
							</div>
						</div>
					</div>
				</div>
				<!--AHLI TERPILIH-->
				<div class="col-xl-4 mb-30">
					<div class="card-box height-80-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div><img src="img/60.png" alt=""></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">
								<?php
										$sql_ahli_terpilih = "SELECT * FROM user_profile WHERE user_terpilih='1'";
										$res_ahli_terpilih  = mysqli_query($connection,$sql_ahli_terpilih);

										if($total_ahli_terpilih  = mysqli_num_rows($res_ahli_terpilih)){
											echo '<div class="numbers"><h3> '.$total_ahli_terpilih.' </h3></div>';
										}
										else{
											echo '<div class="numbers"><h3> 0 </h3></div>';
										}
									?> 
								</div>
								<div class="weight-600 font-14"><h5>Ahli Terpilih</h5></div>
							</div>
						</div>
					</div>
				</div>  
			</div>

			<div class="row">
				<div class="col-lg-6 col-md-4 col-sm-12 mb-30">
					<div class="card-box pd-30 pt-10 height-80-p">
						<div class="row">
							<style>
								h2 {
									margin-left: 20px;
								}
								ul.d-flex {
									flex-wrap: wrap;
								}
								ul.d-flex li {
									flex: 0 0 calc(50% - 25px); /* Adjust width and margin as needed */
									margin: 10px;
								}
								ul.d-flex li .d-flex {
									align-items: center;
								}
								ul.d-flex li .icon {
									margin-right: 10px; /* Adjust the margin as needed */
								}
								ul.d-flex li .browser-name {
									margin: 0;
								}
								ul.d-flex li .badge {
									margin-left: -10px;
								}
								.centered {
									text-align: center;
									margin-left: 45%;
								}
							</style>

							<h2 class="mb-30 h4 centered"><b>BELIA</b></h2>
						</div>

						<div class="browser-visits">
							<ul class="d-flex flex-wrap justify-content-between">
								<!--MELAYU-->
								<li>
									<div class="d-flex align-items-center">
										<div class="icon"><img src="img/63.png" alt=""></div>
										<div class="browser-name">Melayu</div>
										<div class="visit">
											<?php
												$sql = "SELECT * from user_profile WHERE Bangsa = 'Melayu'";
												$Melayu = mysqli_query($connection,$sql);

												if($totalM = mysqli_num_rows($Melayu)){
													echo '<span class="badge badge-pill badge-warning"> '.$totalM.'</span>';
												}
												else{
													echo '<span class="badge badge-pill badge-warning"> 0 </span>';
												}
											?>
										</div>
									</div>
								</li>
								<!--CINA-->
								<li>
									<div class="d-flex align-items-center">
										<div class="icon"><img src="img/61.png" alt=""></div>
										<div class="browser-name">Cina</div>
										<div class="visit">
											<?php
												$sql = "SELECT * from user_profile WHERE Bangsa = 'Cina'";
												$Cina = mysqli_query($connection,$sql);

												if($totalC = mysqli_num_rows($Cina)){
													echo '<span class="badge badge-pill badge-warning"> '.$totalC.'</span>';
												}
												else{
													echo '<span class="badge badge-pill badge-warning"> 0 </span>';
												} 
											?>
										</div>
									</div>
								</li>
								<!--INDIA-->
								<li>
									<div class="d-flex align-items-center">
										<div class="icon"><img src="img/62.png" alt=""></div>
										<div class="browser-name">India</div>
										<div class="visit">
											<?php
												$sql = "SELECT * from user_profile WHERE Bangsa = 'India'";
												$India = mysqli_query($connection,$sql);

												if($totalI = mysqli_num_rows($India)){
													echo '<span class="badge badge-pill badge-warning"> '.$totalI.'</span>';
												}
												else{
													echo '<span class="badge badge-pill badge-warning"> 0 </span>';
												}
											?>
										</div>
									</div>
								</li>
								<!--ORANG ASLI-->
								<li>
									<div class="d-flex align-items-center">
										<div class="icon"><img src="img/64.png" alt=""></div>
										<div class="browser-name">Orang Asli</div>
										<div class="visit">
											<?php
												$sql = "SELECT * from user_profile WHERE Bangsa = 'Orang Asli'";
												$OrangAsli = mysqli_query($connection,$sql);

												if($totalO = mysqli_num_rows($OrangAsli)){
													echo '<span class="badge badge-pill badge-warning"> '.$totalO.'</span>';
												}
												else{
													echo '<span class="badge badge-pill badge-warning"> 0 </span>';
												}
											?>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
  
				<div class="col-lg-6 col-md-4 col-sm-12 mb-30">
					<div class="card-box pd-30 pt-10 height-80-p">
						<div class="row">
							<style>
								h2 {
									margin-left: 20px;
								}

								ul.d-flex {
									flex-wrap: wrap;
								}
								ul.d-flex li {
									flex: 0 0 calc(50% - 25px); /* Adjust width and margin as needed */
									margin: 10px;
								}
								ul.d-flex li .d-flex {
									align-items: center;
								}
								ul.d-flex li .icon {
									margin-right: 10px; /* Adjust the margin as needed */
								}
								ul.d-flex li .browser-name {
									margin: 0;
								}
								ul.d-flex li .badge {
									margin-left: -10px;
								}
								.left {
									margin-left: 15%;
								}
								.right {
									margin-left: 35%;
								}
							</style>

							<h2 class="mb-30 h4 left"><b>JANTINA</b></h2>
							<h2 class="mb-30 h4 right"><b>UMUR</b></h2>
						</div>

						<div class="browser-visits">
							<ul class="d-flex flex-wrap justify-content-between">
								<!--LELAKI-->
								<li>
									<div class="d-flex align-items-center">
										<div class="icon"><img src="img/65.png" alt=""></div>
										<div class="browser-name">Lelaki</div>
										<div class="visit">
											<?php
												$sql = "SELECT * from user_profile WHERE Jantina = 'Lelaki'";
												$Lelaki = mysqli_query($connection,$sql);

												if($totalLelaki = mysqli_num_rows($Lelaki)){
													echo '<span class="badge badge-pill badge-warning"> '.$totalLelaki.'</span>';
												}
												else{
													echo '<span class="badge badge-pill badge-warning"> 0 </span>';
												}
											?>
										</div>
									</div>
								</li>
								<!--18-21 TAHUN-->
								<li>
									<div class="d-flex align-items-center">
										<div class="icon"><img src="img/umur.png" alt=""></div>
										<div class="browser-name">18-21</div>
										<div class="visit">
											<?php
												$sql = "SELECT * FROM user_profile WHERE Umur BETWEEN '18' AND '21'";
												$UmurL = mysqli_query($connection,$sql);

												if($totalL = mysqli_num_rows($UmurL)){
													echo '<span class="badge badge-pill badge-warning"> '.$totalL.'</span>';
												}
												else{
													echo '<span class="badge badge-pill badge-warning"> 0 </span>';
												}
											?>
										</div>
									</div>
								</li>
								<!--PEREMPUAN-->
								<li>
									<div class="d-flex align-items-center">
										<div class="icon"><img src="img/66.png" alt=""></div>
										<div class="browser-name">Perempuan</div>
										<div class="visit">
											<?php
												$sql = "SELECT * from user_profile WHERE Jantina = 'Perempuan'";
												$Perempuan = mysqli_query($connection,$sql);

												if($totalPerempuan = mysqli_num_rows($Perempuan)){
													echo '<span class="badge badge-pill badge-warning"> '.$totalPerempuan.'</span>';
												}
												else{
													echo '<span class="badge badge-pill badge-warning"> 0 </span>';
												}
											?>
										</div>
									</div>
								</li>
								<!--22-25 TAHUN-->
								<li>
									<div class="d-flex align-items-center">
										<div class="icon"><img src="img/umur.png" alt=""></div>
										<div class="browser-name">22-25</div>
										<div class="visit">
											<?php
												$sql = "SELECT * FROM user_profile WHERE Umur BETWEEN '22' AND '25'";
												$UmurU = mysqli_query($connection,$sql);

												if($totalU = mysqli_num_rows($UmurU)){
													echo '<span class="badge badge-pill badge-warning"> '.$totalU.'</span>';
												}
												else{
													echo '<span class="badge badge-pill badge-warning"> 0 </span>';
												}
											?>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>	
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 pt-10 height-100-p">
						<div class="row">
							<style>
								.center{
									margin-left:20px;
									margin-top: 10px;
								}
							</style>
								
                        	<h2 class="mb-30 h4 center"><b>PROGRAM</b></h2>

						</div>
						
                        <div class="browser-visits">
							<style>
								.browser-name {
									margin-left: 20px;
								}
								.visit {
									margin-left:-20px
								}
								.badge-pill {
									margin-left:-100px;
								}
							</style>
                            <ul>		
							<?php
								$queprog = "SELECT * FROM program";
								$resprog = mysqli_query($connection, $queprog);

								while ($rowprog = mysqli_fetch_array($resprog)) {
									$Program_ID = $rowprog["Program_ID"];
									$NamaProg = $rowprog["NamaProg"];

										$query = "SELECT COUNT(jp.User_ID) AS total_students
										FROM join_program jp
										INNER JOIN program p ON jp.Program_ID = p.Program_ID
										WHERE p.NamaProg = '$NamaProg'";
										$result = mysqli_query($connection, $query);

										if ($result) {
											$row = mysqli_fetch_assoc($result);
											$totalStudents = $row['total_students'];
											echo '<li class="d-flex flex-wrap align-items-center">';
											echo '<div class="icon"><img src="img/event.png" alt=""></div>';
											echo '<div class="browser-name">' . $NamaProg . '</div><br>';
											echo '<div class="visit"><span class="badge badge-pill badge-warning" style="margin-left:20px">' . $totalStudents . '</span></div>';
										} else {
											echo "Error in the database query for Program ID $NamaProg.<br>";
										}
									}
							?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 mb-30">
                    <div class="card-box height-100-p pd-20">
                        <h2 class="h4 mb-20"><b>COMPARISON</b></h2>
						    <?php
								// Fetch program data and percentages
								$programData = array(); // Initialize an array to store program data

									$programIdQuery = "SELECT DISTINCT p.Program_ID, p.NamaProg
													   FROM program p
													   INNER JOIN jawapan_r j ON p.Program_ID = j.Program_ID    
													   LIMIT 5";
									$programIdResult = mysqli_query($connection, $programIdQuery);

									if ($programIdResult) {
										while ($row = mysqli_fetch_assoc($programIdResult)) {
											$programId = $row['Program_ID'];
											$programName = $row['NamaProg'];

											$preQuery = "SELECT COUNT(*) as pre_count 
														FROM soalan_r s
														LEFT JOIN jawapan_r j ON s.ID_soalan = j.ID_soalan
														WHERE j.Program_ID = $programId AND s.cin_cout = 1 AND j.rating = 5";

											$postQuery = "SELECT COUNT(*) as post_count 
														FROM soalan_r s
														LEFT JOIN jawapan_r j ON s.ID_soalan = j.ID_soalan
														WHERE j.Program_ID = $programId AND s.cin_cout = 2 AND j.rating = 5";

											$totalQuery = "SELECT COUNT(*) as total_count 
														FROM soalan_r s
														LEFT JOIN jawapan_r j ON s.ID_soalan = j.ID_soalan
														WHERE j.Program_ID = $programId AND (s.cin_cout = 1 OR s.cin_cout = 2)";

											$preResult = mysqli_query($connection, $preQuery);
											$postResult = mysqli_query($connection, $postQuery);
											$totalResult = mysqli_query($connection, $totalQuery);

											$preCount = mysqli_fetch_assoc($preResult);
											$postCount = mysqli_fetch_assoc($postResult);
											$totalCount = mysqli_fetch_assoc($totalResult);

											if ($preCount && $postCount && $totalCount) {
												$prePercentage = ($totalCount['total_count'] != 0) ? ($preCount['pre_count'] / $totalCount['total_count']) * 100 : 0;
												$postPercentage = ($totalCount['total_count'] != 0) ? ($postCount['post_count'] / $totalCount['total_count']) * 100 : 0;
											} else {
												$prePercentage = 0;
												$postPercentage = 0;
											}

											$programData[] = [
												'programName' => $programName,
												'prePercentage' => round($prePercentage, 2),
												'postPercentage' => round($postPercentage, 2),
											];
										}
									}
							?>

						<canvas id="barChart" width="300" height="150"></canvas>

						<script>
							var programData = <?php echo json_encode($programData); ?>;

							var programNames = programData.map(function (data) {
								return data.programName;
							});

							var prePercentages = programData.map(function (data) {
								return data.prePercentage;
							});

							var postPercentages = programData.map(function (data) {
								return data.postPercentage;
							});

							var ctx = document.getElementById('barChart').getContext('2d');
							var barChart = new Chart(ctx, {
								type: 'bar',
								data: {
									labels: programNames,
									datasets: [
										{
											label: 'Pre Questionnaires',
											data: prePercentages,									
											backgroundColor: 'rgba(218, 129, 129)',
											borderColor: 'rgba(160, 64, 64)',
											borderWidth: 1
										},
										{
											label: 'Post Questionnaires',
											data: postPercentages,
											backgroundColor: 'rgba(235, 214, 112)',
											borderColor: 'rgba(158, 114, 66)',
											borderWidth: 1
										}
									]
								},
								options: {
									scales: {
										y: {
											beginAtZero: true,
											title: {
												display: true,
												text: 'Percentage'
											}
										},
										x: {
											title: {
												display: true,
												text: 'Program'
											}
										}
									}
								}
							});
						</script>	
                	</div>
				</div>
				<div class="col-xl-12 mb-30">
                    <div class="card-box height-70-p pd-20">
                        <h2 class="h4 mb-20"><b>SOALAN PSIKOMETRIK</b></h2>
						
						<div class="row clearfix">
							<?php
							// Fetch the list of questions
							$sqlPsychometric = "SELECT * FROM psikometrik";
							$queryPsychometric = mysqli_query($connection, $sqlPsychometric);

							while ($rowPsychometric = mysqli_fetch_assoc($queryPsychometric)) {
								$Soalan_Psikometrik = $rowPsychometric['Soalan_Psikometrik'];
								$Psikometrik_ID = $rowPsychometric['Psikometrik_ID'];

								// Query to fetch data for a specific question
								$sqlPsy = "SELECT COUNT(jawapan) AS JawapanCount
										FROM jawapan_psikometrik jp
										JOIN psikometrik p ON jp.Psikometrik_ID = p.Psikometrik_ID
										WHERE jp.jawapan = 1 AND jp.Psikometrik_ID = $Psikometrik_ID";
								$queryPsy = mysqli_query($connection, $sqlPsy);

								// Fetch the result from the query
								$resultPsy = mysqli_fetch_assoc($queryPsy);
							?>
							<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
								<div class="card-box pd-30 height-100-p">
									<div class="progress-box text-center">
										<input type="text" class="knob dial1" data-width="120" value="<?php echo $resultPsy['JawapanCount']; ?>" data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#1b00ff" data-angleOffset="180" data-count="<?php echo $resultPsy['JawapanCount']; ?>" readonly>
										<h5 class="text-blue padding-top-10 h5"><?php echo $rowPsychometric['Soalan_Psikometrik']; ?></h5>
										<span class="d-block"><?php echo $resultPsy['JawapanCount']; ?> <i class="fa fa-line-chart text-blue"></i></span>
									</div>
								</div>
							</div>
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>					
			<div class="footer-wrap pd-20 mb-20 card-box">
			<!--DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>-->
				Laman ini dibangunkan oleh Unit Teknologi Maklumat Yayasan Pahang
			</div>
		</div>
	</div>
   
	</script>

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
	<script src="src/plugins/jQuery-Knob-master/jquery.knob.min.js"></script>
	<script src="vendors/scripts/knob-chart-setting.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<!--LOGOUT-->
	<script>
		function out() {
            var result = confirm('Are you sure to logout?');
            if (result == false) {
                event.preventDefault();
            }
        }
	</script>
</body>
</html>