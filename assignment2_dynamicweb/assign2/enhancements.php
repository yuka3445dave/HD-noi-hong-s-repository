<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Phong (HTML & CSS)">
    <meta name="description" content="Enhancement page of Tech Titans company">
    <meta name="keywords" content="ITcor">
    <link rel="icon" type="image/x-icon" href="images/Icon.jpg">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Enhancements - Tech Titans</title>
</head>
<body>
<?php
        include("header.inc");
    ?>
    <main>
        <article class="enhancement-layout">
        <header class="enhance-header-background">
            <div class="enhance-overlay">
                <h1 class="enhance-title">🚀 Innovative Enhancements</h1>
                <p class="enhance-subtitle">
                Enhancing our site with modern features to improve security, experience & flexibility.
                </p>
            </div>
        </header>

        <section class="first-enhance-content">
        <div class="enhance-auth-wrapper">
            <div class="enhance-auth-text">
            <h2>🔐 Secure User Authentication</h2>
            <p>
                To improve safety and experience on our platform, we’ve introduced personalized accounts.
                This empowers applicants to manage profiles, apply for jobs, and track updates securely and effortlessly.
            </p>
            <a class="auth-btn" href="login.php" title="Go to Login">Try Login Page</a>

            </div>

            <div class="enhance-auth-image">
            <img src="images/login-page.png" alt="Image of Login page">
            </div>
        </div>
        </section>


                <h3 id="second-enhance-title">HOW IT WORKS</h3>

            <section class="second-enhance-content">
                <h4>Login Page</h4>
                <dl id="second-enhance-layout">
                    <div>
                    <dt>Username and Password Fields</dt>
                        <dd>To access their accounts, users must enter their own username and password. The fields are positioned for convenience and have clear labels</dd>
                    </div>
                    <div>
                    <dt>Login Button</dt>
                        <dd>Users can continue by clicking the login button after providing their credentials. To improve visibility, the button is positioned and styled properly</dd>
                    </div>
                    <div>
                    <dt>SignUp Prompt</dt>
                        <dd>Below the login form, there is a prompt advising new users without accounts to create one. Users are redirected to the registration page by clicking it</dd>
                    </div>
                </dl>
            </section>

            <section class="third-enhance-content">
                <h3>🔐 Secure Login System with Validation</h3>
                <div class="third-enhance-grid">
                    <div class="login-summary">
                    <h4>Backend Logic Breakdown</h4>
                    <ul>
                        <li><strong>Input Filtering:</strong> User credentials are sanitized with <code>htmlspecialchars()</code> and <code>trim()</code>.</li>
                        <li><strong>Credential Verification:</strong> The system checks if the username exists and if the password matches the database record.</li>
                        <li><strong>Session Control:</strong> Username and password are stored in <code>$_SESSION</code> for persistence and secure redirection.</li>
                        <li><strong>Error Feedback:</strong> If credentials are wrong or missing, clear warning messages are displayed.</li>
                        <li><strong>Delay Defense:</strong> <code>sleep(3)</code> adds delay to slow brute-force attacks.</li>
                    </ul>
                    </div>
                    <div class="login-img-preview">
                        <img class="login-code-img" src="images/login-backend-logic.png" alt="Login backend logic">
                    </div>
                </div>
            </section>



                <section class="fourth-enhance-content">
                    <h3>🎯 Why Secure Login Matters</h3>
                    <dl class="fourth-enhance-layout">
                        <div>
                        <dt>🔐 Account-Based Security</dt>
                        <dd>Login ensures that only verified users can access protected features or personal data.</dd>
                        </div>
                        <div>
                        <dt>👤 Personalized Access</dt>
                        <dd>Each applicant interacts with their data securely, improving trust and user experience.</dd>
                        </div>
                        <div>
                        <dt>🛡️ Data Integrity</dt>
                        <dd>Session-based authentication prevents unauthorized changes or tampering with sensitive information.</dd>
                        </div>
                    </dl>
                </section>
            <section class="fifth-enhance-content">
    <h2>Meeting Notes Summary</h2>
    <p>As part of our collaborative development process, our team maintained weekly notes summarizing planning, technical progress, and task completion.</p>

    <div class="meeting-notes-box">
    <div class="notes-grid">
        <div class="note">
            <span>Week 6</span>
            <p>Finalized team roles and delegated pages.</p>
        </div>
        <div class="note">
            <span>Week 7</span>
            <p>Chose layout system and unified styles.</p>
        </div>
        <div class="note">
            <span>Week 8</span>
            <p>Built structure, implemented PHP includes.</p>
        </div>
        <div class="note">
            <span>Week 9</span>
            <p>Designed EOI & job DB schema.</p>
        </div>
        <div class="note">
            <span>Week 10</span>
            <p>Finished backend + validation for <code>process_eoi.php</code>.</p>
        </div>
        <div class="note">
            <span>Week 11</span>
            <p>Final polishing, testing & enhancement wrap-up.</p>
        </div>
    </div>

    <div class="download-btn-container">
        <a href="assets/meeting_notes.txt" download class="btn-download">📥 Download Notes</a>
    </div>
