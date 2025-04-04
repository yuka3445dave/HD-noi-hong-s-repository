<?php
    require_once "settings.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
            $username = htmlspecialchars($_POST["username"]);
            $username = trim($_POST["username"]);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            $password = htmlspecialchars($_POST["password"]);
            $password = trim($_POST["password"]);
            
            $query_username = "SELECT * FROM users WHERE usernames = '$username'";
            $query_email = "SELECT * FROM users WHERE emails = '$email'";
            
            $check_username = mysqli_query($conn, $query_username);
            $check_email = mysqli_query($conn, $query_email);
            
            $row_username = mysqli_fetch_assoc($check_username);
            $row_email = mysqli_fetch_assoc($check_email);

            if($row_username) {
                echo "<p class = \"warning-message\">The selected username has already been used!</p>";
            }
            elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<p class = \"warning-message\">The selected email is invalid!</p>";
            }
            elseif($row_email) {
                echo "<p class = \"warning-message\">The selected email has already been used!</p>";
            }
            else {            
                $query = "INSERT INTO users (usernames, passwords, emails)
                            VALUES ('$username', '$password', '$email')";
                $result = mysqli_query($conn, $query);

                sleep(5);
                header("location: login.php");
            }
            
        }
        elseif(empty($_POST["username"])) {
            echo "<p class = \"warning-message\">Please enter your username!</p>";
        }
        elseif(empty($_POST["password"])) {
            echo "<p class = \"warning-message\">Please enter your password!</p>";
        }
        elseif(empty($_POST["email"])) {
            echo "<p class = \"warning-message\">Please enter your email!</p>";

        }
        else {
            echo "<p class = \"warning-message\">Please enter the provided information!</p>";
        }
    }
    mysqli_close($conn);

?>