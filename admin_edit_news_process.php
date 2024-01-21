<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'userconn.php';

if (isset($_POST["update"])) {
    $id_berita = $_POST["ID_berita"];
    $jenis_berita = $_POST["jenis_berita"];
    $tajuk_berita = $_POST["tajuk_berita"];
    $perkara_berita = $_POST["perkara_berita"];

    $sql = "UPDATE berita
            SET tajuk_berita = '" . $tajuk_berita . "', perkara_berita = '" . $perkara_berita . "', jenis_berita = '" . $jenis_berita . "'
            WHERE ID_berita = '" . $id_berita . "'";

    $query = mysqli_query($connection, $sql);

    if ($query) {
        echo "<meta http-equiv=\"refresh\" content=\"2;URL=admin_update_news.php\"/>";
    } else {
        echo "No Connection To Database";
        die(mysqli_error());
    }
} else {
    echo "<meta http-equiv=\"refresh\" content=\"2;URL=admin_update_news.php\"/>";
}
?>
