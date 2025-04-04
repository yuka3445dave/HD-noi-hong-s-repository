<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Phong (HTML & CSS)">
    <meta name="description" content="About page of Tech Titans company">
    <meta name="keywords" content="ITcor">
    <link rel="stylesheet" href="styles/styles.css">
    <title>About us - Tech Titans</title>
    <link rel="icon" type="image/x-icon" href="images/Icon.jpg">

    
</head>

<body>
    <?php
        include("header.inc");
    ?>    
    <main>

    <div id="about-background">
    <div class="about-content">
        <h2>About us</h2>
        <div class="about-text">
        <dl>
            <dt>Group Name:</dt>
                <dd>Tech Titans</dd>
            <dt>Group ID:</dt>
                <dd>GROUP 16</dd>
            <dt>Tutor Name:</dt>
                <dd>Mr. Trung</dd>
        </dl>
        </div>
        <img src="images/Company-theme.jpg" alt="Tech Titanslogo" width="1472" height="832">
    </div>
    <div class="about-center">
        <h2 id="member-title">MEMBERS OF TECH TITANS</h2>
    </div>
    </div>

    <div class="member-content">
                <div class="text-content">
                    <h3>Lê Tiến Dũng<span>leader</span></h3>
                    <dl>
                            <dt>Contributions:</dt>
                            <dd>
                                <ul>
                                    <li>Modularized the site using PHP includes (header.inc, footer.inc) to avoid repeating HTML.</li>
                                    <li>Updated about.php and enhancement.php with accurate member roles and enhancement info.</li>
                                    <li>Added confirmation dialog before job submission.</li>
                                    <li>Restricted manage.php to admin users only.</li>
                                    <li>Built profile.php for user avatar and account details.</li>
                                    <li>Styled confirmation_page.php and manage.php for consistent UI.</li>
                                    <li>Ensured files are uploaded properly on Github and Mercury server</li>
                                </ul>
                            </dd>
                    </dl>
                </div>
                
                <img class="popup-animation" src="images/Dung.jpg" alt="Le Tien Dung" width="1920" height="2560">
            
            </div>

            <div class="member-content">
                <div class="text-content">
                    <h3>Ngụy Đỗ Gia Huy<span>coder</span></h3>
                    <dl>
                            <dt>Contributions:</dt>
                            <dd>
                                <ul>
                                    <li>Developed the HTML and CSS for the Job page</li>
                                    <li>Created the Login and Register pages with HTML</li>
                                    <li>Researched and gathered information for the Job page</li>
                                    <li>Ensured a user-friendly layout for job listings and authentication pages</li>
                                    <li>Create a web page manage.php that allows a manager to make the following queries of the eoi table </li>
                                </ul>
                            </dd>
                    </dl>
            </div>
                <img class="popup-animation" src="images/Huy.jpg" alt="Nguy Do Gia Huy" width="1440" height="1920">
            </div>


             <div class="member-content">
                <div class="text-content">
                    <h3>Hồ Thị Mỹ Duyên<span>designer</span></h3>
                    <dl>
                            <dt>Contributions:</dt>
                            <dd>
                                <ul>
                                    <li>Created the HTML and CSS for the Apply page</li>
                                    <li>Developed the Contact page for user inquiries</li>
                                    <li>Edited and finalized the introduction video for the website</li>
                                    <li>Create an EOI table and create the file "process_eoi.php" to add an EOI record to the table</li>
                                    <li>Create a "confirmation.php" page to notify users that they have successfully applied.</li>
                                </ul>
                            </dd>
                    </dl>
            </div>
                <img class="popup-animation" src="images/Duyen.jpg" alt="Ho Thi My Duyen" width="1926" height="2568">
            </div>

            <div class="member-content">
                <div class="text-content">
                    <h3>Lưu Đạt Phong<span>coder</span></h3>
                    <dl>
                            <dt>Contributions:</dt>
                            <dd>
                                <ul>
                                    <li>Transform the job page into a dynamic platform that interacts with myAdminPHP database</li>
                                    <li>Create a database table for user account management</li>
                                    <li>Implement authentication for login/register with proper validation</li>
                                    <li>Implement password recovery for better user experience</li>
                                </ul>
                            </dd>
                    </dl>
            </div>
                <img class="popup-animation" src="images/Phong.jpg" alt="Luu Dat Phong" width="1536" height="2048">
            </div>

