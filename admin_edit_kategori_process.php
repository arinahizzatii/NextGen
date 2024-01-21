<?php
session_start();
include("userconn.php");

if (isset($_POST["submit"])) {
    $id = $_POST["ID_kategori_soalan"];
    $kategoriSoalan = $_POST["kategori_soalan"];

    $sql = "UPDATE kategori_soalan
            SET kategori_soalan = '" . $kategoriSoalan . "'
            WHERE ID_kategori_soalan = '" . $id . "'";

    $query = mysqli_query($connection, $sql);

    if ($query) {
        echo "<meta http-equiv=\"refresh\" content=\"2;URL=admin_kategori.php\"/>";
    } else {
        die(mysqli_error());
    }
} else {
    echo "<meta http-equiv=\"refresh\" content=\"2;URL=admin_kategori.php\"/>";
}
?>
