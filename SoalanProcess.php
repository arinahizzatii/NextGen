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
    $questionIds = $_POST['questionId']; // Get an array of question IDs from the form
    $ratings = $_POST['rating']; // Get an array of user's responses
    $Program_ID = $_POST['Program_ID']; // Get the Program ID
    $userId = $_SESSION['User_ID']; // Retrieve the User_ID from the session

    foreach ($questionIds as $key => $questionId) {
        // Retrieve the corresponding rating for this question
        $rating = $ratings[$key];

        // Check if the user has already responded to this question for the given program
        $checkQuery = "SELECT * FROM jawapan_r WHERE ID_soalan = $questionId AND User_ID = '$userId' AND Program_ID = '$Program_ID'";
        $result = mysqli_query($connection, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
            // User has already responded, so update the response
            $updateQuery = "UPDATE jawapan_r SET rating = $rating WHERE ID_soalan = $questionId AND User_ID = '$userId' AND Program_ID = '$Program_ID'";
            mysqli_query($connection, $updateQuery);
        } else {
            // User has not responded, so insert a new response
            $insertQuery = "INSERT INTO jawapan_r (ID_soalan, rating, User_ID, Program_ID) VALUES ($questionId, $rating, '$userId', '$Program_ID')";
            mysqli_query($connection, $insertQuery);
        }
    }
    // Redirect the user or perform other actions after processing
    header("Location: evaluation.php");
}
?>
