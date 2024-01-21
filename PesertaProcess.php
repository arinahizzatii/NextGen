<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'userconn.php';

if (isset($_POST['submit'])) {

    $sql_reset = "UPDATE user_profile SET user_terpilih = '0'";
    $query_reset = mysqli_query($connection, $sql_reset);

    if (isset($_POST["selected_items"])){

        for ($a=1; $a<=$_POST["bilangan_pelajar"]; $a++)
        {
            if (isset($_POST["selected_items"][$a]))
            {
                if ($_POST["selected_items"][$a]>0)
                {
                    $sql = "UPDATE user_profile SET user_terpilih = '1' WHERE User_ID ='".$_POST["selected_items"][$a]."'";
                    $query = mysqli_query($connection, $sql);
                } } } 

        if ($query) {
            echo "Selected users have been updated.";
            echo "<meta http-equiv=\"refresh\" content=\"1;URL=peserta_admin.php\"/>";
        }

    }else{ 
        echo "Selected users have been reset.";
        echo "<meta http-equiv=\"refresh\" content=\"1;URL=peserta_admin.php\"/>";
     }
}
?>
