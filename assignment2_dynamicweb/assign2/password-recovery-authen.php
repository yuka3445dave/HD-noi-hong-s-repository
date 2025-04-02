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
    <?php
        include("header.inc");
    ?>
    <main class="login-body">
    <div class="login-container">
        <h2 id="login-title">Password Recovery</h2>
        <form action="password-recovery-authen.php" method="post" novalidate = "novalidate">
            <label for="email">Email address</label>
            <input id="email" type="text" name="email" required placeholder="Enter your email address">
    

    
            <button type="submit" class="login-button">Proceed</button>
        </form>
        <?php
        include("newpass_emailvalid.php");
        ?>
    </div>
    </main>
    

   
    <?php
        include("footer.inc");
    ?>
</body>
</html>