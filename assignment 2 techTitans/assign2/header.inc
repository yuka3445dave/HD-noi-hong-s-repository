<?php
    require_once "check_session.php";
    require_once "settings.php";
?>
<nav class="nav_bar">
        <ul>
            <li><a href="./index.php" class="logo"><img src="./images/TechTitanLogo.jpg" alt="home page logo"></a></li>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./jobs.php">Career</a></li>
            <li><a href="./apply.php">Application Form</a></li>
            <li><a href="./enhancements.php">Enhancement</a></li>
            <li><a href="./about.php">About Us</a></li>
            <?php 
                if(!empty($_SESSION["username"])) {
                $query = "SELECT * FROM users WHERE usernames = '{$_SESSION["username"]}'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                if($row["status"] == "MNG") {
                    echo"<li><a href=\"./manage.php\">Management</a></li>";
                }
            }
            ?>
        </ul>
            <ul class="right-nav">
                <li ><a href="https://www.facebook.com/profile.php?id=61573048452750">Contact</a></li>
                <?php
                    include("user_display.php");
                ?>
            </ul>
    </nav>