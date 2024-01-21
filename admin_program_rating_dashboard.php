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
	<title>PROGRAM RATING</title>

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

                    <?php $Program_ID = ''; if (isset($_POST["Program_ID"])) {$Program_ID=$_POST["Program_ID"];} ?>

                <form action="" method="POST">
                <div class="form-group">
                    <label for="Program_ID" style="font-size: 12px; color: grey">Kategori:</label>
                    <select class="selectpicker form-control form-control-lg" name="Program_ID" id="Program_ID" title="- Pilih -" data-style="btn-outline-secondary btn-lg" required onChange="submit()">
                        <?php
                        $sql_program = "SELECT * FROM program";
                        $result_program = mysqli_query($connection, $sql_program);

                        while ($row_program = mysqli_fetch_assoc($result_program)) { ?>
                            <option value="<?php echo $row_program['Program_ID']?>" <?php if ($Program_ID == "" . $row_program['Program_ID'] . "") echo 'selected'; ?>><?php echo $row_program['NamaProg'] ?></option>;

                        <?php } ?>
                    </select>
                </div>

                <?php
				$programData_soalan = array();
				$programData_kategori = array();
				$result_category=0;
				$answer_3=0;

                //GET jumlah bilangan peserta = Program ID
				$RESULT_total_peserta['total_peserta'] = 0;
                $SQL_total_peserta = "SELECT COUNT(*) AS total_peserta FROM join_program WHERE Program_ID='$Program_ID'";
                $QUERY_total_peserta = mysqli_query($connection, $SQL_total_peserta);
                $RESULT_total_peserta = mysqli_fetch_assoc($QUERY_total_peserta);
                $RESULT_total_peserta['total_peserta'];

				//Get jumlah bilangan soalan
				$RESULT_total_soalan['total_soalan'] = 0;
				$SQL_total_soalan = "SELECT COUNT(*) AS total_soalan FROM soalan_r";
				$QUERY_total_soalan = mysqli_query($connection, $SQL_total_soalan);
                $RESULT_total_soalan = mysqli_fetch_assoc($QUERY_total_soalan);
				$RESULT_total_soalan['total_soalan'];
                $satu_soalan_darab_dengan_lima = $RESULT_total_soalan['total_soalan'] * 5;

				//Get jumlah bilangan lategori
				$RESULT_total_kategori['total_kategori'] = 0;
				$SQL_total_kategori = "SELECT COUNT(*) AS total_kategori FROM kategori_soalan";
				$QUERY_total_kategori = mysqli_query($connection, $SQL_total_kategori);
                $RESULT_total_kategori = mysqli_fetch_assoc($QUERY_total_kategori);
				$RESULT_total_kategori['total_kategori'];
                $satu_kategori_darab_dengan_lima = $RESULT_total_kategori['total_kategori'] * 5;

				//GET CATEGORY
				$SQL_CATEGORY = "SELECT * FROM kategori_soalan";
				$QUERY_CATEGORY = mysqli_query($connection, $SQL_CATEGORY);
				while($ROW_CATEOGRY = mysqli_fetch_assoc($QUERY_CATEGORY)){
					$ID_kategori_soalan = $ROW_CATEOGRY['ID_kategori_soalan'];
					$kategori_soalan = $ROW_CATEOGRY['kategori_soalan'];

					$result_question=0;
					$answer_2=0;

                //Get SOALAN = kategori_soalan & COUT
                $SQL_QUESTION = "SELECT * FROM soalan_r WHERE ID_kategori_soalan='$ID_kategori_soalan' AND cin_cout='Akhir'";
                $QUERY_QUESTION = mysqli_query($connection, $SQL_QUESTION);
                while ($ROW_QUESTION = mysqli_fetch_assoc($QUERY_QUESTION)) {
                    $ID_soalan = $ROW_QUESTION['ID_soalan'];
					$soalan = $ROW_QUESTION['soalan'];

					//GET RATING 5
					$RESULT_total_skala_5['total_skala_5'] = 0;
                    $SQL_total_skala_5 = "SELECT COUNT(*) AS total_skala_5 FROM jawapan_r WHERE rating='5' AND ID_soalan='$ID_soalan' AND Program_ID='$Program_ID'";
                    $QUERY_total_skala_5 = mysqli_query($connection, $SQL_total_skala_5);
                    $RESULT_total_skala_5 = mysqli_fetch_assoc($QUERY_total_skala_5);

                    $RESULT_total_skala_5['total_skala_5'];
                    $answer_1 = ($RESULT_total_peserta['total_peserta'] != 0) ? ($RESULT_total_skala_5['total_skala_5'] / $RESULT_total_peserta['total_peserta']) * 5 : 0;

					$answer_1 = round($answer_1, 2);

					$programData_soalan[] = [
						'question' => $answer_1,
						'soalan' => $soalan,
					];

					$result_question= $result_question + $answer_1;
                }
					$result_question;
					$answer_2 = ($result_question / $satu_soalan_darab_dengan_lima)*5;
					$answer_2 = round($answer_2, 2);

					$programData_kategori[] = [
						'kategori' => $answer_2,
						'kategori_soalan' => $kategori_soalan,
					];

					$result_category = $result_category + $answer_2;
			}
					$answer_3 = ($result_category/$satu_kategori_darab_dengan_lima)*5;
					$overall_rating = round($answer_3, 2);
                ?>
                </div>
                </form>	

				<div class="html-editor pd-20 card-box mb-30">
					<h4 class="h4 text-blue">Overall Rating</h4>
					<div class="d-flex align-items-center">
						<div class="icon" ><img src="img/70.png" alt="" style="max-width:30%; height:auto;"></div>

						<?php /////////////////////////////////////////////////////////////////////// ?>

						<?php echo '<div class="numbers"><h1 style="font-size:100px; color:E6C50C;">'. $overall_rating.'</h1></div>'?>

						<?php /////////////////////////////////////////////////////////////////////// ?>
					</div>
				</div>


				<!-- BAR CHART = KATEGORI -->
				<div class="bg-white pd-20 card-box mb-30">
					<h4 class="h4 text-blue">Bar Chart - Kategori</h4>
					<div id="chart_kategori"></div>
				</div>

				<script>
				var programData_kategori = <?php echo json_encode($programData_kategori); ?>;

				var kategori = programData_kategori.map(function (data) {
										return data.kategori;
									});
				
				var kategori_soalan = programData_kategori.map(function (data) {
										return data.kategori_soalan;
									});

				var options4 = {
				series: [{
					data: kategori
				}],
				chart: {
					type: 'bar',
					height: 430,
					toolbar: {
						show: false,
					}
				},
				grid: {
					show: false,
					padding: {
						left: 0,
						right: 0
					}
				},
				plotOptions: {
					bar: {
						horizontal: true,
						dataLabels: {
							position: 'top',
						},
					}
				},
				dataLabels: {
					enabled: true,
					offsetX: -6,
					style: {
						fontSize: '12px',
						colors: ['#fff']
					}
				},
				stroke: {
					show: true,
					width: 1,
					colors: ['#fff']
				},
				xaxis: {
					categories: kategori_soalan,
				},
			};
			var chart = new ApexCharts(document.querySelector("#chart_kategori"), options4);
			chart.render();
			</script>

			<?php /////////////////////////////////////////////////////////////////////// ?>

				<!-- BAR CHART = SOALAN -->
				<div class="bg-white pd-20 card-box mb-30">
					<h4 class="h4 text-blue">Bar Chart - Soalan</h4>
					<div id="chart_soalan"></div>
				</div>

				<script>
				var programData_soalan = <?php echo json_encode($programData_soalan); ?>;

				var question = programData_soalan.map(function (data) {
										return data.question;
									});
				
				var soalan = programData_soalan.map(function (data) {
										return data.soalan;
									});

				var options4 = {
				series: [{
					data: question
				}],
				chart: {
					type: 'bar',
					height: 430,
					toolbar: {
						show: false,
					}
				},
				grid: {
					show: false,
					padding: {
						left: 0,
						right: 0
					}
				},
				plotOptions: {
					bar: {
						horizontal: true,
						dataLabels: {
							position: 'top',
						},
					}
				},
				dataLabels: {
					enabled: true,
					offsetX: -6,
					style: {
						fontSize: '12px',
						colors: ['#fff']
					}
				},
				stroke: {
					show: true,
					width: 1,
					colors: ['#fff']
				},
				xaxis: {
					categories: soalan,
				},
			};
			var chart = new ApexCharts(document.querySelector("#chart_soalan"), options4);
			chart.render();
			</script>

		<?php /////////////////////////////////////////////////////////////////////// ?>

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
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<!-- <script src="vendors/scripts/apexcharts-setting.js"></script> -->

</body>
</html>