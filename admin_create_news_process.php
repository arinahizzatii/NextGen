<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'userconn.php';


if (isset($_POST["submit"])) {
$createby = $_POST['createby'];
$tajuk_berita = $_POST['tajuk_berita'];
$perkara_berita = $_POST['perkara_berita'];
$jenis_berita = $_POST['jenis_berita'];

$sql_berita = "INSERT INTO berita (tajuk_berita, perkara_berita, createby, jenis_berita) 
        VALUES ('$tajuk_berita', '$perkara_berita', '$createby', '$jenis_berita')";

    if(mysqli_query($connection, $sql_berita)){
        echo "<meta http-equiv=\"refresh\" content=\"1;URL=admin_create_news.php\"/>";
    }else{
        echo 'Database connection failed. Try again later';
    }
    
    }

?>