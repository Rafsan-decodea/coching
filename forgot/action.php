<?php
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/route/function.php';
$routes = include $_SERVER['DOCUMENT_ROOT'] . '/route/routes.php';
run('/db', $routes);
$db = new DB();

extract($_POST);
if(isset($_POST["senddata"])){

  $chkphone = $_POST["senddata"];
  $sql = "SELECT * from users where phone = $chkphone ";
  $result = $db->query($sql);
  $row = $result->fetch_assoc();
  if ($result->num_rows > 0) {
  
    $random = rand(100000, 999999);

    // Store the OTP in the session
    $_SESSION["otp"] = $random;
    $_SESSION["id"] = $row["id"];
    // Example user data (replace this with your actual data)
    $name = $row["name"];  // Replace this with the actual phone number
    
    // Remove the leading '0' from the phone number
    $modifiedNumber = substr($senddata, 1);
    
    // Compose the SMS message
    $message = "Welcome Masum ICt Academy Requested For OTP for $senddata number and Name is $name OTP is $random";
    
    $url = "https://sms.ofterndev.xyz/bekend/sms?apikey=FiCwzGVWjVLqOKsn5GcQ&mobile=$modifiedNumber&msg=".urlencode($message);
    echo json_encode("ok");
    // Initialize cURL session

    file_get_contents($url);
    
    // Execute cURL session and get the response
  
   
     
  } else {
    echo json_encode("number  Not Found");
  
  }
}

if(isset($_POST["otp"])){

    if ( $_SESSION["otp"]==$otp)
    {
      echo json_encode("otpmatch");
      $_SESSION["otpverified"] = "done";
    }
    else
    {
      echo json_encode("otpnotmatch");
    }

}



?>