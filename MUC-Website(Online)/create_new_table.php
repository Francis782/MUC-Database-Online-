<?php
    session_start();
?>

 <script>
        if (localStorage.getItem('theme') === 'light') {
      document.documentElement.classList.add('light');
      modeSwitch.classList.add('active');
  }
    </script>
<?php 
    require "settings.php";
    include "functions.php";
    

$message = '';
$results = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $start_year = trim($_POST['start_year'] ?? '');
    $end_year = trim($_POST['end_year'] ?? '');

    if (!is_numeric($start_year) || !is_numeric($end_year)) {
        $message = "Please enter valid years.";
    } elseif ($start_year > $end_year) {
        $message = "Start year must be less than or equal to end year.";
    } else {
        // Query: Calculate total spent on parts per year.
        $query = "SELECT YEAR(o.order_date) AS order_year, 
                         SUM(p.price * od.quantity) AS total_spent
                  FROM orders o
                  JOIN order_details od ON o.order_id = od.order_id
                  JOIN parts p ON od.part_id = p._id
                  WHERE YEAR(o.order_date) BETWEEN ? AND ?
                  GROUP BY order_year
                  ORDER BY order_year";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$start_year, $end_year]);
        $results = $stmt->fetchAll();
        if (!$results) {
            $message = "No data found for the selected years.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MUC Database - Create Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" type="image/png" href="logo.png">
   
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
        <li class="sidebar-list-item">
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
        <li class="sidebar-list-item active">
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
          <img
            src="https://images.squarespace-cdn.com/content/56a7b5951c1210756e3465c1/1655480553206-INV05YTL10JGB2UJIMVR/SMU_Icon_for_favicon.png?format=1500w&amp;content-type=image%2Fpng"
            alt="Account">
        </div>
        <div class="account-info-name">Group 3-11</div>
      </div>
    </div>

        <div class="app-content">
            <div class="app-content-header">
                <h1 class="app-content-headerText">Create/Delete Table:</h1>
                <button class="mode-switch" title="Switch Theme">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>
            </div>

            <?php
            $sessid = $_SESSION['UID'];
                     
                    if(!file_exists("ADB/ADB_$sessid.txt")) {
                        echo "<h1 style='color:red;'><br>There are no databases selected.</h1>";
                        exit();
                    }
                    ?>

            <body>
                <div class="page-info">
                    <div class="page-title">
                        <h1>Create/Delete Tables in "<?php  $sessid =  $_SESSION['UID']; echo file_get_contents("ADB/ADB_$sessid.txt");?>":</h1>
                    </div>

                    <br>
                    

                    <br><br>
                    

                    

                    <?php
                    if(isset($_POST['type1'])){
                        $numCols = $_POST['numCols'];
                        $creationQ = "CREATE TABLE " . $_POST['table_name'] . " (" . $_POST['PKname'] . " INT  PRIMARY KEY, ";
                        for ($i = 1; $i < $numCols; $i++) {
                            $creationQ .= $_POST['col_name_'.$i] . " " . $_POST['type'.$i] . ", ";
                        }
                        $creationQ = substr($creationQ, 0, -2) . ");";
                        
                        //echo $creationQ;
                         $sessid =  $_SESSION['UID'];

                        $credentials = explode(":", decrypt("keys/encKCred_$sessid.txt", "data/encDCred_$sessid.txt"));
                        $totalRec = count(RequestDB("show tables;", $credentials[0], $credentials[1], $credentials[2]));
                        RequestDB($creationQ, $credentials[0], $credentials[1], $credentials[2]);
                        if(count(RequestDB("show tables;", $credentials[0], $credentials[1], $credentials[2])) == $totalRec) {
                            echo "<h3 style=\"color: red;\">Failed To Add Table \"" . $_POST['table_name']. "\"</h3>";
                        }
                        else {
                            echo "<h3 style=\"color: green;\">Successfully Added Table \"" . $_POST['table_name']. "\"</h3>";
                        }
                        unset($_POST);
                    }
                    ?>


                    <form method="post" action="create_new_table.php" class="page-form">
                        <h3>Create New Tables:</h3>
                        <br>
                        <label>New Table Name: </label><input type="text" name="table_name" required placeholder="Enter table name" <?php if(isset($_POST['table_name'])){ echo 'disabled value ="'.$_POST['table_name'].'"';}  ?>> <br><br><br>


                        <label>Primary Key Name: </label><input type="text" name="PKname" required placeholder="Enter the name for the primary key." style="width: 20%;" <?php if(isset($_POST['PKname'])){ echo 'disabled value ="'.$_POST['PKname'].'"';}  ?>> <br><br><br>

                        <label>Number Of Table Columns: </label><input type="number" min="2" name="numCols" required <?php if(isset($_POST['numCols'])){ echo 'disabled value ="'.$_POST['numCols'].'"';}  ?> > <br><br><br>

                        

                        <?php
                        if(!isset($_POST['table_name'])) {
                            echo "<input type='submit' value='Confirm Base Table' >";
                        }
                        
                        ?>
                    </form>


                    <form method="post" action="create_new_table.php" class="page-form">

                        <?php
                        if(isset($_POST['table_name'])) {
                            $numCols = $_POST['numCols'] - 1;
                            echo "<input type='hidden' name='table_name' value='" . $_POST['table_name'] . "'>";
                            echo "<input type='hidden' name='PKname' value='" . $_POST['PKname'] . "'>";
                            echo "<input type='hidden' name='numCols' value='" . $_POST['numCols'] . "'>";
                            
                            for ($i = 1; $i <= $numCols; $i++) {
                                echo"<h3>Column ". ($i + 1) .":</h3> <br><br>";
                                echo "<label>Type:</label>";
                                echo "<select name='type$i' required>";
                                echo "<option value='INT'>INT</option>";
                                echo "<option value='VARCHAR(255)'>VARCHAR(255)</option>";
                                echo "<option value='DECIMAL(10,2)'>Decimal</option>";
                                echo "<option value='DATE'>DATE</option>";
                                echo "<option value='TEXT'>TEXT</option>";
                                echo "</select>";
                                echo "<label>Name: </label><input type='text' name='col_name_$i' required placeholder='Enter column name'> <br><br><br><br>";

                                
                                
                            }
                            echo "<input type='submit' name='create_table' value='Create Table' >";
                        }

                        //CREATE TABLE my_table (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100), age INT, email VARCHAR(100));

                        ?>
                    </form>


                    <br><br><br><br><br>




                    <h2>Delete A Table:</h2>


                    <?php
                     $sessid =  $_SESSION['UID'];
                    $credentials = explode(":", decrypt("keys/encKCred_$sessid.txt", "data/encDCred_$sessid.txt"));
                    if(isset($_POST['removeTable'])){
                        $dropQ = "Drop Table " .  $_POST['removeTable'];
                        $totalTab = count(RequestDB("show tables;", $credentials[0], $credentials[1], $credentials[2]));

                        RequestDB($dropQ, $credentials[0], $credentials[1], $credentials[2]);

                        if(count(RequestDB("show tables;", $credentials[0], $credentials[1], $credentials[2])) == $totalTab)
                        {
                            echo "<h2 style=\"color:red;\">There was an issue deleting ". $_POST['removeTable'] . "</h2>";

                        }
                        else {
                            echo "<h2 style=\"color:green;\"> Successfully Deleted " . $_POST['removeTable'] . "</h2>";
                        }

                    }
                    ?>

                    <!--- button start --->

                     <div class="filter-button-wrapper" style="overflow: hidden;">
          <button class="action-button filter jsFilter" id="Delete_Table_Button" style="margin-left: 6.75%;" >
            <span>Delete A Table </span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="3 4.5 5 4.5 21 4.5"></polyline> <!-- Moved up by a quarter -->
            <path d="M8 4.5V2.5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path> <!-- Moved up by a quarter -->
            <rect x="4" y="3" width="16" height="20" rx="2" ry="2"></rect>
            <line x1="10" y1="11" x2="10" y2="17"></line>
            <line x1="14" y1="11" x2="14" y2="17"></line>
            </svg>
          </button>

          <br>

          <script>
          function WarnDelTable() {
            let tableName = document.getElementById("remtable").value; // Get the selected table name
            if (!tableName) {
                alert("Please select a table before proceeding.");
                return false; // Stop submission if no table is selected
            }

            if (!confirm("WARNING!!!: THIS ACTION IS PERMANENT.\nTHERE EXISTS NO UNDO BUTTON FOR DELETING TABLE NAME: \"" + tableName + "\". \nARE YOU CERTAIN THAT YOU WISH TO PROCEED?")) {
                return false; // Stop submission if canceled
            }
            return true; // Allow submission if confirmed
        }


          </script>

          <div class="filter-menu" style="overflow: hidden; position: static;" >

          <form method="post" action="create_new_table.php" class="page-form" onsubmit="return WarnDelTable();">

              <h4>Select Table:</h4>
                        <select id="remtable" name="removeTable" required >
                            <option value="" hidden>-- Select Table --</option>

                            <?php
                             $sessid =  $_SESSION['UID'];
                            $credentials = explode(":", decrypt("keys/encKCred_$sessid.txt", "data/encDCred_$sessid.txt"));
                            $pdo = GetPDO($credentials[0], $credentials[1], $credentials[2]);
                            $tbls = RequestDB("show tables;", $credentials[0], $credentials[1], $credentials[2]);
                            foreach ($tbls as $tbl) {
                            $tblName = implode(" ", $tbl) . "";
                            echo "<option value=\"" . $tblName . "\" ";
                                if (isset($_POST['table']) && $_POST['table'] == $tblName) echo 'selected';  
                                echo "> " . $tblName . "</option>";
                            }
                            ?>
            
                        </select>
                
                        <br><br>
                <div class="filter-menu-buttons">
                    <input  type="submit" class="filter-button apply" style="background-color: red; color:white; margin: 0%;" value="Delete Table">
                </div>

                        </form>
            </div>
            </div>

                     <!--- button end --->
                    

                </div>
                <div class="products-area-wrapper tableView">
                
                    
                    
                        
                </div>


            

                <!-- partial -->
                <script src="./script.js"></script>
            </body>

</html>