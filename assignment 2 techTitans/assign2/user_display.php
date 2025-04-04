<?php
if (!empty($_SESSION["username"])) {
    require_once "settings.php";
    $username = $_SESSION["username"];
    $avatarPath = "images/avatars/$username.jpg";

    $avatar = file_exists($avatarPath) ? $avatarPath : "images/default-avatar.png";

    echo <<<HTML
    <li class="avatar-wrapper">
        <a href="profile.php">
            <img src="$avatar" alt="Avatar" class="nav-avatar">
        </a>
    </li>
    <li><p id="display-message">Welcome, <span id="italic">$username</span>!
        <a id="loggout-message" href="logout_process.php" name="logout">Logout</a></p>
    </li>
HTML;
} else {
    echo "<li><a href=\"./login.php\">Login/Sign Up</a></li>";
}
?>
