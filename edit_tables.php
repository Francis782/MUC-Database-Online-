<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MUC Database - Edit Tables</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="./style.css">
    <script>
        if (localStorage.getItem('theme') === 'light') {
      document.documentElement.classList.add('light');
      modeSwitch.classList.add('active');
  }
    </script>
    <link rel="icon" type="image/png" href="logo.png">
    <?php 
    require "settings.php";
    include "functions.php";
    $sessid =  $_SESSION['UID'];
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
                <li class="sidebar-list-item active">
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
                    <img src="https://images.squarespace-cdn.com/content/56a7b5951c1210756e3465c1/1655480553206-INV05YTL10JGB2UJIMVR/SMU_Icon_for_favicon.png?format=1500w&amp;content-type=image%2Fpng"
                        alt="Account">
                </div>
                <div class="account-info-name">Group 3-11</div>
            </div>
        </div>

        <div class="app-content">
            <div class="app-content-header">
                <h1 class="app-content-headerText">Edit Tables:</h1>
                <button class="mode-switch" title="Switch Theme">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>
            </div>

            <head>
                <meta charset="UTF-8">
                <title>Edit Tables:</title>
                <link rel="stylesheet" type="text/css" href="css/style.css">
            </head>

            <body >
                <div class="page-info">
                    <div class = "page-title">
                        <h1>Insert and Delete from Table:</h1>
                    </div>

                    
                    <?php
                    
                         $sessid =  $_SESSION['UID'];
                          if(!file_exists("ADB/ADB_$sessid.txt")) {
                        echo "<h1 style='color:red;'><br>There are no databases selected.</h1>";
                        exit();
                    }
                    ?>

            
                <form method="post" action="edit_tables.php" class = "page-form" id="1">
                       <label>Select Table:</label>
                        <select id="table" name="table" required>
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
                
                <input type="submit" value="Use Table">
                </form>

                <br><br><br><br>


                <?php 
                 $sessid =  $_SESSION['UID'];
                    $credentials = explode(":", decrypt("keys/encKCred_$sessid.txt", "data/encDCred_$sessid.txt"));
                    $pdo = GetPDO($credentials[0], $credentials[1], $credentials[2]);
                    if(isset($_POST['table']) && isset($_POST['insert0'])) {
                         
                        $selectedTable = $_POST['table'];
                        $ins = 0;
                        $insertQ = "INSERT INTO " . $selectedTable . " (";

                         $q = $pdo->query("DESCRIBE " . $selectedTable);
                    $res = $q->fetchAll();
                    $count = 0;

                    echo"<input id= \"ActiveTable\" type=\"hidden\" value=\"" . $selectedTable . "\">";
                    


                        foreach ($res as $row) {
                            $insertQ .= $row['Field'] . ", ";
                        }
                        $insertQ = substr($insertQ, 0, -2);
                        $insertQ .= ") VALUES (";

                        
                        while (true) {
                            if (isset($_POST['insert' . $ins])) {
                                $insertQ .= "'". $_POST['insert' . $ins] . "', ";
                                $ins += 1;
                            }
                            else {
                                
                                break;
                            }
                        }
                        
                        $insertQ = substr($insertQ, 0, -2);
                        $insertQ .= ");";

                        $totRec = RequestDB("Select * From " . $selectedTable, $credentials[0], $credentials[1], $credentials[2]);
                        

                        try {
                            $result = requestDB($insertQ, $credentials[0], $credentials[1], $credentials[2]);

                            if(RequestDB("Select * From " . $selectedTable, $credentials[0], $credentials[1], $credentials[2]) == $totRec)
                            {
                                 echo "<h3 style=\"color: red;\">There Was An Error Inserting.</h3>";
                            }
                            else {
                                 echo "<h3 style=\"color: yellow;\">Inserted Successfully!</h3>";
                            }

                            
                        } catch (PDOException $e) {
                            echo "<h3style=\"color: red;\">Error: " . $e->getMessage() . "</h3>";
                        }

            


                    }
                    ?>

                    
                <form method="post" action="edit_tables.php" class = "page-form" id="2">
                    
                <?php 
                 if (isset($_POST['table']) ) {
                    $selectedTable = $_POST['table'];
                    echo "<h3>Insert into ". $selectedTable . ":</h3>";
                    
                    // Now you can use the $pdo object to query the database
                    $q = $pdo->query("DESCRIBE " . $selectedTable);
                    $res = $q->fetchAll();
                    $count = 0;

                    echo"<input id= \"ActiveTable\" type=\"hidden\" value=\"" . $selectedTable . "\">";
                    

                    foreach ($res as $row) {
                    //echo "Field: " . $row['Field'] . " | Type: " . $row['Type'] . "<br>";
                    echo "<div class=\"form-group\">";
                    echo "<label  for=\"label0\" >" ."<h3 class=\"input-label\">" . $row['Field']. ":" . "</h3>" . "</label>";
                    echo"<input class= \"names\"   type=\"hidden\" value=\"" . $row['Field'] . "\">";
                    if (strpos($row['Type'], "int") !== false) {
                        $type = "int";
                      
                    }
                    elseif (strpos($row['Type'], "double") !== false || strpos($row['Type'], "float") !== false || strpos($row['Type'], "decimal") !== false || strpos($row['Type'], "numeric") !== false || strpos($row['Type'], "real") !== false) {
                        $type = "double";
                        
                    }
                    elseif (strpos($row['Type'], "char") !== false || strpos($row['Type'], "varchar") !== false || strpos($row['Type'], "text") !== false || strpos($row['Type'], "blob") !== false) {
                        $type = "varchar";
                        
                    }
                    elseif (strpos($row['Type'], "date") !== false) {
                        $type = "date";
                        
                    }
                    if($type == "date"){
                        echo "<input class=\"label0\" required name=\"insert". $count . "\" style=\"margin-bottom: 10px;\"type=\"text\" placeholder=\"YYYY-MM-DD\">";
                    }
                    else {
                        echo "<input class=\"label0\" required name=\"insert". $count . "\" style=\"margin-bottom: 10px;\"type=\"text\" placeholder=\"Filter this Field (". $type . ")\">";
                    }
                    
                    //echo "<p>" . $row['Type'] . " ?</p>";
                    echo "</div>";

                    
                    
                    
                    $count += 1;
                    
                    }

                    echo"<input id = \"count\" type=\"hidden\" value=\"" . $count . "\">";

                    if ($selectedTable != null) {
                        echo "<input type=\"hidden\" name=\"table\" value=\"" . $selectedTable . "\">";
                    }
                
                    echo "<input type=\"submit\" value=\"Insert\"><br><br><br><br><br><br>";
                
                }
                    
                ?>

                </form>

            
                    
                
                <form method="post" action="edit_tables.php" class = "page-form" id="3">
                    
                <?php 
                 if (isset($_POST['table']) && isset($_POST['delete0'])) {
                    $selectedTable = $_POST['table'];
                    

                     
                    //  column_name = 'some_value';

                         
                        $selectedTable = $_POST['table'];
                        $del = 0;
                        $deleteQ = "DELETE FROM " . $selectedTable . " WHERE ";

                         
                    $count = 0;

                    echo"<input id= \"ActiveTable\" type=\"hidden\" value=\"" . $selectedTable . "\">";
                    
                        $totalCols = count(RequestDB("Describe ". $selectedTable, $credentials[0], $credentials[1], $credentials[2]));
                        
                        for ($i=0; $i < $totalCols; $i++) {
                            if (isset($_POST['delete' . $del]) && $_POST['delete' . $del] != "") {
                                $deleteQ .=$_POST['name' . $del] . $_POST['comp'.$del] ."\"" .$_POST['delete' . $del] . "\"" . " AND ";
                                
                            }
                            $del += 1;
                        }
                        
                        $deleteQ = substr($deleteQ, 0, -4);
                        
                        $deleteQ .= ";";

                        //echo $deleteQ;
                        
                        $totRec = count(RequestDB("Select * From ". $selectedTable, $credentials[0], $credentials[1], $credentials[2]));

                        
                        try {
                            $result = requestDB($deleteQ, $credentials[0], $credentials[1], $credentials[2]);

                            if( count(RequestDB("Select * From ". $selectedTable, $credentials[0], $credentials[1], $credentials[2])) == $totRec) {
                                echo "<h3 style=\"color: red;\">No Match Found For Deletion!</h3>";
                            }
                            else {
                                echo "<h3 style=\"color: yellow;\">Deleted Successfully!</h3>";
                            }                       
                            
                        } catch (PDOException $e) {
                            echo "<h3>Error: " . $e->getMessage() . "</h3>";
                        }

                    
                        

                    }
                    ?>
                    

            
                <form method="post" action="edit_tables.php" class = "page-form" id="1">
                      
                            
                    <?php

                    if(isset($_POST['table'])) {
                    $count = 0;
                    $selectedTable = $_POST['table'];

                    $res = RequestDB("Describe ".$selectedTable , $credentials[0], $credentials[1], $credentials[2]);

                    echo "<h3>Delete From ". $selectedTable . ":</h3>";


                    foreach ($res as $row) {
                    //echo "Field: " . $row['Field'] . " | Type: " . $row['Type'] . "<br>";
                    echo "<div class=\"form-group\">";
                    echo "<label  for=\"label0\" >" ."<h3 class=\"input-label\">" . $row['Field']. ":" . "</h3>" . "</label>";
                    echo"<input class= \"names\"   type=\"hidden\" name=\"name" . $count . "\" value=\"" . $row['Field'] . "\">";
                    if (strpos($row['Type'], "int") !== false) {
                        $type = "int";
                        echo '<select id="comparison" name="comp'. $count.'" style="width:50px" class="comparison">';
                        echo '<option value="" selected ></option>';
                        echo '<option value="=" >=</option>';
                        echo '<option value="!=" >!=</option>';
                        echo '<option value=">">></option>';
                        echo '<option value="<"><</option>';
                        echo '<option value=">=">>=</option>';
                        echo '<option value="<="><=</option>';
                        echo '</select>';
                      
                    }
                    elseif (strpos($row['Type'], "double") !== false || strpos($row['Type'], "float") !== false || strpos($row['Type'], "decimal") !== false || strpos($row['Type'], "numeric") !== false || strpos($row['Type'], "real") !== false) {
                        $type = "double";
                        echo '<select id="comparison" name="comp'. $count.'" style="width:50px" class="comparison">';
                        echo '<option value="" selected ></option>';
                        echo '<option value="=" >=</option>';
                        echo '<option value="!=" >!=</option>';
                        echo '<option value=">">></option>';
                        echo '<option value="<"><</option>';
                        echo '<option value=">=">>=</option>';
                        echo '<option value="<="><=</option>';
                        echo '</select>';
                        
                    }
                    elseif (strpos($row['Type'], "char") !== false || strpos($row['Type'], "varchar") !== false || strpos($row['Type'], "text") !== false || strpos($row['Type'], "blob") !== false) {
                        $type = "varchar";
                        echo '<select id="comparison" name="comp'. $count.'" style="width:50px" class="comparison" >';
                        echo '<option value="" selected ></option>';
                        echo '<option value="=" >=</option>';
                        echo '<option value="!=" >!=</option>';
                        echo '</select>';
                        
                    }
                    elseif (strpos($row['Type'], "date") !== false) {
                        $type = "date";
                        echo '<select id="comparison" name="comp'. $count.'" style="width:60px; gap:5px;" class="comparison">';
                        echo '<option value="" selected ></option>';
                        echo '<option value="=" >Occurs On</option>';
                        echo '<option value="!=" >Does Not Occur On</option>';
                        echo '<option value=">">Later Than</option>';
                        echo '<option value="<">Earlier Than</option>';
                        echo '<option value=">=">Later Than or Occurs On</option>';
                        echo '<option value="<=">Earlier Than or Occurs On</option>';
                        echo '</select>';
                        
                    }
                    if($type == "date"){
                        echo "<input class=\"label0\"  name=\"delete". $count . "\" style=\"margin-bottom: 10px;\"type=\"text\" placeholder=\"YYYY-MM-DD\">";
                    }
                    else {
                        echo "<input class=\"label0\"  name=\"delete". $count . "\" style=\"margin-bottom: 10px;\"type=\"text\" placeholder=\"Filter this Field (". $type . ")\">";
                    }
                    
                    //echo "<p>" . $row['Type'] . " ?</p>";
                    echo "</div>";

                    
                    
                    
                    $count += 1;
                    
                    }

                    echo"<input id = \"count\" type=\"hidden\" value=\"" . $count . "\">";

                    if ($selectedTable != null) {
                        echo "<input type=\"hidden\" name=\"table\" value=\"" . $selectedTable . "\">";
                    }
                
                    echo "<input type=\"submit\" value=\"Delete\"><br><br><br><br><br><br>";
                }
                
                    
                    
                ?>

            
                    
            </form>


            </div>
            </body>
</html>

<!-- partial -->
<script src="./script.js"></script>
</body>

</html>
