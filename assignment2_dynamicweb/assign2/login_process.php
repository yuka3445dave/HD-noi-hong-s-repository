<?php
    require_once "check_session.php";
    require_once "settings.php";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(!empty($_POST["username"]) && !empty($_POST["password"])) {
            $username = htmlspecialchars($_POST["username"]);
            $username = trim($_POST["username"]);
            $password = htmlspecialchars($_POST["password"]);
            $password = trim($_POST["password"]);
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;

            $query = "SELECT * FROM users WHERE usernames = '" . $_SESSION['username'] . "'";
            $result = mysqli_query($conn, $query);
                if($row = mysqli_fetch_assoc($result)) {
                    if($_SESSION["password"] == $row["passwords"]) {
                        sleep(3);
                        header("location: index.php");                     
                    }
                    else {
                        echo "<p class = \"warning-message\">Your password is not correct!</p>";
                    }
                }
                else {
                    echo "<p class = \"warning-message\">Your username is not correct!</p>";
                }
        }
        elseif(empty($_POST["username"])) {
            echo "<p class = \"warning-message\">Please enter your username!</p>";
        }
        elseif(empty($_POST["password"])) {
            echo "<p class = \"warning-message\">Please enter your password!</p>";

        }

        else {
            echo "<p class = \"warning-message\">Please enter your username and password!</p>";
        }
        

    }
    mysqli_close($conn);

?>