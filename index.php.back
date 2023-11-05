<?php
session_start();
//ini_set('display_errors', 1);
include 'route/function.php';
$routes = include 'route/routes.php';
if (isset($_SESSION["id"])) {
    run("/deshboard", $routes);

}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <div class="login-container">
        <h2>User Login</h2>
        <form action="<?php run('/authuser', $routes);?>" method="post">
            <div class="input-container">
                <label for="phoneNumber">Phone Number (Bangladesh):</label><br>
                <input type="number" id="phoneNumber" name="phonenumber" placeholder="01XXXXXXXXX" required
                    pattern="01\d{9}">
            </div>
            <div class="input-container">
                <label for="password">Password</label>
                <input type="password" id="password2" name="password" required>
            </div>
            <a style="color:red"><?php echo htmlspecialchars($_GET["message"], ENT_QUOTES, 'UTF-8'); ?></a>
            <a style="color:green"><?php echo htmlspecialchars($_GET["regmessage"], ENT_QUOTES, 'UTF-8'); ?></a>
            <a style="color:red"><?php echo htmlspecialchars($_GET["regfailedmessage"], ENT_QUOTES, 'UTF-8'); ?></a>
            <br>
            <input type="checkbox" id="showPassword2" onchange="togglePasswordVisibility2()" />
            <label for="showPassword2">Show Password</label><br>
            <button style="color: white;" value="submit" name="submit" type="submit">Login</button>

        </form>
        <br>
        <input class="btn btn-primary" id="registernew" type="button" value="Register For New Users" />
    </div>
    <div class="register-container">
        <h2>User Registration</h2>
        <br>
        <form action="<?php run('/reg', $routes);?>" method="post">
            <div class="input-container">
                <label for="phoneNumber">Phone Number (Bangladesh):</label><br>
                <input type="number" id="phoneNumber" name="phoneNumber" placeholder="01XXXXXXXXX" required
                    pattern="01\d{9}">
            </div>
            <label for="Password"> Password:</label>
            <input type="password" id="thepassword" onkeyup="checkPasswordMatch()" />
            <br />
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="password" onkeyup="checkPasswordMatch()" />
            <br />
            <p id="message"></p>
            <input type="checkbox" id="showPassword" onchange="togglePasswordVisibility()" />
            <label for="showPassword">Show Password</label>
            <div class="input-container">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <center> <button style="background-color: #007BFF; color: white;" name="submit" id="submitButton"
                    type="submit">Register</button></center>
        </form>
        <br>
        <input class="btn btn-primary" id="login" type="button" value="login" />
    </div>
</body>

</html>
<script src="script.js"></script>

<script>
function checkPasswordMatch() {
    var password = document.getElementById("thepassword").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var message = document.getElementById("message");
    var submitButton = document.getElementById("submitButton");

    if (password == confirmPassword && password != '' && confirmPassword != '') {
        message.innerHTML = "Passwords match!";
        message.style.color = "green";
        submitButton.style.display = "block"; // Show the submit button
    } else {
        message.innerHTML = "Passwords do not match";
        message.style.color = "red";
        submitButton.style.display = "none"; // Hide the submit button
    }
}

function togglePasswordVisibility() {
    var passwordInput = document.getElementById("thepassword");
    var confirmPasswordInput = document.getElementById("confirmPassword");
    var showPasswordCheckbox = document.getElementById("showPassword");

    if (showPasswordCheckbox.checked) {
        passwordInput.type = "text";
        confirmPasswordInput.type = "text";
    } else {
        passwordInput.type = "password";
        confirmPasswordInput.type = "password";
    }
}

function togglePasswordVisibility2() {
    var passwordInput = document.getElementById("password2");
    var showPasswordCheckbox = document.getElementById("showPassword2");
    if (showPasswordCheckbox.checked) {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";

    }
}
</script>