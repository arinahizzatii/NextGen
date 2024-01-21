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
	<title>Kategori</title>

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
				
					<div class="row">
						<div class="col-md-4 col-sm-12">
							<div class="title">
                                <div class="form-group mb-20">
									<a class="btn btn-primary btn-lg" href="admin_create_kategori.php" role="button">Tambah Kategori</a>
								</div>
							</div>
						</div>
					</div>

                <!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Senarai Kategori</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">NO</th>
									<th>KATEGORI</th>
									<th class="datatable-nosort">TINDAKAN</th>
								</tr>
							</thead>
							<tbody>
                                <?php
									include 'userconn.php';
                                    
									$sql = "SELECT * FROM kategori_soalan";
									$query = mysqli_query($connection, $sql) or die("not found");
									
									$count = 1;
									while ($row= mysqli_fetch_array($query)) {
								?>
								<tr>
									<td class="table-plus"><?php echo $count; ?></td>
									<td><?php echo $row['kategori_soalan'];?></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="admin_edit_kategori.php?ID_kategori_soalan=<?php echo $row["ID_kategori_soalan"]; ?>"><i class="dw dw-edit2"></i> Edit</a>
												<a onclick="delete()" class="dropdown-item" href="admin_delete_kategori_process.php?ID_kategori_soalan=<?php echo $row["ID_kategori_soalan"]; ?>"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
									</td>
                                <?php
                                    $count++;
                                    } 
                                ?>
								</tr>
                               
							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
			</div>
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

    <script>
    function delete() {
            var result = confirm('Are you sure to delete the data?');
            if (result == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>
</html>