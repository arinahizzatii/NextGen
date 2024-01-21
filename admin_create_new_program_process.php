<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'userconn.php';

if (isset($_POST["submit"])) {
$current_timestamp = date('Y-m-d h:i:s a', time());

if(!isset($_POST['kod_program'])){
    $kod_program = "No Code";
}else{
    $kod_program = $_POST['kod_program'];
}

$tajuk_program = $_POST['tajuk_program'];
$date_start = $_POST['datestart'];
$date_end = $_POST['dateend'];
$program_terpilih = $_POST['program_terpilih'];

$sql_program = "INSERT INTO program (NamaProg, DateStart, DateEnd, Code, program_terpilih) 
        VALUES ('$tajuk_program', '$date_start', '$date_end','$kod_program', $program_terpilih)";

    if(mysqli_query($connection, $sql_program)){
        echo "<meta http-equiv=\"refresh\" content=\"1;URL=admin_create_new_program.php\"/>";
    }else{
        echo 'Database connection failed. Try again later';
    }
    
    }

?>