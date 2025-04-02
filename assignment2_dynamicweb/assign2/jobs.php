<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/styles.css">

</head>
<body class="job-description-background">
<?php 
    include("header.inc");
    echo"<header class=\"header-job-description\">";
        echo"<div>";
            echo"<h1>Career Description</h1>";
            echo"<p>Join our team and build the future of technology</p>";
        echo"</div>";
    echo"</header>";

    echo"<main class=\"job-description-container\">";
    require_once "settings.php";  
    require_once "check_session.php";

    $query = "SELECT * FROM job_description";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result)) {
        echo    "<div>";
        echo    "<article class=\"job-info-container\">";

    echo        "<header class=\"title-job-description\">";
        echo        "<h2>{$row["positions"]}<span>({$row["job_reference_id"]})</span></h2>";
    echo        "</header>";

        echo    "<div class=\"job-details\">";

            echo"<section class=\"general-job-info\">";

                echo"<dl>";
                    echo"<div>";
                    echo"<dt class=\"general-info-header\">Position:</dt>";
                        echo"<dd class=\"inlineblock general-info-detail\">{$row["positions"]}</dd>";
                    echo"</div>";

                    echo"<div>";
                    echo"<dt class=\"general-info-header\">Workplace:</dt>";
                        echo"<dd class=\"inlineblock general-info-detail\">{$row["workplaces"]}</dd>";
                    echo"</div>";

                    echo"<div>";
                    echo"<dt class=\"general-info-header\">Expected Salary:</dt>";
                        echo"<dd class=\"inlineblock general-info-detail\">\${$row["starting_salary"]} - \${$row["ending_salary"]}</dd>";
                    echo"</div>";

                    echo"<dt class=\"general-info-header brief-description-header\">Position Overview:</dt>";
                        echo"<dd class=\"general-info-detail brief-description\">{$row["descriptions"]}</dd>";

                echo"</dl>";

            echo"</section>";

            echo"<div class=\"responsibility-and-requirement\">";

            echo"<section class=\"job-res-req-info\">";
                echo"<h3>Responsiblity</h3>";
                echo"<ul class=\"job-description-list\">";
                    $res_list = explode("*", $row["responsibilities"]);
                    foreach($res_list as $responsibility_list) {
                        echo"<li>$responsibility_list</li>";
                    }
                echo"</ul>";
            echo"</section>";

            echo"<section class=\"job-res-req-info\">";
                echo"<h3>Requirement</h3>";
                echo"<ul class=\"job-description-list\">";
                    $req_list = explode("*", $row["requirements"]);
                    foreach($req_list as $requirement_list) {
                        echo"<li>$requirement_list</li>";
                    }
                echo"</ul>";
            echo"</section>";

        echo    "</div>";
            echo"<footer class=\"job-apply-footer\">";
            echo"<div>";
                echo"<h3 class=\"job-apply-deadline\">Application Deadline: <span>{$row["apply_deadline"]}</span></h3>";
            echo"</div>";
            echo"<div>";
                echo"<a class=\"job-apply-button\" href=\"apply.php\">Apply Now</a>";
            echo"</div>";
            echo"</footer>";
    echo        "</article>";
    echo    "</div>";

    }
    mysqli_close($conn);
    echo"</main>";
    include("footer.inc");

?>
</body>
</html>                                                           