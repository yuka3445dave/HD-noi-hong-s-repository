<?php
require_once("settings.php");
require_once("check_session.php");

if (!$conn) {
    die("<p>Database connection failure</p>");
}

// Restrict to admin only (username = 'admin' or status = 'MNG')
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION["username"];
$query = "SELECT status FROM users WHERE usernames = '$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if (!$user || $user["status"] !== "MNG") {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Access Denied</title>
    <link rel=\"icon\" type=\"image/x-icon\" href=\"images/Icon.jpg\">
        <script>
            setTimeout(function() {
                window.location.href = 'https://www.youtube.com/watch?v=dQw4w9WgXcQ';
            }, 10000);
        </script>
        <style>
            body {
                background-color: #111;
                font-family: 'Segoe UI', sans-serif;
                color: white;
                text-align: center;
                padding-top: 5em;
            }
            img {
                max-width: 400px;
                width: 90%;
                border-radius: 12px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.3);
                margin: 2em auto;
                display: block;
            }
            a.back-btn {
                display: inline-block;
                background-color: #2e7d32;
                color: white;
                padding: 0.8em 1.6em;
                text-decoration: none;
                border-radius: 10px;
                font-weight: bold;
                font-size: 1.1rem;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
                transition: background-color 0.3s ease, transform 0.2s ease;
            }
            a.back-btn:hover {
                background-color: #1b5e20;
                transform: scale(1.05);
            }
        </style>
    </head>
    <body>
        <h2 style='color:#ff4d4d;'>❌ Access Denied</h2>
        <p>You are not authorized to view this page.</p>
        <img src='images/PLEASE-GO-BACK.jpg' alt='Please go back meme' />
        <a href='index.php' class='back-btn'>← Back to Home</a>
        <p style='margin-top: 1em; color: #ccc;'>You will be redirected in 10 seconds...</p>
    </body>
    </html>";
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>HR Manager - Manage EOI</title>
</head>
<body class="manage-body">
<?php
    include("header.inc");?>

<h1 class="manage-title">HR Manager - Manage EOI</h1>

