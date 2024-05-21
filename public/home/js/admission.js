print_state("sts");

document.addEventListener("DOMContentLoaded", function () {
    const forms = document.querySelector(".forms");
    const loginForm = document.querySelector(".form.login");
    const signupForm = document.querySelector(".form.signup");
    const loginLink = document.querySelector(".signup-link");
    const signupLink = document.querySelector(".login-link");
    const applyFormFields = document.querySelector(".applyForm__fields");

    // Initially hide the signup form
    signupForm.style.display = "none";

    loginLink.addEventListener("click", function (e) {
        e.preventDefault();
        loginForm.style.display = "none";
        signupForm.style.display = "block";
        applyFormFields.classList.add("signup-mode");
    });

    signupLink.addEventListener("click", function (e) {
        e.preventDefault();
        location.reload();
        signupForm.style.display = "none";
        loginForm.style.display = "block";
        applyFormFields.classList.remove("signup-mode");
    });
});

const registrationForm = document.getElementById("applicationForm");
registrationForm.addEventListener("submit", handleSubmit);

const LoginForm = document.getElementById("Loginform");
LoginForm.addEventListener("submit", handleSubmit1);

// Function to handle registration form submission
function handleSubmit(event) {
    event.preventDefault(); // Prevent the default form submission

    const registerButton = document.getElementById("kt_sign_up_submit");
    registerButton.disabled = true;

    const name = document.getElementById("userName").value;

    // split the name into first name, middle name and last name
    const nameParts = name.split(" ");
    const firstName = nameParts[0];
    const lastName = nameParts.pop();
    const middleName = nameParts.slice(1).join(" ").trim();

    const email = document.getElementById("emailid").value;
    const mobileNumber = document.getElementById("mobileNumber").value;
    const otp =
        document.getElementById("otp1").value +
        document.getElementById("otp2").value +
        document.getElementById("otp3").value +
        document.getElementById("otp4").value;
    let state = document.getElementById("sts").value;
    let city = document.getElementById("state").value;
    let field = document.getElementById("program_field").value;

    let formData = new FormData();
    formData.append("first_name", firstName);
    formData.append("middle_name", middleName);
    formData.append("last_name", lastName);
    formData.append("otp", otp);
    formData.append("phone", mobileNumber);
    formData.append("email", email);
    formData.append("permanent_state", state);
    formData.append("permanent_city", city);
    formData.append("field", field);

    // Check if the mobile number is verified
    $.ajax({
        url: `${siteURL}/otp/register`, // PHP script URL
        type: "POST",
        // Add lararvel crsf token to the data
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: formData, // Send mobile number as data data: data,
        cache: false,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status === "success") {
                // redirect to '/student/dashboard' route
                window.location.href = "/student/dashboard";
            } else {
                document.getElementById("error-message").style.display =
                    "block";
                document.getElementById("error-message").textContent =
                    response.message;
            }
        },
        error: function (xhr, status, error) {
            // Handle error response
            console.error(xhr.responseText);
        },
    });
}

// function submitForm() {
//     const formData = new FormData(registrationForm);
//     fetch("appform.php", {
//         method: "POST",
//         body: formData,
//     })
//         .then((response) => {
//             if (response.ok) {
//                 console.log("Form data submitted successfully!");
//                 showLoaderAndRedirect(
//                     "../../form/admissions/formenter/index.php"
//                 ); // Show loader then redirect
//             } else {
//                 console.error(
//                     "Error submitting form data:",
//                     response.statusText
//                 );
//                 // You can display an error message to the user
//             }
//         })
//         .catch((error) => {
//             console.error("Error:", error);
//             // You can display an error message to the user
//         });
// }

