<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Login Page">
        <meta name="author" content="Huy(html maker)">
        <meta name="author" content="Dung (Css maker)">
        <title>Log In - Tech Titans</title>
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <?php if (isset($_GET["msg"]) && $_GET["msg"] === "login_required") {
            echo "<script>alert('Please log in to apply for a job.');</script>";
        } ?>

    <?php
        include("header.inc");
    ?>
    <main class="login-body">
    <div class="login-container">
        <h2 id="login-title">Login</h2>
        <form action="login.php" method="post" novalidate = "novalidate">
            <label for="username">Username:</label>
            <input id="username" type="text" name="username" required placeholder="Enter your username">
    
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required placeholder="Enter your password">

            <p id="forgot-password"><a href="password-recovery-authen.php">Forgot password?</a></p>
    
            <button type="submit" class="login-button">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Sign up here</a></p>

        <?php
        include("login_process.php");

        ?>
    </div>

    

    </main>
    

   
    <?php
        include("footer.inc");
    ?>
</body>
</html>
