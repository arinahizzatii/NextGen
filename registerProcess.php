<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Using session to track user information
session_start();

include 'userconn.php';

// Recall data from the registration form
$user_IC = $_POST["user_IC"];
$user_Email = $_POST["user_Email"];
$user_Password = $_POST["user_Password"];
$user_CPassword = $_POST["user_CPassword"];

// Check if the user_IC already exists in the user_account table
$queryCheck = "SELECT * FROM user_account WHERE user_IC = '$user_IC'";
$resultCheck = mysqli_query($connection, $queryCheck);
$checkRow = mysqli_num_rows($resultCheck);
$row = mysqli_fetch_array($resultCheck);

if ($checkRow > 0) { 
    ?>
    <script>alert("Registration failed! The account already exists.");</script>
    <?php
    echo "<meta http-equiv=\"refresh\" content=\"2;URL=login.php\"/>";
} else {
    // Check if the entered password matches the confirmation password
    if ($user_Password === $user_CPassword) {
        // Insert data into the user_profile table
        $queryProfile = "INSERT INTO `user_profile`(`IC`, `Email`) 
                        VALUES ('$user_IC', '$user_Email')";
        mysqli_query($connection, $queryProfile);

        // Retrieve the User_ID that was generated for the user_profile record
        $userProfileID = mysqli_insert_id($connection);

        // Insert data into the user_account table and link it to the user_profile record
        $queryAccount = "INSERT INTO `user_account`(`user_IC`, `user_Email`, `user_Password`, `User_ID`) 
                         VALUES ('$user_IC', '$user_Email', '$user_Password', '$userProfileID')";
        mysqli_query($connection, $queryAccount);

        header('location: login.php');
    } else {
        echo "<script>alert('Passwords do not match. Please try again.');</script>";
        echo "<meta http-equiv=\"refresh\" content=\"2;URL=register.php\"/>";
    }
}
?>