// function logForm() {
//     const formData = new FormData(LoginForm);
//     fetch("logform.php", {
//         method: "POST",
//         body: formData,
//     })
//         .then((response) => {
//             if (response.ok) {
//                 console.log("login successfully!");
//                 showLoaderAndRedirect(
//                     "../../form/admissions/formenter/index.php"
//                 ); // Show loader then redirect
//             } else {
//                 console.error(
//                     "Error submitting form data:",
//                     response.statusText
//                 );
//                 // You can display an error message to the user
//             }
//         })
//         .catch((error) => {
//             console.error("Error:", error);
//             // You can display an error message to the user
//         });
// }
// function showLoaderAndRedirect(targetUrl) {
//     // Redirect to loader page with target URL as query parameter
//     window.location.href = `loader.php?target=${encodeURIComponent(targetUrl)}`;
// }
// Function to handle login form submission
function handleSubmit1(event) {
    event.preventDefault(); // Prevent the default form submission
    var errorMessage = document.getElementById("error-message");
    var errorMessage3 = document.getElementById("error-message3");
    const loginButton = document.getElementById("kt_sign_in_submit");
    loginButton.disabled = true;

    const mobileNumber = document.getElementById("mobileNumberlog").value;
    const otp =
        document.getElementById("otp11").value +
        document.getElementById("otp12").value +
        document.getElementById("otp13").value +
        document.getElementById("otp14").value;

    let formData = new FormData();
    formData.append("phone", mobileNumber);
    formData.append("otp", otp);

    // Check if the mobile number is verified
    $.ajax({
        url: `${siteURL}/otp/login`, // PHP script URL
        type: "POST",
        // Add lararvel crsf token to the data
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: formData, // Send mobile number as data data: data,
        cache: false,
        processData: false,
        contentType: false,
        success: function (response) {
            loginButton.disabled = false; // Re-enable the button
            if (response.status === "success") {
                window.location.href = "/student/dashboard";
            } else {
                errorMessage3.style.display = "block";
                errorMessage3.textContent = response.message;
            }
        },
        error: function (xhr, status, error) {
            // Handle error response
            loginButton.disabled = false; // Re-enable the button
            console.error(xhr.responseText);
        },
    });
}

function sendOTP() {
    var mobileNumber = document.getElementById("mobileNumber").value;
    var errorMessage = document.getElementById("error-message");
    var errorMessage2 = document.getElementById("error-message2");

    // Validate mobile number
    if (mobileNumber.length !== 10 || isNaN(mobileNumber)) {
        errorMessage.textContent =
            "Please enter a valid 10-digit mobile number.";
        errorMessage.style.display = "block";
        return;
    }

    // Show OTP input fields
    document.getElementById("otpFields").style.display = "block";
    document.getElementById("verifyButtonRegister").style.display = "none";
    let formData = new FormData();
    formData.append("phone", mobileNumber);

    $.ajax({
        url: `${siteURL}/otp/generate`, // PHP script URL
        type: "POST",
        // Add lararvel crsf token to the data
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: formData, // Send mobile number as data data: data,
        cache: false,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status == "success") {
                setTimeout(function () {
                    errorMessage2.style.display = "block";
                    errorMessage2.textContent = "Otp Sent Successfully";
                }, 2000);
            }
        },
        error: function (xhr, status, error) {
            // Handle error response
            console.error(xhr.responseText);
        },
    });
}

function authOTP() {
    var mobileNumber = document.getElementById("mobileNumberlog").value;
    var errorMessage2 = document.getElementById("error-message2");
    var errorMessage = document.getElementById("error-message");

    // Validate mobile number
    if (mobileNumber.length !== 10 || isNaN(mobileNumber)) {
        errorMessage.textContent =
            "Please enter a valid 10-digit mobile number.";
        errorMessage.style.display = "block";
        return;
    }

    errorMessage.style.display = "none";

    // Show OTP input fields
    document.getElementById("otpFields1").style.display = "block";
    document.getElementById("verifyButtonLogin").style.display = "none";

    let formData = new FormData();
    formData.append("phone", mobileNumber);

    $.ajax({
        url: `${siteURL}/otp/send`, // PHP script URL
        type: "POST",
        // Add lararvel crsf token to the data
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: formData, // Send mobile number as data data: data,
        cache: false,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status == "success") {
                errorMessage2.style.display = "block";
                errorMessage2.textContent = "Otp Sent Successfully";
            }
        },
        error: function (xhr, status, error) {
            // Handle error response
            console.error(xhr.responseText);
        },
    });
}

