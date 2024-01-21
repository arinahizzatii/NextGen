
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "nextgen";
		$connection = mysqli_connect($servername, $username, $password, $dbname);

		//check whether the database if connect successfully or not
		if (!$connection) {
			die("Database connection is failed: " . mysqli_connect_error());
		}
	?>