</div>

</section>

<section class="sixth-enhance-content">
  <h3>🔐 Secure Password Reset System</h3>
  <div class="recovery-enhance-grid">
    <div class="recovery-description">
      <p>We developed a <strong>session-based, email-validated password recovery system</strong> to securely assist users who forgot their password.</p>
      <ol class="recovery-steps">
        <li><strong>Step 1: Email Validation</strong>  
          <br>Users submit the email they registered with. The backend verifies if it exists in the database.
          <br><em>(Handled in <code>newpass_email_valid.php</code>)</em>
        </li>
        <li><strong>Step 2: Password Reset</strong>  
          <br>If the email is valid, a session is created. The user is redirected to set and confirm a new password.
          <br>The new password is only accepted if both inputs match.
          <br><em>(Handled in <code>newpass_update.php</code>)</em>
        </li>
      </ol>
      <p>🔐 <strong>Security Measures:</strong>  
        <ul>
          <li>User input is sanitized with <code>htmlspecialchars()</code> and <code>trim()</code>.</li>
          <li>Validation prevents unregistered emails and mismatched passwords.</li>
          <li>Sessions temporarily store email identity between steps.</li>
        </ul>
      </p>
    </div>
    <div class="recovery-image-preview">
      <img src="images/password-recovery-step1.png" alt="Screenshot of Step 1: Email Submission">
      <img src="images/password-recovery-step2.png" alt="Screenshot of Step 2: Password Reset">
    </div>
  </div>
</section>

<section class="seventh-enhance-content">
  <h3>📋 Application Summary Overview</h3>
  <div class="summary-enhance-wrapper">
    <div class="summary-description">
      <ul>
        <li><strong>Job Reference Filter:</strong> Search applications by job code for quick tracking.</li>
        <li><strong>Name Search:</strong> Lookup EOIs by first and last name combinations.</li>
        <li><strong>Change EOI Status:</strong> Allows manager to update EOI status to “New”, “Current”, or “Final”.</li>
        <li><strong>Delete by Reference:</strong> Deletes all EOIs related to a job instantly.</li>
        <li><strong>Manager Access Only:</strong> This interface is restricted to MNG/admin users only for security.</li>
      </ul>
    </div>
    <div class="summary-image">
      <img src="images/summary_application.png" alt="Application Summary Screenshot">
    </div>
  </div>
</section>

<section class="eighth-enhance-content">
  <h3>👤 Profile Management for Users</h3>
  <div class="profile-enhance-wrapper">
    <div class="profile-description">
      <ul>
        <li><strong>Email & Date Shown:</strong> Displays user’s email and register date pulled from database.</li>
        <li><strong>Upload Avatar:</strong> Users can upload a custom image which is stored under their username.</li>
        <li><strong>Reset Password:</strong> Direct link to the recovery system is provided under user details.</li>
        <li><strong>NavBar Icon:</strong> Avatar icon now appears top-right in the menu and links directly to profile.</li>
      </ul>
    </div>
    <div class="profile-image">
      <img src="images/profile_user.png" alt="Profile Page Screenshot">
    </div>
  </div>
</section>

<section class="ninth-enhance-content">
  <h3>🚫 Admin Page Access Control</h3>
  <p class="admin-desc">
    To enforce security, the <code>manage.php</code> page checks if the logged-in user is marked <strong>MNG</strong> in the database. If not, they see a funny access denied message and get redirected to Rick Astley after 10 seconds. This restriction is done through:
  </p>
  <ol class="admin-steps">
    <li>Checking session <code>$_SESSION["username"]</code>.</li>
    <li>Verifying that user status is <code>"MNG"</code>.</li>
    <li>Showing a styled access block with a back button + a RickRoll.</li>
  </ol>
  <div class="admin-enhance-image">
    <img src="images/limit_access.png" alt="Access Denied Screenshot">
  </div>
</section>



        </article>
    </main>
    <?php
        include("footer.inc");
    ?>
</body>

</html>