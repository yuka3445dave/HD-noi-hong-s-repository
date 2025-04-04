<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Register Page - Tech Titans">
    <meta name="author" content="Huy (Html maker)">
    <meta name="author" content="Dung (Css maker)">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Tech Titans</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="icon" type="image/x-icon" href="images/Icon.jpg">
</head>
<body>
    <!-- Navigation Bar -->
    <?php
        include("header.inc");
    ?>

    <!-- Register Form -->
     <main class="register-body">
    <div class="register-container">
        <h2>Sign Up</h2>
        <form action="register.php" method="post" novalidate = "novalidate">
            <label for="username">Username:</label>
            <input id="username" type="text" name="username" required placeholder="Choose a username">

            <label for="email">Email:</label>
            <input id="email" type="email" name="email" required placeholder="Enter your email">

            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required placeholder="Create a password">

            <button type="submit" class="register-button">Register</button>
        </form>
        <?php
            include("account_process.php");
        ?>
    </div>
</main>
    <!-- Footer -->
    <?php
        include("footer.inc");
    ?>
</body>
</html>
