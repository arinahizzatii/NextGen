<?php 
    session_start();

    include 'userconn.php';

            //recall from register.php form
            $user_IC = $_POST["user_IC"];
            $password = $_POST["user_Password"];


            //login process for user

            $query = "SELECT * FROM user_account WHERE user_IC = '$user_IC' AND user_Password = '$password'";
        
            //execute query in each row of the user
            $result = mysqli_query($connection, $query);
            $checkRow = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);

            //login failed (email didn't match with the password), stay at login.php
            if ($checkRow == 0) {
                ?>
                <!--informing the user the error has occured-->
                <script>alert("Login failed!\nYour password did not match with email or you have not registered");</script>
                <?php
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=login.php\"/>";
            } else {
                //login success for user
                    //forward to the user home page
                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=profile1.php\"/>";

                    //pass the user information via session
                    $_SESSION["User_ID"] = $row["User_ID"];
                    $_SESSION["useric"] = $row["user_IC"];
                    $_SESSION["useremail"] = $row["user_Email"];
                    $_SESSION["Password"] = $row["user_Password"];

                    $current_timestamp = date('Y-m-d h:i:s', time());
                    $last_login = $current_timestamp;
                    $user_id = $_SESSION["User_ID"];

                    $sql_login = "UPDATE user_account SET last_login='$last_login' WHERE User_ID='$user_id'";
                    $res_login = mysqli_query($connection, $sql_login);

            }
?>
