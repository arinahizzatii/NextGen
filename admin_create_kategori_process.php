<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
    include 'userconn.php';

    if (isset($_POST["submit"])) {
    $kategori_soalan = $_POST['kategori_soalan'];

    $sql_kategori = "INSERT INTO kategori_soalan (kategori_soalan) 
                    VALUES ('$kategori_soalan')";

    if(mysqli_query($connection, $sql_kategori)){
        echo "<meta http-equiv=\"refresh\" content=\"1;URL=admin_create_kategori.php\"/>";
    }else{
        echo 'Database connection failed. Try again later';
    }
    
    }

?>