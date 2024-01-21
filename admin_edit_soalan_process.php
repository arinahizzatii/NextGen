<?php
session_start();
include("userconn.php");

if (isset($_POST["update"])) {
    $id_soalan = $_POST["ID_soalan"];
    $soalan = $_POST["soalan"];
    $ID_kategori_soalan = $_POST["ID_kategori_soalan"];
    $cin_cout = $_POST["cin_cout"];

    $sql = "UPDATE soalan_r
            SET soalan = '" . $soalan . "', ID_kategori_soalan = '" . $ID_kategori_soalan . "', cin_cout = '" . $cin_cout . "'
            WHERE ID_soalan = '" . $id_soalan . "'";

    $query = mysqli_query($connection, $sql);

    if ($query) {
        echo "<meta http-equiv=\"refresh\" content=\"2;URL=admin_soalan.php\"/>";
    } else {
        die(mysqli_error());
    }
} else {
    echo "<meta http-equiv=\"refresh\" content=\"2;URL=admin_soalan.php\"/>";
}
?>
