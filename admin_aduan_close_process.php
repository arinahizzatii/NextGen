<?php

include("userconn.php"); 

if (isset($_POST['Close'])) {
	$Aduan_ID = $_POST['Aduan_ID'];
	$sql = "UPDATE `aduan` SET `status_aduan`='1' WHERE Aduan_ID='".$Aduan_ID."'";
	$query = mysqli_query($connection, $sql);

	header ('location: admin_aduan.php');
}


?>