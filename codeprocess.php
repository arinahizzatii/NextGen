<?php
session_start();
include 'userconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle form submission here
    $Code = $_POST['Code'];
    $progID = $_POST['progID'];

    $query = "SELECT * FROM program WHERE Code = '".$Code."' AND Program_ID = '".$progID."'"; 
    $result = mysqli_query($connection, $query);
    $rows = mysqli_num_rows($result);

    if ($rows > 0) {
        // Code exists, insert into join_program table
        $row = mysqli_fetch_assoc($result);
        $programID = $row['Program_ID'];
        $userProfileID = $_SESSION['User_ID'];

            $queryProg = "INSERT INTO join_program(User_ID, Program_ID) VALUES ('".$userProfileID."', '".$programID."')";

            if (mysqli_query($connection, $queryProg)) {
                echo "Successfully registered!";
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=evaluation.php\"/>";
                //exit;
            } else {
                echo "Registration failed, please try again. <br> Error: " . mysqli_error($connection);
            }
        } else {
                // Program code doesn't exist, show an alert
            echo "<script>alert('Invalid Code! Please try again.');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"2;URL=dashboarduser.php\"/>";
    }
}
?>