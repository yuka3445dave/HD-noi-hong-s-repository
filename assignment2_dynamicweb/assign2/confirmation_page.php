<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmation Page</title>
  <link rel="stylesheet" href="styles/styles.css">
</head>
<body id="confirmation-body">
<?php
    include("header.inc");?>    
<div class="page-wrapper">
  <div id="confirmation-wrapper">
    <?php
    if (isset($_GET['EOInumber'])) {
        $EOInumber = htmlspecialchars(stripslashes(trim($_GET['EOInumber'])));
        $query = "SELECT * FROM eoi WHERE EOInumber = '$EOInumber'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            echo "<h1 id='confirmation-title'>✅ Confirm your job application</h1>";
            echo "<div id='confirmation-details'>";
            echo "<p><span class='confirmation-label'>EOI Number:</span> {$row['EOInumber']}</p>";
            echo "<p><span class='confirmation-label'>Job Reference Number:</span> {$row['jobRef']}</p>";
            echo "<p><span class='confirmation-label'>First Name:</span> {$row['firstName']}</p>";
            echo "<p><span class='confirmation-label'>Last Name:</span> {$row['lastName']}</p>";
            echo "<p><span class='confirmation-label'>Date of Birth:</span> {$row['dob']}</p>";
            echo "<p><span class='confirmation-label'>Gender:</span> {$row['gender']}</p>";
            echo "<p><span class='confirmation-label'>Street Address:</span> {$row['streetAddress']}</p>";
            echo "<p><span class='confirmation-label'>Suburb/Town:</span> {$row['suburbTown']}</p>";
            echo "<p><span class='confirmation-label'>State:</span> {$row['state']}</p>";
            echo "<p><span class='confirmation-label'>Postcode:</span> {$row['postcode']}</p>";
            echo "<p><span class='confirmation-label'>Email:</span> {$row['email']}</p>";
            echo "<p><span class='confirmation-label'>Phone:</span> {$row['phone']}</p>";

            echo "<div id='confirmation-skills'>";
            echo "<p><span class='confirmation-label'>Skills:</span></p><ul>";
            if ($row['skill1']) echo "<li>Skill 1</li>";
            if ($row['skill2']) echo "<li>Skill 2</li>";
            if ($row['skill3']) echo "<li>Skill 3</li>";
            if ($row['skill4']) echo "<li>Skill 4</li>";
            if ($row['skill5']) echo "<li>Skill 5</li>";
            if ($row['otherskill']) echo "<li>Other Skills</li>";
            echo "</ul></div>";

            if ($row['otherskill'] && !empty($row['otherSkills'])) {
                echo "<p><span class='confirmation-label'>Other Skills:</span> {$row['otherSkills']}</p>";
            }

            echo "<p><span class='confirmation-label'>Status:</span> {$row['status']}</p>";
            echo "</div>";
            // Add back button here
            echo "<div id='confirmation-buttons'>";
            echo    "<a href='jobs.php' class='back-to-jobs-button'>← Back to Career Page</a>";
            echo "</div>";
        } else {
            echo "<p class='error-message'>Invalid EOI Number.</p>";
        }
    } else {
        echo "<p class='error-message'>No EOI number provided.</p>";
    }
    mysqli_close($conn);
    ?>
  </div>
</div>  

  <?php
        include("footer.inc");
    ?>
</body>
</html>
