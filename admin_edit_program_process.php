<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'userconn.php';

if (isset($_POST["update"])) {
    $Program_ID = $_POST["Program_ID"];
    $NamaProg = $_POST["NamaProg"];
    $DateStart = $_POST["DateStart"];
    $DateEnd = $_POST["DateEnd"];
    $Code = $_POST["Code"];
    $program_terpilih = $_POST["program_terpilih"];

    $sql = "UPDATE program
            SET NamaProg = '" . $NamaProg . "', DateStart = '" . $DateStart . "', DateEnd = '" . $DateEnd . "'
            , Code = '" . $Code . "', program_terpilih = '" . $program_terpilih . "'
            WHERE Program_ID = '" . $Program_ID . "'";

    $query = mysqli_query($connection, $sql);

    if ($query) {
        echo "<meta http-equiv=\"refresh\" content=\"2;URL=admin_update_program.php\"/>";
    } else {
        echo "No Connection To Database";
        die(mysqli_error());
    }
} else {
    echo "<meta http-equiv=\"refresh\" content=\"2;URL=admin_update_program.php\"/>";
}
?>