<div class="table-content">
        <div class="about-center">
            <h2>OUR WEEKLY SCHEDULE</h2>
        </div>

        <div class="schedule-tabs">
            <input type="radio" name="month" id="march" checked>
            <label for="march">March 2025</label>

            <input type="radio" name="month" id="april">
            <label for="april">April 2025</label>

            <div class="schedule-container">

      <!-- MARCH -->
        <div class="month-table march-table">
        <table>
            <thead>
            <tr>
                <th>Time</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
                <th>Sunday</th>
            </tr>
            </thead>
            <tbody>
            <tr><td>6:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>7:00</td><td rowspan="5" class="td-highlight" id="tne10006">TNE10006</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>8:00</td><td></td><td></td><td></td><td></td><td rowspan="5" class="td-highlight" id="group-meeting">Group meeting</td><td></td></tr>
            <tr><td>9:00</td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>10:00</td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>11:00</td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>12:00</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>13:00</td><td></td><td></td><td rowspan="5" class="td-highlight" id="cos10026">COS10026</td><td></td><td></td><td></td><td></td></tr>
            <tr><td>14:00</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>15:00</td><td rowspan="3" class="td-highlight" id="prm30001">PRM30001<br><small>Dr. Thomas Hang</small></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>16:00</td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>17:00</td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>18:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            </tbody>
        </table>
        </div>

        <!-- APRIL -->
<div class="month-table april-table">
  <table>
    <thead>
      <tr>
        <th>Time</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Saturday</th>
        <th>Sunday</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>6:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr><td>7:00</td><td></td><td rowspan="5" class="td-highlight" id="cos10026-apr">COS10026<br><small>Submission Assignment 2 + Final Presentation</small></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr><td>8:00</td><td></td><td></td><td></td><td></td><td rowspan="5" class="td-highlight" id="tne10006-apr">TNE10006<br><small>Final Written Assessment</small></td><td></td></tr>
      <tr><td>9:00</td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr><td>10:00</td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr><td>11:00</td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr><td>12:00</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr>
        <td>13:00</td>
        <td></td><td></td><td></td><td></td><td></td><td></td>
        <td class="td-highlight">End of Semester<br><small>Spring 2025</small></td>
    </tr>
    <tr><td>14:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
    <tr><td>15:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>

      <tr><td>16:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr><td>17:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr><td>18:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
    </tbody>
  </table>
</div>

    </div>
  </div>
</div>

<!-- MEETING TOOLS SECTION -->
<section class="tools-section">
  <div class="tools-header">
    <h2>MEETING TOOLS</h2>
    <p>Technologies our team uses for communication</p>
  </div>
  <div class="tools-grid">
    <div class="tool-card">
      <img src="images/meet.png" alt="Google Meet Logo">
      <h3>Google Meet</h3>
    </div>
    <div class="tool-card">
      <img src="images/zalo.png" alt="Zalo Logo">
      <h3>Zalo</h3>
    </div>
    <div class="tool-card">
      <img src="images/ultra.png" alt="Collaborate Ultra Logo">
      <h3>Collaborate Ultra</h3>
    </div>
  </div>
</section>

<!-- MEETING NOTES SECTION -->
<section class="notes-section">
  <div class="notes-header">
    <h2>MEETING NOTES</h2>
    <p>Summary of key meeting discussions and decisions</p>
  </div>
  <div class="notes-container">
    <ul>
      <li><strong>Week 6:</strong> Finalized team roles and delegated pages for development.</li>
      <li><strong>Week 7:</strong> Agreed on color scheme, font family and layout grid system.</li>
      <li><strong>Week 8:</strong> Finished HTML/CSS structure for all pages, integrated PHP includes.</li>
      <li><strong>Week 9:</strong> Set up database schema for EOI table and jobs table.</li>
      <li><strong>Week 10:</strong> Debugged process_eoi.php and validate backend input.</li>
      <li><strong>Week 11:</strong> Final testing, added enhancements, prepared for presentation.</li>
    </ul>
    <div class="download-notes">
        <a href="assets/meeting_notes.txt" download class="btn-download">Download Notes</a>
    </div>

  </div>
</section>



</main>

<?php
        include("footer.inc");
    ?>
</body>
</html>