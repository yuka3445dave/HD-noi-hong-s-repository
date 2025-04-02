<?php
    require_once"settings.php";
    require_once "check_session.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_POST["first-password"]) && !empty($_POST["second-password"])) {
            $first_password = htmlspecialchars($_POST["first-password"]);
            $first_password = trim($_POST["first-password"]);
            $second_password = htmlspecialchars($_POST["second-password"]);
            $second_password = trim($_POST["second-password"]);

            if($first_password == $second_password) {
                $new_password = $second_password;

                $query = "UPDATE users SET passwords = '$new_password' WHERE emails = '" . $_SESSION["email"] . "'";
                $result = mysqli_query($conn, $query);

                sleep(3);
                header("location: login.php");
            }
            else {
                echo "<p class = \"warning-message\">Your entered password is not matched!</p>";
            }
        }
        elseif(empty($_POST["first-password"])) {
            echo "<p class = \"warning-message\">Please enter your new password!</p>";
        }
        elseif(empty($_POST["second-password"])) {
            echo "<p class = \"warning-message\">Please confirm your password!</p>";
        }

        else {
            echo "<p class = \"warning-message\">Please enter your new password!</p>";
        }
    }
    mysqli_close($conn);

?>