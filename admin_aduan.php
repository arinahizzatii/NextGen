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
	<title>Aduan</title>

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
                                
							</div>
						</div>
					</div>

                <!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Senarai Aduan</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">NO</th>
                                    <th>NAMA</th>
                                    <th>TAJUK</th>
									<th>PERKARA</th>
                                    <th>STATUS</th>
									<th class="datatable-nosort">TINDAKAN</th>
								</tr>
							</thead>
							<tbody>
                                <?php
								$sql = "SELECT ad.Aduan_ID, ad.tajuk_aduan, ad.perkara_aduan, ad.status_aduan, ad.User_ID,
                                        up.IC, up.Nama, up.NoTel, up.Email, up.Jantina, up.Bangsa, up.TarikhLahir, up.Umur, up.Alamat, up.TahapPendidikan, up.Kursus, up.user_terpilih
                                        FROM aduan ad
                                        INNER JOIN user_profile up ON ad.User_ID = up.User_ID";

								$query = mysqli_query($connection, $sql) or die("not found");
								
								$count = 1;

								while ($row= mysqli_fetch_array($query)) {
								?>
								<tr>
									<td class="table-plus"><?php echo $count; ?></td>
                                    <td><?php echo $row['Nama'];?></td>
									<td><?php echo $row['tajuk_aduan'];?></td>
                                    <td><?php echo $row['perkara_aduan'];?></td>
                                    <td>
                                        <?php 
                                            if ($row['status_aduan'] == 0) {
                                                echo '<span style="color: blue;">Pending</span>';
                                            }else{
                                                echo '<span style="color: red;">Closed</span>';
                                            }
                                        ?>
                                    </td>
									<td>

                                        <form action = "admin_aduan_close_process.php" class = "status_aduan" method="POST">
                                        	
                                            <input type="number" name="Aduan_ID" id="Aduan_ID" value="<?php echo $row['Aduan_ID']; ?>" hidden>

                                            <?php if ($row['status_aduan'] == 1) { ?>

                                                <button type="button" class="btn btn-danger btn-sm" disabled>Closed</button>

                                            <?php } else { ?>

                                                <input type="submit" class="btn btn-primary btn-sm" value="Close" name="Close">

                                            <?php } ?>
                                        </form>
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