<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Tech Titans - IT Job Opportunities">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="LE TIEN DUNG (HTML AND CSS CREATOR)">
    <title>Home - Tech Titans</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="icon" type="image/x-icon" href="images/Icon.jpg">

</head>
<body class="index_body">
    <!-- Navigation Bar -->
    <?php
        include("header.inc");
    ?>
    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-overlay"></div>
            <div class="hero-text-container">
                <div class="hero-box hero-title">
                    <h1>Tech Titans</h1>
                </div>
                <div class="hero-box hero-description">
                    <p>TechTitan AI is a cutting-edge artificial intelligence company specializing in developing innovative solutions for businesses across various sectors. <br> We leverage the power of AI to drive efficiency, enhance decision-making, and unlock new possibilities for our clients.</p>
                </div>
            </div>
        </section>

<!-- Slideshow with Background -->
<div class="slideshow-bg">
    <h2>GALLERY</h2>
    <div class="slideshow-wrapper">
        <div class="slideshow-container">
            <div class="slide fade">
                <img src="images/CompanyTower.jpeg" alt="Company 1">
            </div>
            <div class="slide fade">
                <img src="images/Meeting.jpg" alt="Company 2">
            </div>
            <div class="slide fade">
                <img src="images/Office.jpg" alt="Company 3">
            </div>
        </div>
    </div>
</div>

<!-- Highlights Section with Background -->
<div class="index-background">
    <h2>Why Work with Us?</h2>        
    <ul class="index-opportunities">
            <li id="op-col1-row1">Innovative and collaborative work environment</li>
            <li id="op-col2-row1">Competitive salary and benefits</li>
            <li id="op-col1-row2">Opportunities for growth and professional development</li>
            <li id="op-col2-row2">Work on impactful projects with industry leaders</li>
        </ul>
        </div>

    </main>
    
    <!-- Footer -->
    <?php
        include("footer.inc");
    ?>
    
</body>
</html>
