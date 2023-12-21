<?php
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/route/function.php';
$routes = include $_SERVER['DOCUMENT_ROOT'] . '/route/routes.php';
run('/db', $routes);
if (!isset($_SESSION["otp"])) {
    run("/", $routes);
    header("location:/index.php?regfailedmessage=Illigle Operation Found ");

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<title>Forgot Password</title>
</head>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: #f4f4f4;
}

.container {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
}

button {
    background-color: #3498db;
    color: #fff;
    padding: 30px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>

<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <h3 id="responseMessage"></h3>
        <h3 style="color:red" id="errorresponseMessage"></h3>
        <label for="email">Otp</label>
        <input type="number" id="myInput" required>
        <button id="sendDataButton" type="submit">Verify</button>

    </div>
</body>

</html>

<script>
$(document).ready(function() {
    $("#sendDataButton").click(function() {
        var data = document.getElementById("myInput").value;
        var dataToSend = {
            otp: data,
            // Add more key-value pairs as needed
        };
        // Data to be sent to the server


        // Make an AJAX request using jQuery
        $.ajax({
            type: "POST", // You can change this to "GET" or other HTTP methods
            url: "action.php", // Replace with your server endpoint
            data: dataToSend,
            dataType: "json", // The expected data type of the response
            success: function(data, status) {

                if (data == "otpmatch") {
                    $("#responseMessage").html("<p style='color:green'>Match </p>");
                    window.location.href = "/forgot/newpass.php";
                }
                if (data == "otpnotmatch") {
                    $("#responseMessage").html("<p style='color:Red'>Not Match </p>");

                }


            },
            error: function(xhr, status, error) {

                console.error("Error:", error);
                $("#errorresponseMessage").html(
                    "<p>Error occurred while sending data.</p>");
            }
        });
    });
});
</script>