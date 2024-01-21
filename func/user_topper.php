<!DOCTYPE html>
<html>
<body>

<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="/nextgen/img/Logo.png" alt="">
						</span>
						<span class="nama"><?php echo $Nama ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="profile1.php"><i class="dw dw-user1"></i> Maklumat Peribadi</a>

						<a onclick="out()" class="dropdown-item" href="logout.php">
							<i class="micon icon-copy dw dw-logout-2"></i>Log Keluar</a>
					</div>
					</div>
				</div>

	<!--LOGOUT JAVASCRIPT-->
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