<?php
//ini_set('display_errors', 1);
session_start();

include_once '../route/function.php';
$routes = include_once '../route/routes.php';
run('/db', $routes);

if (isset($_POST["submit"])) {
    $db = new DB();
    $sql = "SELECT * FROM users WHERE phone = '" . $_POST["phonenumber"] . "'";

    $result = $db->query($sql);

    $row = mysqli_fetch_array($result);

    if ($_POST["password"] == $row["password"]) {
        $_SESSION["id"] = $row["id"];
        $_SESSION["uid"] = $row["uid"];
        $_SESSION["phone"] = $row["phone"];
        $_SESSION["name"] = $row["name"];

    } else {

        // header("location:index.php?message=Invalide Username Password");
        run('/checklogin', $routes);

    }

    if (isset($_SESSION["id"])) // if complete User Authentication
    {
        run('/deshboard', $routes); // redirect This page
        //    unset($_SESSION["id"]);
        //   unset($_SESSION["uid"]);
    } else {

        run('/checklogin', $routes);

    }
} else {
    run('/checklogin', $routes);

    // header("location:index.php?message=Fill Up From Properly");
}