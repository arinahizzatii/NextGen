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

  if($User_ID==NULL||$IC==NULL||$Nama==NULL||$NoTel==NULL||$Email==NULL||$Jantina==NULL||$Bangsa==NULL||$TarikhLahir==NULL||$Umur==0||$Alamat==NULL||$TahapPendidikan==NULL||$Kursus==NULL){
    echo "<meta http-equiv=\"refresh\" content=\"1;URL=profile1.php\"/>";

    echo "
            <script type=\"text/javascript\">
            var e = document.getElementById('testForm'); e.action='test.php'; e.submit();
            </script>
        ";

  }else{
    #Code...
  }

  //Add this if else inside php
  //if (isset($_SESSION["User_ID"])>0){include('userconn.php');include("func/get_profile.php");}

?>