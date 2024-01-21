<?php
session_start();
include("userconn.php");

if (!isset($_SESSION['User_ID'])) {
    // Redirect to the login page if the user is not logged in.
    header("Location: login.php");
    exit;
}

if (isset($_POST["submit"])) {
    // Handle form submission here
    $psikometrikIds = $_POST['Psikometrik_ID']; // Get an array of question IDs from the form
    $jawapans = $_POST['jawapan']; // Get an array of user's responses
    $userId = $_SESSION['User_ID']; // Retrieve the User_ID from the session

    foreach ($psikometrikIds as $key => $Psikometrik_ID) {
        // Retrieve the corresponding rating for this question
        $jawapan = $jawapans[$key];

        // Check if the user has already responded to this question for the given program
        $checkQuery = "SELECT * FROM jawapan_psikometrik WHERE Psikometrik_ID = $Psikometrik_ID AND User_ID = '$userId'";
        $result = mysqli_query($connection, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
            // User has already responded, so update the response
            $updateQuery = "UPDATE jawapan_psikometrik SET jawapan = $jawapan WHERE Psikometrik_ID = $Psikometrik_ID AND User_ID = '$userId'";
            mysqli_query($connection, $updateQuery);
        } else {
            // User has not responded, so insert a new response
            $insertQuery = "INSERT INTO jawapan_psikometrik (jawapan, Psikometrik_ID, User_ID) VALUES ($jawapan, $Psikometrik_ID, '$userId')";
            mysqli_query($connection, $insertQuery);
        }
    }
    // Redirect the user or perform other actions after processing
    header("Location: psikometrik.php");
}
?>
