<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MUC Database Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" type="image/png" href="logo.png">
    <script src="./script.js"></script>
</head>
<body>
    <div style="margin: 3%; margin-top: 5%;">
        <!-- Page content here -->
         <?php
require "settings.php";
include "functions.php";

$user = $_POST["Uname"] ?? "";
$pass = $_POST["PW"] ?? "";
$servername = $_POST["Sname"] ?? "";
$dsn = "mysql:host=$servername;charset=utf8mb4";



try {
    
    $_SESSION["UID"] = bin2hex(random_bytes(32));
    $sessid = $_SESSION["UID"];
    ConfirmDB("", $user, $pass, $servername);
    encrypt("keys/encKCred_$sessid.txt", "data/encDCred_$sessid.txt", "$user:$pass:$servername"); // Encrypt credentials
    
    echo "<form id=\"autoForm\" action=\"selectDB.php\" method=\"post\">
        <input type=\"hidden\" name=\"data\" value=\"some_value\">
    </form>

    <script>
        document.getElementById(\"autoForm\").submit(); // Automatically submit form
    </script>";


    exit(); // Ensure the script stops after redirect
} catch (PDOException $e) {
    session_abort(); // End the session if an error occurs
    $error = "Connection failed: " . $e->getMessage() . "\n\nPlease check your credentials.";
    echo "aborted";

     echo "<form id=\"autoFormfail\" action=\"index.php\" method=\"get\">
        <input type=\"hidden\" name=\"message\" value=\"$error\">
    </form>

    <script>
        document.getElementById(\"autoFormfail\").submit(); // Automatically submit form
    </script>";
    exit();
}
?>
    </div>
</body>
</html>