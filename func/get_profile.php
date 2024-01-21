<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'userconn.php';

$queryGetProfile = "SELECT * FROM user_profile WHERE User_ID = '".$_SESSION["User_ID"]."'";
$resultGetProfile = mysqli_query($connection, $queryGetProfile);
while($rowGetProfile = mysqli_fetch_assoc($resultGetProfile)){
		$User_ID = $rowGetProfile['User_ID'];
    $IC = $rowGetProfile['IC'];
    $Nama = $rowGetProfile['Nama'];
    $NoTel = $rowGetProfile['NoTel'];
    $Email = $rowGetProfile['Email'];
    $Jantina = $rowGetProfile['Jantina'];
    $Bangsa = $rowGetProfile['Bangsa'];
    $TarikhLahir = $rowGetProfile['TarikhLahir'];
    $Umur = $rowGetProfile['Umur'];
    $Alamat = $rowGetProfile['Alamat'];
    $TahapPendidikan = $rowGetProfile['TahapPendidikan'];
    $Kursus = $rowGetProfile['Kursus'];
	}

?>