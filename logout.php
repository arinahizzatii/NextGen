<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="/nextgen/img/logonextgen.png">

	<title>Logout</title>

</head>

<body>
	<?php
		session_start();

		//for user session
		if(isset($_SESSION['User_ID'])) 
			unset($_SESSION["useric"]);
			unset($_SESSION["useremail"]);
			unset($_SESSION["password"]);

		//unset all the log
		unset($_SESSION['log']);

		//destroy all the session
		session_destroy();

		//direct to the login page
		echo "<meta http-equiv=\"refresh\" content=\"2;url=login.php\">";
	?>


</body>
</html>