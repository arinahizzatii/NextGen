<?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        session_start();
        include 'userconn.php';

        if (isset($_POST["submit"])) {
        $tajuk_aduan = $_POST['tajuk_aduan'];
        $perkara_aduan = $_POST['perkara_aduan'];
        $User_ID = $_SESSION['User_ID'];

        $sql_aduan = "INSERT INTO aduan (tajuk_aduan, perkara_aduan, User_ID) 
                VALUES ('$tajuk_aduan', '$perkara_aduan', '$User_ID')";

            if(mysqli_query($connection, $sql_aduan)){
                echo "<meta http-equiv=\"refresh\" content=\"1;URL=aduan.php\"/>";
            }else{
                echo 'Database connection failed. Try again later';
            }
            
            }

?>