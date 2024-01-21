
<?php 
		include 'userconn.php';

		if (isset($_GET["Psikometrik_ID"])) {
            $id = $_GET["Psikometrik_ID"];

            $sql = "DELETE FROM psikometrik WHERE Psikometrik_ID ='" . $id . "'";
            $query = mysqli_query($connection, $sql) or die(mysqli_error());

            if($query){
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=admin_psikometrik.php\"/>";
            } else {
                die(mysqli_error());
            }
        } else {
            echo "<meta http-equiv=\"refresh\" content=\"2;URL=admin_psikometrik.php\"/>";
        }
	?> 
