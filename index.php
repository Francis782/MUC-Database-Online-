<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" class>

<head>
    <meta charset="UTF-8">
    <title>MUC Database Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" type="image/png" href="logo.png">
    <script src="./script.js"></script>
    <?php 
    require "settings.php";
    include "functions.php";
    ?>
</head>

<body>

    
    <div style="margin: 3%; margin-top: 5%;">
        <div class="app-icon" >

                    <div style="display: flex; justify-content: space-between; width: 100%;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width: 3%; height:3%;">
                            <path fill="currentColor" 
      transform="translate(0, -50%)"
      d="M448 80l0 48c0 44.2-100.3 80-224 80S0 172.2 0 128L0 80C0 35.8 100.3 0 224 0S448 35.8 448 80zM393.2 214.7c20.8-7.4 39.9-16.9 54.8-28.6L448 288c0 44.2-100.3 80-224 80S0 332.2 0 288L0 186.1c14.9 11.8 34 21.2 54.8 28.6C99.7 230.7 159.5 240 224 240s124.3-9.3 169.2-25.3zM0 346.1c14.9 11.8 34 21.2 54.8 28.6C99.7 390.7 159.5 400 224 400s124.3-9.3 169.2-25.3c20.8-7.4 39.9-16.9 54.8-28.6l0 85.9c0 44.2-100.3 80-224 80S0 476.2 0 432l0-85.9z" />
                        </svg>
                        <span style="font-size: 40px;">MUC DATABASE</span>

                        <div class="app-content" style="height: 0%;">
            <div class="app-content-header">
                <button class="mode-switch" title="Switch Theme">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>
            </div>
                    </div>
    </div>
                    </div>
        <p>Welcome to the MUC Database Project.<br><br>Please login to get started.</p>

        <br>
        <?php
        
        // Check if there is a message in the URL
        if (isset($_GET['message'])) {
            echo '<div style="color: red; font-size: 20px;">' . nl2br(htmlspecialchars($_GET["message"])) . '</div>';
        }

        if (isset($_GET['logout'])) {
            
            $sessid = $_GET['logout'];
           

    if (file_exists("keys/encKCred_$sessid.txt")) {
        unlink("keys/encKCred_$sessid.txt");
    }

    if (file_exists("data/encDCred_$sessid.txt")) {
        unlink("data/encDCred_$sessid.txt"); 
    }

    if (file_exists("ADB/ADB_$sessid.txt")) {
        unlink("ADB/ADB_$sessid.txt");
    }


    if (session_status() != PHP_SESSION_NONE) {
     session_unset(); // Unset all session variables
session_destroy(); // Destroy the session
setcookie(session_name(), '', time() - 3600, '/'); // Expire the session cookie
}
        }

        
   


        ?>
        <br>

        <h2 style="color: var(--text-color)">Required Credentials:</h2>
        
        <form action="login.php" style="color: var(--text-color)" method="post">
            <label for="Sname">Server IP/ Name:</label><br>
            <input type="text" id="Sname" name="Sname"><br>

            <br><br><br>

            <label for="Uname">Username:</label><br>
            <input type="text" id="Uname" name="Uname"><br>

            <br><br><br>

            <label for="PW">Password:</label><br>
            <input type="password" id="PW" name="PW"><br>

            <br><br><br>

            <input type="submit" value="Login" style="background-color: #2869ff; color: white; margin-right: 96%;">

        </form>



    </div>    
</body>

</html>