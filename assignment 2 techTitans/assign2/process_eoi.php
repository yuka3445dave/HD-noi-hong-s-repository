<?php
require_once("settings.php"); 

if (!$conn) {
    die("<p>Database connection failure</p>");
}

$table_check_query = "SHOW TABLES LIKE 'eoi'";
$table_check_result = mysqli_query($conn, $table_check_query);

if (mysqli_num_rows($table_check_result) == 0) {
    $create_table_query = "CREATE TABLE eoi (
        EOInumber INT AUTO_INCREMENT PRIMARY KEY,
        jobRef VARCHAR(5) NOT NULL,
        firstName VARCHAR(20) NOT NULL,
        lastName VARCHAR(20) NOT NULL,
        dob DATE NOT NULL,
        gender ENUM('male', 'female', 'non-binary', 'prefer_not_to_say') NOT NULL,
        streetAddress VARCHAR(40) NOT NULL,
        suburbTown VARCHAR(40) NOT NULL,
        state VARCHAR(3) NOT NULL,
        postcode VARCHAR(4) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(15) NOT NULL,
        skill1 VARCHAR(50),
        skill2 VARCHAR(50),
        skill3 VARCHAR(50),
        skill4 VARCHAR(50),
        skill5 VARCHAR(50),
        otherskill VARCHAR(50),
        otherSkills TEXT,
        status ENUM('New', 'Current', 'Final') DEFAULT 'New'
    )";

    if (!mysqli_query($conn, $create_table_query)) {
        die("<p>Failed to create table: " . mysqli_error($conn) . "</p>");
    }
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: form_page.php");
    exit();
}

function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$jobRef = sanitize_input(mysqli_real_escape_string($conn, $_POST['jobRef']));
$firstName = sanitize_input(mysqli_real_escape_string($conn, $_POST['firstName']));
$lastName = sanitize_input(mysqli_real_escape_string($conn, $_POST['lastName']));
$dob = sanitize_input(mysqli_real_escape_string($conn, $_POST['dob']));
$gender = sanitize_input(mysqli_real_escape_string($conn, $_POST['gender']));
$streetAddress = sanitize_input(mysqli_real_escape_string($conn, $_POST['streetAddress']));
$suburbTown = sanitize_input(mysqli_real_escape_string($conn, $_POST['suburbTown']));
$state = sanitize_input(mysqli_real_escape_string($conn, $_POST['state']));
$postcode = sanitize_input(mysqli_real_escape_string($conn, $_POST['postcode']));
$email = sanitize_input(mysqli_real_escape_string($conn, $_POST['email']));
$phone = sanitize_input(mysqli_real_escape_string($conn, $_POST['phone']));
$otherSkills = sanitize_input(mysqli_real_escape_string($conn, $_POST['otherSkills']));


if (empty($jobRef) || empty($firstName) || empty($lastName) || empty($dob) || empty($gender) || empty($streetAddress) || empty($suburbTown) || empty($state) || empty($postcode) || empty($email) || empty($phone)) {
    die("<p class=\"wrong\">All fields are required.</p>");
}

if (!preg_match("/^[a-zA-Z0-9]{5}$/", $jobRef)) {
    die("<p class=\"wrong\">Job reference number must be exactly 5 alphanumeric characters.</p>");
}

if (!preg_match("/^[a-zA-Z]{1,20}$/", $firstName) || !preg_match("/^[a-zA-Z]{1,20}$/", $lastName)) {
    die("<p class=\"wrong\">First and last name must contain only alphabetic characters and be no more than 20 characters.</p>");
}

$currentDate = new DateTime();
$dobDate = new DateTime($dob);
$age = $currentDate->diff($dobDate)->y;
if ($age < 15 || $age > 80) {
    die("<p class=\"wrong\">Date of birth must be between 15 and 80 years old.</p>");
}

if (!preg_match("/^\d{4}$/", $postcode)) {
    die("<p class=\"wrong\">Postcode must be exactly 4 digits.</p>");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("<p class=\"wrong\">Invalid email address.</p>");
}

if (!preg_match("/^[0-9\s]{8,12}$/", $phone)) {
    die("<p class=\"wrong\">Phone number must be between 8 and 12 digits or spaces.</p>");
}

$skill1 = isset($_POST['skill1']) ? '1' : '';
$skill2 = isset($_POST['skill2']) ? '2' : '';
$skill3 = isset($_POST['skill3']) ? '3' : '';
$skill4 = isset($_POST['skill4']) ? '4' : '';
$skill5 = isset($_POST['skill5']) ? '5' : '';
$otherskill = isset($_POST['otherskill']) ? '6' : '';
if (empty($skill1) && empty($skill2) && empty($skill3) && empty($skill4) && empty($skill5)&& empty($otherskill)) {
    die("<p class=\"wrong\">At least one skill must be selected.</p>");
}

if ($otherskill == '6' && empty($otherSkills)) {
    die("<p class=\"wrong\">Please enter your Other Skills if you selected the 'Other Skills' option.</p>");
}

$query = "INSERT INTO eoi (jobRef, firstName, lastName, dob, gender, streetAddress, suburbTown, state, postcode, email, phone, skill1, skill2, skill3, skill4, skill5, otherskill, otherSkills, status) 
          VALUES ('$jobRef', '$firstName', '$lastName', '$dob', '$gender', '$streetAddress', '$suburbTown', '$state', '$postcode', '$email', '$phone', '$skill1', '$skill2', '$skill3', '$skill4', '$skill5', '$otherskill', '$otherSkills', 'New')";

$result = mysqli_query($conn, $query);
if (!$result) {
    die("<p class=\"wrong\">Something is wrong with the query: ". $query. "</p>");
} else {
    $EOInumber = mysqli_insert_id($conn);
    echo "<p class=\"ok\">Successfully added application. Your EOInumber is: $EOInumber</p>";
    header("Location: confirmation_page.php?EOInumber=$EOInumber");
    exit(); 
}

mysqli_close($conn);
?>