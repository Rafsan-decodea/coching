<?php 
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/route/function.php';
include $_SERVER['DOCUMENT_ROOT'] . '/db/db.php';
$routes = include $_SERVER['DOCUMENT_ROOT'] . '/route/routes.php';
//ini_set('display_errors', 1);
if (!isset($_SESSION["otpverified"])) {
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
        <form method="POST" action="/forgot/newpass.php">
            <h2>Forgot Password</h2>
            <h3 id="responseMessage"></h3>
            <h3 style="color:red" id="errorresponseMessage"></h3>
            <label for="email">New Password</label>
            <input type="text" id="myInput" name="newpassword" required>
            <button id="sendDataButton" name="setnewpassword" type="submit">Set New Password</button>
        </form>
        <?php 
         if (isset($_POST["setnewpassword"]))
         {
            $id = $_SESSION["id"];
            
            $sql = "UPDATE users SET password = '".$_POST["newpassword"]."' WHERE id = $id";
            echo $sql;
            $db = new DB();
            $db->query($sql);
            session_destroy(); //destroy the session
            header("location:/index.php?regmessage=Password Reset Successfully "); //to redirect back to "index.php" after logging out
            exit();


         }
        
       ?>
    </div>
</body>

</html>