<div class="manage-container">
    <div class="manage-form-container">
        <form method="post" action="">
            <h2>Search and Manage EOIs</h2>

            <p><strong><label for="show_all">Show All EOIs:</label></strong>
                <input type="submit" name="show_all" value="Show All"></p>

            <p><strong><label for="job_reference">Search by Job Reference Number:</label></strong></p>
            <p><input type="text" name="job_reference" id="job_reference">
                <input type="submit" name="search_by_job_reference" value="Search"></p>

            <p><strong><label for="applicant_name">Search by Applicant Name:</label></strong></p>
            <p><label for="applicant_first_name">First Name:</label>
                <input type="text" name="applicant_first_name" id="applicant_first_name">
                <label for="applicant_last_name">Last Name:</label>
                <input type="text" name="applicant_last_name" id="applicant_last_name">
                <input type="submit" name="search_by_applicant" value="Search"></p>

            <p><strong><label for="delete_job_reference">Delete EOIs by Job Reference:</label></strong></p>
            <p><input type="text" name="delete_job_reference" id="delete_job_reference">
                <input type="submit" name="delete_by_job_reference" value="Delete"></p>

            <p><strong><label for="change_eoi_status">Change EOI Status:</label></strong></p>
            <p><label for="change_eoi_number">EOI Number:</label>
                <input type="text" name="change_eoi_number" id="change_eoi_number">
                <label for="change_status">Change Status to:</label>
                <select name="change_status" id="change_status">
                    <option value="New">New</option>
                    <option value="Current">Current</option>
                    <option value="Final">Final</option>
                </select>
                <input type="submit" name="change_eoi_status" value="Change Status"></p>
        </form>
    </div>

    <div class="manage-table-container">
        <?php
        if (isset($_POST["show_all"])) {
            $query = "SELECT * FROM eoi";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<h2>All EOIs:</h2>";
                echo "<table>
                      <tr>
                        <th>EOI Number</th>
                        <th>Job Reference Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Street Address</th>
                        <th>Suburb/Town</th>
                        <th>State</th>
                        <th>Postcode</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Skill 1</th>
                        <th>Skill 2</th>
                        <th>Skill 3</th>
                        <th>Skill 4</th>
                        <th>Skill 5</th>
                        <th>Other Skill</th>
                        <th>Other Skills</th>
                        <th>Status</th>
                      </tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    $skill1 = $row['skill1'] ? "✔" : "✘";
                    $skill2 = $row['skill2'] ? "✔" : "✘";
                    $skill3 = $row['skill3'] ? "✔" : "✘";
                    $skill4 = $row['skill4'] ? "✔" : "✘";
                    $skill5 = $row['skill5'] ? "✔" : "✘";
                    $otherskill = $row['otherskill'] ? "✔" : "✘";

                    echo "<tr>
                          <td>" . $row['EOInumber'] . "</td>
                          <td>" . $row['jobRef'] . "</td>
                          <td>" . $row['firstName'] . "</td>
                          <td>" . $row['lastName'] . "</td>
                          <td>" . $row['dob'] . "</td>
                          <td>" . $row['gender'] . "</td>
                          <td>" . $row['streetAddress'] . "</td>
                          <td>" . $row['suburbTown'] . "</td>
                          <td>" . $row['state'] . "</td>
                          <td>" . $row['postcode'] . "</td>
                          <td>" . $row['email'] . "</td>
                          <td>" . $row['phone'] . "</td>
                          <td>" . $skill1 . "</td>
                          <td>" . $skill2 . "</td>
                          <td>" . $skill3 . "</td>
                          <td>" . $skill4 . "</td>
                          <td>" . $skill5 . "</td>
                          <td>" . $otherskill . "</td>
                          <td>" . $row['otherSkills'] . "</td>
                          <td>" . $row['status'] . "</td>
                          </tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No EOIs found.</p>";
            }
        }

        if (isset($_POST["search_by_job_reference"])) {
            $job_reference = mysqli_real_escape_string($conn, $_POST["job_reference"]);
            $query = "SELECT * FROM eoi WHERE jobRef = '$job_reference'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<h2>EOIs for Job Reference: $job_reference</h2>";
                echo "<table>
                      <tr>
                        <th>EOI Number</th>
                        <th>Job Reference Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Street Address</th>
                        <th>Suburb/Town</th>
                        <th>State</th>
                        <th>Postcode</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Skill 1</th>
                        <th>Skill 2</th>
                        <th>Skill 3</th>
                        <th>Skill 4</th>
                        <th>Skill 5</th>
                        <th>Other Skill</th>
                        <th>Other Skills</th>
                        <th>Status</th>
                      </tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    $skill1 = $row['skill1'] ? "✔" : "✘";
                    $skill2 = $row['skill2'] ? "✔" : "✘";
                    $skill3 = $row['skill3'] ? "✔" : "✘";
                    $skill4 = $row['skill4'] ? "✔" : "✘";
                    $skill5 = $row['skill5'] ? "✔" : "✘";
                    $otherskill = $row['otherskill'] ? "✔" : "✘";

                    echo "<tr>
                          <td>" . $row['EOInumber'] . "</td>
                          <td>" . $row['jobRef'] . "</td>
                          <td>" . $row['firstName'] . "</td>
                          <td>" . $row['lastName'] . "</td>
                          <td>" . $row['dob'] . "</td>
                          <td>" . $row['gender'] . "</td>
                          <td>" . $row['streetAddress'] . "</td>
                          <td>" . $row['suburbTown'] . "</td>
                          <td>" . $row['state'] . "</td>
                          <td>" . $row['postcode'] . "</td>
                          <td>" . $row['email'] . "</td>
                          <td>" . $row['phone'] . "</td>
                          <td>" . $skill1 . "</td>
                          <td>" . $skill2 . "</td>
                          <td>" . $skill3 . "</td>
                          <td>" . $skill4 . "</td>
                          <td>" . $skill5 . "</td>
                          <td>" . $otherskill . "</td>
                          <td>" . $row['otherSkills'] . "</td>
                          <td>" . $row['status'] . "</td>
                          </tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No EOIs found for this job reference.</p>";
            }
        }

        if (isset($_POST["search_by_applicant"])) {
            $first_name = mysqli_real_escape_string($conn, $_POST["applicant_first_name"]);
            $last_name = mysqli_real_escape_string($conn, $_POST["applicant_last_name"]);
            
            $query = "SELECT * FROM eoi WHERE firstName LIKE '%$first_name%' AND lastName LIKE '%$last_name%'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<h2>EOIs for Applicant: $first_name $last_name</h2>";
                echo "<table>
                      <tr>
                        <th>EOI Number</th>
                        <th>Job Reference Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Street Address</th>
                        <th>Suburb/Town</th>
                        <th>State</th>
                        <th>Postcode</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Skill 1</th>
                        <th>Skill 2</th>
                        <th>Skill 3</th>
                        <th>Skill 4</th>
                        <th>Skill 5</th>
                        <th>Other Skill</th>
                        <th>Other Skills</th>
                        <th>Status</th>
                      </tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    $skill1 = $row['skill1'] ? "✔" : "✘";
                    $skill2 = $row['skill2'] ? "✔" : "✘";
                    $skill3 = $row['skill3'] ? "✔" : "✘";
                    $skill4 = $row['skill4'] ? "✔" : "✘";
                    $skill5 = $row['skill5'] ? "✔" : "✘";
                    $otherskill = $row['otherskill'] ? "✔" : "✘";

                    echo "<tr>
                          <td>" . $row['EOInumber'] . "</td>
                          <td>" . $row['jobRef'] . "</td>
                          <td>" . $row['firstName'] . "</td>
                          <td>" . $row['lastName'] . "</td>
                          <td>" . $row['dob'] . "</td>
                          <td>" . $row['gender'] . "</td>
                          <td>" . $row['streetAddress'] . "</td>
                          <td>" . $row['suburbTown'] . "</td>
                          <td>" . $row['state'] . "</td>
                          <td>" . $row['postcode'] . "</td>
                          <td>" . $row['email'] . "</td>
                          <td>" . $row['phone'] . "</td>
                          <td>" . $skill1 . "</td>
                          <td>" . $skill2 . "</td>
                          <td>" . $skill3 . "</td>
                          <td>" . $skill4 . "</td>
                          <td>" . $skill5 . "</td>
                           <td>" . $otherskill . "</td>
                          <td>" . $row['otherSkills'] . "</td>
                          <td>" . $row['status'] . "</td>
                          </tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No EOIs found for this applicant.</p>";
            }
        }

        if (isset($_POST["delete_by_job_reference"])) {
            $job_reference = mysqli_real_escape_string($conn, $_POST["delete_job_reference"]);
            $query = "DELETE FROM eoi WHERE jobRef = '$job_reference'";

            if (mysqli_query($conn, $query)) {
                echo "<p>Successfully deleted EOIs for job reference: $job_reference.</p>";
            } else {
                echo "<p>Error deleting EOIs: " . mysqli_error($conn) . "</p>";
            }
        }

        if (isset($_POST["change_eoi_status"])) {
            $eoi_number = mysqli_real_escape_string($conn, $_POST["change_eoi_number"]);
            $status = mysqli_real_escape_string($conn, $_POST["change_status"]);
            $query = "UPDATE eoi SET status = '$status' WHERE EOInumber = '$eoi_number'";

            if (mysqli_query($conn, $query)) {
                echo "<p>Successfully updated the status of EOI Number: $eoi_number to $status.</p>";
            } else {
                echo "<p>Error updating status: " . mysqli_error($conn) . "</p>";
            }
        }

        mysqli_close($conn);
        ?>
    </div>
    </div> <!-- close .manage-container -->
<?php include("footer.inc"); ?>
</body>
</html>