function checkOTP() {
    var errorMessage = document.getElementById("error-message");
    var errorMessage2 = document.getElementById("error-message2");
    var enteredOTP =
        document.getElementById("otp1").value +
        document.getElementById("otp2").value +
        document.getElementById("otp3").value +
        document.getElementById("otp4").value;

    // Get the mobile number
    var mobile = document.getElementById("mobileNumber").value;
    errorMessage2.style.display = "none";
    errorMessage.style.display = "none";

    let formData = new FormData();
    formData.append("otp", enteredOTP);
    formData.append("phone", mobile);

    $.ajax({
        url: `${siteURL}/otp/verify`, // PHP script URL for OTP verification
        type: "POST",
        // Add lararvel crsf token to the data
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: formData, // Send mobile number as data data: data,
        cache: false,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status === "success") {
                document.getElementById("greenTick").style.display = "inline";
                errorMessage.style.display = "none";
                errorMessage2.style.display = "block";
                errorMessage2.textContent = "Otp Verified Successfully";

                // Wait for 2 seconds before hiding OTP fields
                setTimeout(function () {
                    document.getElementById("otpFields").style.display = "none";
                    errorMessage2.style.display = "none";
                }, 2000);
            } else {
                errorMessage2.style.display = "none";
                errorMessage.style.display = "block";
                errorMessage.textContent = "Invalid OTP. Please try again.";
            }
        },
        error: function (xhr, status, error) {
            // Handle error response
            console.error(xhr.responseText);
        },
    });
}

function verifyOTP() {
    var errorMessage = document.getElementById("error-message");
    var errorMessage2 = document.getElementById("error-message2");
    var enteredOTP =
        document.getElementById("otp11").value +
        document.getElementById("otp12").value +
        document.getElementById("otp13").value +
        document.getElementById("otp14").value;

    // Get the mobile number
    var mobile = document.getElementById("mobileNumberlog").value;
    errorMessage2.style.display = "none";
    errorMessage.style.display = "none";

    let formData = new FormData();
    formData.append("otp", enteredOTP);
    formData.append("phone", mobile);

    $.ajax({
        url: `${siteURL}/otp/verify`, // PHP script URL for OTP verification
        type: "POST",
        // Add lararvel crsf token to the data
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: formData, // Send mobile number as data data: data,
        cache: false,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status === "success") {
                document.getElementById("greenTick").style.display = "inline";
                errorMessage.style.display = "none";
                errorMessage2.style.display = "block";
                errorMessage2.textContent = "Otp Verified Successfully";

                // Wait for 2 seconds before hiding OTP fields
                setTimeout(function () {
                    document.getElementById("otpFields1").style.display =
                        "none";
                    errorMessage2.style.display = "none";
                }, 2000);
            } else {
                errorMessage2.style.display = "none";
                errorMessage.style.display = "block";
                errorMessage.textContent = "Invalid OTP. Please try again.";
            }
        },
        error: function (xhr, status, error) {
            // Handle error response
            console.error(xhr.responseText);
        },
    });
}

const pwShowHide = document.querySelectorAll(".eye-icon");
const links = document.querySelectorAll(".link");

pwShowHide.forEach((eyeIcon) => {
    eyeIcon.addEventListener("click", () => {
        let pwFields =
            eyeIcon.parentElement.parentElement.querySelectorAll(".password");

        pwFields.forEach((password) => {
            if (password.type === "password") {
                password.type = "text";
                eyeIcon.classList.replace("bx-hide", "bx-show");
                return;
            }
            password.type = "password";
            eyeIcon.classList.replace("bx-show", "bx-hide");
        });
    });
});
