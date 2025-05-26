<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" class>

<head>
    <meta charset="UTF-8">
    <title>MUC Database - Select DB</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" type="image/png" href="logo.png">
    <script src="./script.js"></script>
    <script src="./home.js"></script>
     <script>
        if (localStorage.getItem('theme') === 'light') {
      document.documentElement.classList.add('light');
      modeSwitch.classList.add('active');
  }
    </script>
    <?php 
    require "settings.php";
    include "functions.php";
    ?>

    <?php

     $sessid = $_SESSION["UID"];
                if(isset($_GET['DB'])) {
                    $file = "ADB/ADB_$sessid.txt";
                    file_put_contents($file, $_GET['DB']);
                    header("Location: " . $_SERVER['PHP_SELF']);



                }
                ?>
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="app-container">
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="app-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor"
                            d="M448 80l0 48c0 44.2-100.3 80-224 80S0 172.2 0 128L0 80C0 35.8 100.3 0 224 0S448 35.8 448 80zM393.2 214.7c20.8-7.4 39.9-16.9 54.8-28.6L448 288c0 44.2-100.3 80-224 80S0 332.2 0 288L0 186.1c14.9 11.8 34 21.2 54.8 28.6C99.7 230.7 159.5 240 224 240s124.3-9.3 169.2-25.3zM0 346.1c14.9 11.8 34 21.2 54.8 28.6C99.7 390.7 159.5 400 224 400s124.3-9.3 169.2-25.3c20.8-7.4 39.9-16.9 54.8-28.6l0 85.9c0 44.2-100.3 80-224 80S0 476.2 0 432l0-85.9z" />
                    </svg>
                    <span>MUC DATABASE</span>
                </div>
            </div>
            <ul class="sidebar-list">
                <li class="sidebar-list-item active">
                    <a href="selectDB.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-inbox">
                            <polyline points="22 12 16 12 14 15 10 15 8 12 2 12" />
                            <path
                                d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z" />
                        </svg>
                        <span>Select Database</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="show_table.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-shopping-bag">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                            <line x1="3" y1="6" x2="21" y2="6" />
                            <path d="M16 10a4 4 0 0 1-8 0" />
                        </svg>
                        <span>Show Tables</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="edit_tables.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-shopping-bag">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                            <line x1="3" y1="6" x2="21" y2="6" />
                            <path d="M16 10a4 4 0 0 1-8 0" />
                        </svg>
                        <span>Edit Tables</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="create_new_table.php">
                       <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-shopping-bag">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                            <line x1="3" y1="6" x2="21" y2="6" />
                            <path d="M16 10a4 4 0 0 1-8 0" />
                        </svg>
                        <span>Create/Delete Table</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="create_new_DB.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-inbox">
                            <polyline points="22 12 16 12 14 15 10 15 8 12 2 12" />
                            <path
                                d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z" />
                        </svg>
                        <span>Create/Delete Database</span>
                    </a>
                </li>

                <li class="sidebar-list-item" style="background-color: red;">
                    <a href="<?php echo 'index.php?logout=' . $_SESSION['UID']; ?>">
                        <span>Log Out</span>
                    </a>
                </li>

            </ul>
            <div class="account-info">
                <div class="account-info-picture">
                    <img src="https://images.squarespace-cdn.com/content/56a7b5951c1210756e3465c1/1655480553206-INV05YTL10JGB2UJIMVR/SMU_Icon_for_favicon.png?format=1500w&content-type=image%2Fpng"
                        alt="Account">
                </div>
                <div class="account-info-name">Group 3-11</div>
        </div>
        </div>
        <div class="app-content">
            <div class="app-content-header">
                <h1 class="app-content-headerText">Select Database:</h1>
                <button class="mode-switch" title="Switch Theme">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                        <defs></defs>
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>
            </div>


            <?php 
             $sessid = $_SESSION["UID"] ?? null;
                if(isset($_POST['DB'])){
                    if (file_exists("ADB/ADB_$sessid.txt")) { // Check if file exists
                        unlink("ADB/ADB_$sessid.txt");
                    }

                    file_put_contents("ADB/ADB_$sessid.txt", $_POST['DB']); // Write the selected database to the file



                }
                
            ?>
              
            
            
            <div class="mainPage">
                


                <h2 class ="app-content-headerText">Please Select Database:  
                    
                    <?php
                     $sessid = $_SESSION["UID"] ?? null;
                    if (file_exists("ADB/ADB_$sessid.txt")) { // Check if file exists
                        $file = "ADB/ADB_$sessid.txt";
                        $dbName = file_get_contents($file); // Read the contents of the file
                        echo "<span style=\"color: green;\">Using Database: $dbName</span>";
                    } else {
                        echo "<span style=\"color: red;\">No Database Selected</span>";
                    }
                    ?>


            

                </h2>

                <br><br><br>

                

            <form action="selectDB.php" method="post">
                
            <label class ="app-content-headerText" >Databases:</label>
            <select id ="dbsel" required name="DB">
            <option value="" selected hidden >-- Select Database --</option>

            <?php
                $sessid = $_SESSION["UID"] ?? null;
                $credentials = explode(":", decrypt("keys/encKCred_$sessid.txt", "data/encDCred_$sessid.txt")); //decrypt credentials

                $dbs = ConfirmDB("show databases;", $credentials[0], $credentials[1], $credentials[2]);

                foreach ($dbs as $db) {
                    $dbName = implode(" ", $db) . "";
                    echo "<option value=\"" .$dbName . "\">". $dbName ."</option><br><br><br><br><br><br>";
                }

                ?>

           
            </select>

            <br><br><br>
            <input type="submit" style="background-color: #2869ff; color: white; border: 2px solid #2869ff; "  value="Choose Database">
                
            </form>

                

                

               
            </div>
        </div>
    </div>

  
    <!-- partial -->
    

</body>

</html>