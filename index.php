<?php
session_start();
ini_set('display_errors', 0);
include 'route/function.php';
$routes = include 'route/routes.php';
if (isset($_SESSION["id"])) {
    run("/deshboard", $routes);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="media/logo.jpg" alt="IMG">
                </div>

                <form class="login-container" method="post" action="<?php echo run("/authuser", $routes) ?>"
                    class="login100-form validate-form">
                    <span class="login100-form-title">
                        Member Login
                    </span>
                    <br>
                    <center>
                        <p style="color:red"><?php echo $_GET["message"]; ?></p>
                        <p style="color: red;"><?php echo $_GET["regfailedmessage"]; ?></p>
                        <p style="color: green;"><?php echo $_GET["regmessage"]; ?></p>

                    </center>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="phonenumber" placeholder="phone">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>

                    </div>
                    <div class="container-login100-form-btn">
                        <button type="submit" name="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    <div class="text-center p-t-12">
                        <span class="txt1">

                        </span>
                        <a class="txt2" href="#">

                        </a>
                    </div>

                    <div class="text-center ">
                        <a id="registernew" class="txt2" href="#">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>


                </form>
                <form class="register-container" method="post" action="/auth/reg.php"
                    class="login100-form validate-form">
                    <span class="login100-form-title">
                        Student Registration
                    </span>
                    <br>
                    <center><label>Input Your Name </label></center>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="name" placeholder="name" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                    <center><label>Phone </label></center>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="number" name="phonenumber" placeholder="phone" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                    </div>
                    <center><label>password </label></center>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100"  type="password" name="regpassword" placeholder="Password"
                            required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>

                    </div>
                    <div class="container-login100-form-btn">
                        <button type="submit" name="regsubmit" class="login100-form-btn">
                            Registration
                        </button>
                    </div>
                    <div class="text-center p-t-12">
                        <span class="txt1">

                        </span>
                        <a class="txt2" href="#">

                        </a>
                    </div>

                    <div class="text-center ">
                        <a id="login" class="txt2" href="#">
                            Login
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>


                </form>
                <br>
            </div>
        </div>
    </div>
    <script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("password");
        var showPasswordCheckbox = document.getElementById("showPassword");

        showPasswordCheckbox.addEventListener("change", function() {
            if (showPasswordCheckbox.checked) {
                passwordField.type = "text"; // Show the password
            } else {
                passwordField.type = "password"; // Hide the password
            }
        });
    }
    </script>
    <script>
    document.querySelector(".register-container").style.display = "none";
    document.getElementById("registernew").addEventListener("click", function() {
        // Hide the login container
        document.querySelector(".login-container").style.display = "none";
        // Show the new container
        document.querySelector(".register-container").style.display = "block";
    });

    document.getElementById("login").addEventListener("click", function() {
        // Hide the login container
        document.querySelector(".login-container").style.display = "block";
        // Show the new container
        document.querySelector(".register-container").style.display = "none";
    });
    </script>


    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>