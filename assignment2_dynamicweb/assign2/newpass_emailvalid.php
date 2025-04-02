<?php
    require_once"settings.php";
    require_once "check_session.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_POST["email"])) {
            $email = htmlspecialchars($_POST["email"]);
            $email = trim($_POST["email"]);

            $query = "SELECT * FROM users WHERE emails = '$email'";
            $result = mysqli_query($conn, $query);

            if($row = mysqli_fetch_assoc($result)) {
                $_SESSION["email"] = $email;
                sleep(1);

                header("location: password-recovery.php");
            }
            else {
                echo "<p class = \"warning-message\">Your email is invalid!</p>";

            }
        }
        else {
            echo "<p class = \"warning-message\">Please enter your previous email used for registering your account!</p>";
        }
    }
    mysqli_close($conn);
?>