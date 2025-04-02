<?php
require_once "check_session.php";
require_once "settings.php";

$username = $_SESSION["username"];
$query = "SELECT * FROM users WHERE usernames = '$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
$avatarPath = "images/avatars/" . $username . ".jpg";
$avatarExists = file_exists($avatarPath);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Profile</title>
  <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<?php include("header.inc"); ?>

<main class="profile-container">
  <h2>👤 Welcome, <?= htmlspecialchars($username) ?></h2>

  <div class="profile-info">
    <div class="avatar-box">
      <img src="<?= $avatarExists ? $avatarPath : 'images/default-avatar.jpg' ?>" alt="User Avatar">
    </div>

    <form method="post" enctype="multipart/form-data" class="avatar-form">
      <label>Upload New Avatar</label>
      <input type="file" name="avatar" accept="image/*" required>
      <button type="submit" name="upload_avatar">Upload</button>
    </form>

    <ul>
      <li><strong>Email:</strong> <?= htmlspecialchars($user["emails"]) ?></li>
      <li><strong>Register Date:</strong> <?= htmlspecialchars($user["register_date"]) ?></li>
      <li><strong>Password Recovery:</strong> <a href="password-recovery.php">Reset Password</a></li>
    </ul>
  </div>
</main>

<?php include("footer.inc"); ?>

</body>
</html>

<?php
if (isset($_POST["upload_avatar"])) {
    $targetDir = "images/avatars/";
    $targetFile = $targetDir . $username . ".jpg";
    if (!is_writable("images/avatars")) {
      echo "<p style='color:red;'>Folder is still not writable</p>";
  }
  
    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFile)) {
        header("Location: profile.php");
        exit;
    } else {
        echo "<p style='color:red; text-align:center;'>Upload failed. Try again.</p>";
    }
}
?>
