<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php?msg=login_required");
    exit();
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Tech Titans - Job Application Form">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Duyen">
    <title>Job Application Form - Tech Titans</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="icon" type="image/x-icon" href="images/Icon.jpg">
</head>

<body id="apply-body">
    <!-- Navigation Bar -->
    <?php
        include("header.inc");
    ?>

    <!-- Main Content -->
    <main>
        <div id="apply-container">
            <div id="apply-image-container">
                <img id="apply-image" src="./images/Apply-image.jpg" alt="TechTitans Image">
            </div>
            <div id="apply-form-container">
                <h2 id="apply-title">Job Application Form</h2>
                <form class="form_apply" action="process_eoi.php" method="post">
                    
                    <!-- Job Reference -->
                    <label class="label_apply" for="jobRef">Job Reference Number:</label>
                    <input class="input_apply" type="text" id="jobRef" name="jobRef" pattern="[A-Za-z0-9]{5}" required placeholder="Enter job reference number...">

                    <!-- First Name -->
                    <label class="label_apply" for="firstName">First Name:</label>
                    <input class="input_apply" type="text" id="firstName" name="firstName" maxlength="20" pattern="[A-Za-z]+" required placeholder="Enter first name...">
                    
                    <!-- Last Name -->
                    <label class="label_apply" for="lastName">Last Name:</label>
                    <input class="input_apply" type="text" id="lastName" name="lastName" maxlength="20" pattern="[A-Za-z]+" required placeholder="Enter last name...">

                    <!-- Email -->
                    <label class="label_apply" for="email">Email Address:</label>
                    <input class="input_apply" type="email" id="email" name="email" required placeholder="Enter email address...">

                    <!-- Date of Birth -->
                    <label class="label_apply" for="dob">Date of Birth:</label>
                    <input class="input_apply" type="date" id="dob" name="dob" required>

                    <!-- Gender -->
                    <label class="label_apply">Gender:</label>
                    <fieldset class="fieldset_apply">
                        <input type="radio" id="male" name="gender" value="male" required>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female" required>
                        <label for="female">Female</label>
                        <input type="radio" id="non-binary" name="gender" value="non-binary" required>
                        <label for="non-binary">Non-binary</label>
                        <input type="radio" id="prefer_not_to_say" name="gender" value="prefer_not_to_say" required>
                        <label for="prefer_not_to_say">Prefer Not To Say</label>
                    </fieldset>

                    <!-- Address -->
                    <fieldset class="fieldset_apply">
                        <legend class="legend-apply">Address</legend>
                        <label class="label_apply" for="streetAddress">Street Address:</label>
                        <input class="input_apply" type="text" id="streetAddress" name="streetAddress" maxlength="40" required placeholder="Enter Street Address...">

                        <label class="label_apply" for="suburbTown">Suburb/Town:</label>
                        <input class="input_apply" type="text" id="suburbTown" name="suburbTown" maxlength="40" required placeholder="Enter Suburb/town...">

                        <label class="label_apply" for="state">State:</label>
                        <select class="input_apply" id="state" name="state" required>
                            <option value="">Select State</option>
                            <option value="VIC">VIC</option>
                            <option value="NSW">NSW</option>
                            <option value="QLD">QLD</option>
                            <option value="NT">NT</option>
                            <option value="WA">WA</option>
                            <option value="SA">SA</option>
                            <option value="TAS">TAS</option>
                            <option value="ACT">ACT</option>
                        </select>

                        <label class="label_apply" for="postcode">Postcode:</label>
                        <input class="input_apply" type="text" id="postcode" name="postcode" pattern="[0-9]{4}" maxlength="4" required placeholder="Enter Postcode...">
                    </fieldset>

                    <!-- Phone -->
                    <label class="label_apply" for="phone">Phone Number:</label>
                    <input class="input_apply" type="tel" id="phone" name="phone" pattern="[0-9\s]{8,12}" required placeholder="Enter phone number...">

                    <!-- Skill List -->
                    <fieldset class="fieldset_apply">
                        <legend class="legend-apply">Skill List</legend>
                        <label for="skill1"><input type="checkbox" id="skill1" name="skill1" value="skill1" checked> Skill 1</label>
                        <label for="skill2"><input type="checkbox" id="skill2" name="skill2" value="skill2"> Skill 2</label>
                        <label for="skill3"><input type="checkbox" id="skill3" name="skill3" value="skill3"> Skill 3</label>
                        <label for="skill4"><input type="checkbox" id="skill4" name="skill4" value="skill4"> Skill 4</label>
                        <label for="skill5"><input type="checkbox" id="skill5" name="skill5" value="skill5"> Skill 5</label>
                        <label for="otherskill"><input type="checkbox" id="otherskill" name="otherskill" value="otherskill"> Other Skills</label>
                    </fieldset>

                    <!-- Other Skills -->
                    <label class="label_apply" for="otherSkills">Other Skills:</label>
                    <textarea class="input_apply" id="otherSkills" name="otherSkills" placeholder="List any other relevant skills..."></textarea>

                    <!-- Submit & Reset -->
                    <div class="apply-reset-button">
                        <button type="submit">Apply</button>
                        <button type="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!-- Confirm Modal -->
    <div id="confirmModal" class="modal hidden">
    <div class="modal-content">
        <h3>Review Your Application</h3>
        <div id="summaryContent"></div>
        <div class="modal-buttons">
        <button id="confirmSubmit" class="confirm-btn">Apply</button>
        <button id="cancelSubmit" class="cancel-btn">I'm not sure</button>
        </div>
    </div>
</div>

    <!-- Footer -->
    <?php
        include("footer.inc");
    ?>
    <script>
        const form = document.querySelector(".form_apply");
        const modal = document.getElementById("confirmModal");
        const summary = document.getElementById("summaryContent");
        const confirmBtn = document.getElementById("confirmSubmit");
        const cancelBtn = document.getElementById("cancelSubmit");

        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const data = new FormData(form);
            const formData = Object.fromEntries(data.entries());

            const displayMap = {
            jobRef: "Job Ref",
            firstName: "First Name",
            lastName: "Last Name",
            email: "Email",
            dob: "Date of Birth",
            gender: "Gender",
            streetAddress: "Street Address",
            suburbTown: "Suburb/Town",
            state: "State",
            postcode: "Postcode",
            phone: "Phone Number",
            otherSkills: "Other Skills"
            };

            const skillLabels = {
            skill1: "Skill 1",
            skill2: "Skill 2",
            skill3: "Skill 3",
            skill4: "Skill 4",
            skill5: "Skill 5",
            otherskill: "Other Skill"
            };

            let html = "<ul>";

            for (let key in formData) {
            if (displayMap[key]) {
                html += `<li><strong>${displayMap[key]}:</strong> ${formData[key]}</li>`;
            }
            }

            const selectedSkills = Object.keys(skillLabels)
            .filter((skill) => data.get(skill))
            .map((skill) => `✅ ${skillLabels[skill]}`);

            if (selectedSkills.length > 0) {
            html += `<li><strong>Selected Skills:</strong> ${selectedSkills.join(", ")}</li>`;
            }

            html += "</ul>";
            summary.innerHTML = html;
            modal.classList.remove("hidden");
        });

        confirmBtn.addEventListener("click", () => {
            modal.classList.add("hidden");
            form.submit();
        });

        cancelBtn.addEventListener("click", () => {
            modal.classList.add("hidden");
        });
</script>




</body>
</html>
