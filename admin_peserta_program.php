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
	<title>Peserta</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/logo.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/logo.png.png">

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
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Evaluasi</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html"></a></li>
									<li class="breadcrumb-item active" aria-current="page">PROGRAM</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">	
						</div>
					</div>
				</div>

                <!-- Bordered table  start -->
				<div class="pd-20 card-box mb-30">
            
					<div class="clearfix mb-20">
					<div class="pull-right">
							<!--SEARCH ENGINE-->
							<form class="form-inline" method="POST">
								<div class="form-group mb-0">
									<input type="text" name="txtsearch" class="form-control search-input" placeholder="Search Here" style="margin-right: 5px; vertical-align: middle;">
									<button type="submit" name="searchbtn" class="searchbtn" style="background: none; border: none; vertical-align: middle;">
										<i class="micon icon-copy fa fa-search" aria-hidden="true"></i>
									</button>
								</div>
							</form>
							<?php
								$txtSearch = "";
								if (isset($_POST['searchbtn'])){
									$txtSearch = $_POST['txtsearch'];
								}

								$bil=0;
								$sql = "SELECT * FROM user_profile WHERE IC LIKE '%" . $txtSearch . "%'";
								$query = mysqli_query($connection, $sql) or die("Search not found");
                        	?>
						</div>
						<div class="pull-left">
						<style>
							/* Adjust the icon size */
							.fa-filter {
								font-size: 25px; /* Adjust the size as needed */
								vertical-align: middle; /* Vertically align the icon */
							}

							/* Make the select wider */
							#Program {
								width: 400px; /* Adjust the width as needed */
								padding: 5px;
								margin:10px;
							}

						</style>
							<div class="form-group">
								<div class="form-inline">
									<label for="Program" style="margin-right: 10px;">
										<i class="micon icon-copy fa fa-filter" aria-hidden="true"></i>
									</label>
									<select class="selectpicker form-control form-control-lg" name="Program" id="Program" title="Program" data-style="btn-outline-secondary btn-lg" >
										<?php
											// Create an SQL query to fetch the data from the "program" table
											$sqlProg = "SELECT * FROM program";

											// Execute the SQL query
											$queryProg = mysqli_query($connection, $sqlProg);

											while ($rowProg = mysqli_fetch_assoc($queryProg)) {
												echo '<option value="' . $rowProg['Program_ID'] . '">' . $rowProg['NamaProg'] . '</option>';
											}
											// Close the database connection when done (optional)
											mysqli_close($connection);
										?>
									</select>
									<div class="form-group mb-20">
										<input type="submit" class="btn btn-primary" value="Apply" name="Apply">
									</div>
								</div>	
							</div>						
						</div>
					<table class="table table-bordered">
						<thead>
                                <tr>
                                    <th class="text-center" rowspan="2">NO</th>
                                    <th class="text-center" rowspan="2">NO. KAD PENGENALAN</th>
                                    <th class="text-center" colspan="2">NAMA</th>
                                    <th class="text-center" colspan="2">NO. TEL</th>
                                </tr>
						</thead>
						<tbody>    
                            <?php
                                include 'userconn.php';

								$sqlJoin = "SELECT join_program.JoinProg_ID, join_program.User_ID, join_program.Program_ID, program.NamaProg,
											program.DateStart, program.DateEnd, program.CreatedBy, program.DateCeate, program.Code
											FROM join_program
											INNER JOIN program ON join_program.Program_ID = program.Program_ID;";
								$queryJoin = mysqli_query($connection,$sqlJoin);
                                                                
                                $count = 1;
								while ($rowJoin = mysqli_fetch_assoc($queryJoin)) {
                                while ($row= mysqli_fetch_array($query)) {  
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $count; ?></td>
                                <td class="text-center"><?php echo $row['IC']; ?></td>
                                <td colspan="2" class="text-center"><?php echo $row['Nama']; ?></td>
                                <td colspan="2" class="text-center"><?php echo $row['NoTel']; ?></td>
                            </tr>  
                            <?php
                            $count++;
                                }}
                            ?>                           
                        </tbody>
					</table>
						<div class="form-group mb-20">
							<input type="submit" class="btn btn-primary" value="Submit" name="submit">
						</div>

					<div class="collapse collapse-box" id="border-table">
						<div class="code-box">
							<div class="clearfix">
								<a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left"  data-clipboard-target="#border-table-code"><i class="fa fa-clipboard"></i> Copy Code</a>
								<a href="#border-table" class="btn btn-primary btn-sm pull-right" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
							</div>
							<pre><code class="xml copy-pre" id="border-table-code">
                                <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">1</th>
                                    </tr>
                                </tbody>
                                </table>
							</code></pre>
						</div>
					</div>
				</div>
				<!-- Bordered table End -->
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

<script>
function getStudentsByProgram(programId) {
    // Send an AJAX request to get_students.php with the selected program ID
    fetch('get_students.php?program_id=' + programId)
        .then(response => response.json())
        .then(data => {
            // Update the student list in the table
            const tableBody = document.querySelector('#student-table tbody');
            tableBody.innerHTML = ''; // Clear the existing rows

            data.forEach(student => {
                const row = tableBody.insertRow();
                const cellNumber = row.insertCell(0);
                const cellIC = row.insertCell(1);
                const cellName = row.insertCell(2);
                const cellNoTel = row.insertCell(3);

                cellNumber.textContent = student.number;
                cellIC.textContent = student.IC;
                cellName.textContent = student.Nama;
                cellNoTel.textContent = student.NoTel;
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
}
</script>


</body>
</html>