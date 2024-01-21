<?php
session_start();
include("userconn.php");

if (isset($_POST["submit"])) {
    $id = $_POST["Psikometrik_ID"];
    $Soalan_Psikometrik = $_POST["Soalan_Psikometrik"];

    $sql = "UPDATE psikometrik
            SET Soalan_Psikometrik = '" . $Soalan_Psikometrik . "'
            WHERE Psikometrik_ID = '" . $id . "'";

    $query = mysqli_query($connection, $sql);

    if ($query) {
        echo "<meta http-equiv=\"refresh\" content=\"2;URL=admin_psikometrik.php\"/>";
    } else {
        die(mysqli_error());
    }
} else {
    echo "<meta http-equiv=\"refresh\" content=\"2;URL=admin_psikometrik.php\"/>";
}
?>
