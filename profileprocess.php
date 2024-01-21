<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

    // Using session to track user information
    session_start();
    // Import database connection file
    include("userconn.php");

            // Check if the necessary session variables are set
            if (isset($_POST['update'])) {
                // Get the session variables and store them in local variables
                $useric = $_POST['useric'];
                $Nama = $_POST['Nama'];
                $NoTel = $_POST['NoTel'];
                $Email = $_POST['Email'];
                $Jantina = $_POST['Jantina'];
                $Bangsa = $_POST['Bangsa'];
                $TarikhLahir = $_POST['TarikhLahir'];
                $Umur = $_POST['Umur'];
                $Alamat = $_POST['Alamat'];
                $TahapPendidikan = $_POST['TahapPendidikan'];
                $Kursus = $_POST['Kursus'];
                $Daerah = $_POST['Daerah'];
                $Pendapatan_Rumah = $_POST['Pendapatan_Rumah'];

            
                $checkUserSQL = "SELECT * FROM user_account WHERE User_ID = '".$_SESSION["User_ID"]."'";
                $checkUserQuery = mysqli_query($connection, $checkUserSQL);
            
                if (mysqli_num_rows($checkUserQuery) > 0) {

                // Prepare the SQL statement using prepared statements
            $sql = "UPDATE `user_profile` SET `IC`='$useric',`Nama`='$Nama',`NoTel`='$NoTel',`Email`='$Email',`Jantina`='$Jantina',`Bangsa`='$Bangsa',
                    `TarikhLahir`='$TarikhLahir',`Umur`='$Umur',`Alamat`='$Alamat',`TahapPendidikan`='$TahapPendidikan',`Kursus`='$Kursus',`Daerah`='$Daerah',
                    `Pendapatan_Rumah`='$Pendapatan_Rumah'
                    WHERE `User_ID`='".$_SESSION["User_ID"]."'";

            $query = mysqli_query($connection, $sql) or die(mysqli_error());

            $sqlAccount = "UPDATE `user_account` SET `user_IC`='$useric',`user_Email`='$Email' WHERE `User_ID`='".$_SESSION["User_ID"]."'";
            
            $queryAccount = mysqli_query($connection, $sqlAccount)or die(mysqli_error());

                if ($query) {
                    echo "<meta http-equiv=\"refresh\" content=\"1;URL=profile1.php\"/>";
                }else{die(mysqli_error());}  

            }else {echo "User with IC '$useric' does not exist in the user_account table.";} 
            
        }else {echo "<meta http-equiv=\"refresh\" content=\"1;URL=profile1.php\"/>";}
?>