<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
    include 'userconn.php';

    if (isset($_POST["submit"])) {
    $Soalan_Psikometrik = $_POST['Soalan_Psikometrik'];

    $sql_kategori = "INSERT INTO psikometrik (Soalan_Psikometrik) 
                    VALUES ('$Soalan_Psikometrik')";

    if(mysqli_query($connection, $sql_kategori)){
        echo "<meta http-equiv=\"refresh\" content=\"1;URL=admin_create_psikometrik.php\"/>";
    }else{
        echo 'Database connection failed. Try again later';
    }
    
    }

?>