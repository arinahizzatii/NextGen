
	<?php 
		include 'userconn.php';

		if (isset($_GET["ID_soalan"])) {
            $id = $_GET["ID_soalan"];

            $sql = "DELETE FROM soalan_r WHERE ID_soalan ='" . $id . "'";
            $query = mysqli_query($connection, $sql) or die(mysqli_error());

            if($query){
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=admin_soalan.php\"/>";
            } else {
                die(mysqli_error());
            }
        } else {
            echo "<meta http-equiv=\"refresh\" content=\"2;URL=admin_soalan.php\"/>";
        }
	?> 
