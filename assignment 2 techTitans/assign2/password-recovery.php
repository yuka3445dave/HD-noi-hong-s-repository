<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Login Page">
        <meta name="author" content="Huy(html maker)">
        <meta name="author" content="Dung (Css maker)">
        <title>Log In - Tech Titans</title>
        <link rel="stylesheet" href="styles/styles.css">
        <link rel="icon" type="image/x-icon" href="images/Icon.jpg">
    </head>
    <body>
    <?php
        include("header.inc");
    ?>
    <main class="login-body">
    <div class="login-container">
        <h2 id="login-title">Password Recovery</h2>
        <form action="password-recovery.php" method="post" novalidate = "novalidate">
            <label for="first-password">New Password:</label>
            <input id="first-password" type="password" name="first-password" required placeholder="Enter your new password">
    
            <label for="second-password">Confirm Password:</label>
            <input id="second-password" type="password" name="second-password" required placeholder="Confirm your new password">

    
            <button type="submit" class="login-button">Proceed</button>
        </form>
        <p>Don't have an account? <a href="register.html">Sign up here</a></p>

        <?php
        include("newpass_update.php");
        ?>
    </div>
    </main>
    

   
    <?php
        include("footer.inc");
    ?>
</body>
</html>