<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
    include 'userconn.php';

    if (isset($_POST["submit"])) {
        $soalan = $_POST['soalan'];
        $kategoriID = $_POST['ID_kategori_soalan'];
        $cin_cout = $_POST['cin_cout'];

    $sql_soalan = "INSERT INTO soalan_r (soalan, ID_kategori_soalan, cin_cout) 
                    VALUES ('$soalan', '$kategoriID', '$cin_cout')";

    if(mysqli_query($connection, $sql_soalan)){
        echo "<meta http-equiv=\"refresh\" content=\"1;URL=admin_create_soalan.php\"/>";
    }else{
        echo 'Database connection failed. Try again later';
    }
    
    }

?>