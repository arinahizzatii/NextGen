<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//session_start();

include('userconn.php');
$user_IC = $_POST["user_IC"];
$user_Email = $_POST["user_Email"];
$user_Password = $_POST["user_Password"];
$user_Password_Confirm = $_POST["user_Password_Confirm"];

if($user_Password==$user_Password_Confirm){

    $sql_reset = "SELECT * FROM user_account WHERE user_IC = '$user_IC' AND user_Email = '$user_Email'";
    $query_reset = mysqli_query($connection, $sql_reset);
    $checkRow = mysqli_num_rows($query_reset);

    if ($checkRow > 0) { 
        $sql_UserAcc = "UPDATE user_account SET user_Password='$user_Password' WHERE user_IC='$user_IC' AND user_Email='$user_Email'";
        $query_UserAcc = mysqli_query($connection, $sql_UserAcc);

    echo "Your password have been reset. Try login with the new password.";
    echo "<meta http-equiv=\"refresh\" content=\"1;URL=login.php\"/>";
   }else{
    echo "User with IC '$user_IC' and email '$user_Email' does not exist. Please register an account.";
   }
}else{
    echo "The new password and confirm password not matched.";
}
?>