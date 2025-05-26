<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>MUC Database - Show Tables</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="./style.css">
  <link rel="icon" type="image/png" href="logo.png">
   <script>
        if (localStorage.getItem('theme') === 'light') {
      document.documentElement.classList.add('light');
      modeSwitch.classList.add('active');
  }
    </script>
  <?php 
    require "settings.php";
    include "functions.php";
    $sessid =  $_SESSION['UID'];;
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
        <li class="sidebar-list-item active">
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
          <img
            src="https://images.squarespace-cdn.com/content/56a7b5951c1210756e3465c1/1655480553206-INV05YTL10JGB2UJIMVR/SMU_Icon_for_favicon.png?format=1500w&amp;content-type=image%2Fpng"
            alt="Account">
        </div>
        <div class="account-info-name">Group 3-11</div>
      </div>
    </div>

    <div class="app-content">
      <div class="app-content-header">
        <h1 class="app-content-headerText">Tables</h1>
        <button class="mode-switch" title="Switch Theme">
          <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
          </svg>
        </button>
      </div>

      <div class="app-content-actions">

        <!-- Insert dynamic table info (selected table and count) here  -->
         <?php
         
           $sessid =  $_SESSION['UID'];;
           if(!file_exists("ADB/ADB_$sessid.txt")) {
                        echo "<h1 style='color:red;'><br>There are no databases selected.</h1>";
                        exit();
                    }
         ?>
        <?php
         $sessid =  $_SESSION['UID'];
        $credentials = explode(":", decrypt("keys/encKCred_$sessid.txt", "data/encDCred_$sessid.txt"));
        $pdo = GetPDO($credentials[0], $credentials[1], $credentials[2]);
        
        $tbls = RequestDB("show tables;", $credentials[0], $credentials[1], $credentials[2]);

        try {
          //code...
          $default = implode(" ", $tbls[0]) . "";
        } catch (Throwable $th) {
          
          echo "<h1 style='color:red;'><br>There are no tables in the selected database.</h1>";
          exit();

        }
        
        // Get selected table from GET parameter; default to 'parts'
        $selectedTable = isset($_GET['table']) ? $_GET['table'] : $default;
        //echo "<pre>Quantity param: " . htmlspecialchars($_GET['quantity'] ?? 'NOT SET') . "</pre>";
       
        $limitClause = '';
        if (isset($_GET['quantity'])) {
          $qty = $_GET['quantity'];
          if ($qty === '100') {
            $limitClause = " LIMIT 100";
          } elseif ($qty === '1000') {
            $limitClause = " LIMIT 1000";
          } elseif ($qty === 'all') {
            $limitClause = ""; // No limit
        
          }


        }


        $Where = " ";
      $cols = [];
      if($conditionAmmount = isset($_GET['count']) ? $_GET['count']: 0){
        
        for($i = 1; $i <= $conditionAmmount; $i++) {
          $Where .=  isset($_GET['col'.$i]) ? $_GET['col'.$i] : '';
          $cols[] = isset($_GET['col'.$i]) ? $_GET['col'.$i] : '';
        }

        $Where .= " ";
       
      }

      $Order = " ";
      if( isset($_GET['sortby']) && isset($_GET['order'])) {

        $Order .= "ORDER BY" . " " . $_GET['sortby'] . " " . $_GET['order'];

        $Order .= " ";
      }





        $query = "SELECT * FROM " . $selectedTable . $Where . $Order .$limitClause;
        //print($query);
        $results = [];

        try {
          $stmt = $pdo->query($query);
          $results = $stmt->fetchAll();
          $count = count($results);
        } catch (PDOException $e) {
          echo "<p class='message' style='text-align: center;'>Error retrieving data: " . htmlspecialchars($e->getMessage()) . "</p>";
          exit;
        }
        ?>
        <p class="dynamic-info" style="text-align: center; margin-top: 10px;">
          Selected table: <strong><?php echo htmlspecialchars($selectedTable); ?></strong> | Total Records:
          <strong><?php echo $count; ?></strong>
        </p>

       

        <div class="app-content-actions-wrapper">
        <div class="SelectTable-button-wrapper">
          <button class="action-button filter jsTableSelect" id="selectTable_button">
            <span>Select Table</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" id="selectTable" width="20" height="20" style= "margin-bottom: 6px">
          <path fill="currentColor" d="M448 80l0 48c0 44.2-100.3 80-224 80S0 172.2 0 128L0 80C0 35.8 100.3 0 224 0S448 35.8 448 80zM393.2 214.7c20.8-7.4 39.9-16.9 54.8-28.6L448 288c0 44.2-100.3 80-224 80S0 332.2 0 288L0 186.1c14.9 11.8 34 21.2 54.8 28.6C99.7 230.7 159.5 240 224 240s124.3-9.3 169.2-25.3zM0 346.1c14.9 11.8 34 21.2 54.8 28.6C99.7 390.7 159.5 400 224 400s124.3-9.3 169.2-25.3c20.8-7.4 39.9-16.9 54.8-28.6l0 85.9c0 44.2-100.3 80-224 80S0 476.2 0 432l0-85.9z"/>
            </svg>
          </button>
          
          <div class="SelectTable-menu">
          <label>Category</label>
          <select id="filter-category">
            <option value="">-- Select Category --</option>

            <?php
            foreach ($tbls as $tbl) {
              $tblName = implode(" ", $tbl) . "";
              echo "<option value=\"" . $tblName . "\" ";
                if (isset($_GET['table']) && $_GET['table'] == $tblName) echo 'selected';  
                echo "> " . $tblName . "</option>";
            }
            ?>
            
          </select>

          <label>Quantity</label>
          <select id="filter-quantity">
           <option value="100" <?php if (isset($_GET['quantity']) && $_GET['quantity'] == "100") ; ?>>100</option>
          <option value="1000" <?php if (isset($_GET['quantity']) && $_GET['quantity'] == "1000") ; ?>>1000</option>
          <option value="all" selected <?php if (!isset($_GET['quantity']) || $_GET['quantity'] == "all") ; ?>>1000+</option>
          </select>

            <div class="filter-menu-buttons">
              <button id="SelectTable-button-reset" class="SelectTable-button reset" style="background-color: var(--filter-reset);color: white;border-color: var(--filter-reset);">Reset</button>
              <button  id="SelectTable-button-apply" class="SelectTable-button apply" style="background-color: var(--action-color);color: white;border-color: var(--action-color);">Apply</button>
            </div>


          </div>
          
        </div>
        
        <div class="filter-button-wrapper">
          <button class="action-button filter jsFilter" id="filter_button">
            <span>Filter</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                 stroke-linejoin="round" class="feather feather-filter">
              <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
            </svg>
          </button>
        <div class="filter-menu">

              <?php 
              
                // Now you can use the $pdo object to query the database
                $q = $pdo->query("DESCRIBE " . $selectedTable);
                $res = $q->fetchAll();
                $count = 0;

                echo"<input id= \"ActiveTable\" type=\"hidden\" value=\"" . $selectedTable . "\">";
                echo"<input id= \"ActiveQuantity\" type=\"hidden\" value=\"" . $limitClause . "\">";

                if( isset($_GET['sortby']) && isset($_GET['order'])) {
                  echo"<input id= \"sortby\" type=\"hidden\" value=\"" . $_GET['sortby'] . "\">";
                  echo"<input id= \"order\" type=\"hidden\" value=\"" . $_GET['order'] . "\">";
                }

                foreach ($res as $row) {
                  //echo "Field: " . $row['Field'] . " | Type: " . $row['Type'] . "<br>";
                  echo "<div class=\"form-group\">";
                  echo "<label  for=\"label0\" >" ."<h3 class=\"input-label\">" . $row['Field']. ":" . "</h3>" . "</label>";
                  echo"<input class= \"names\" type=\"hidden\" value=\"" . $row['Field'] . "\">";
                  if (strpos($row['Type'], "int") !== false) {
                    $type = "int";
                    echo"<input class= \"Type\" type=\"hidden\" value=\"" . "int" . "\">";
                    echo '<select id="comparison" name="comparison" style="width:50px" class="comparison">';
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
                    echo"<input class= \"Type\" type=\"hidden\" value=\"" . "double" . "\">";
                    echo '<select id="comparison" name="comparison" style="width:50px" class="comparison">';
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
                    echo"<input class=\"Type\" type=\"hidden\" value=\"" . "varchar" . "\">";
                    echo '<select id="comparison" name="comparison" style="width:50px" class="comparison" >';
                    echo '<option value="" selected ></option>';
                    echo '<option value="=" >=</option>';
                    echo '<option value="!=" >!=</option>';
                    echo '</select>';
                  }
                  elseif (strpos($row['Type'], "date") !== false) {
                    $type = "date";
                    echo"<input class=\"Type\" type=\"hidden\" value=\"" . "date" . "\">";
                    echo '<select id="comparison" name="comparison" style="width:60px; gap:5px;" class="comparison">';
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
                    echo "<input class=\"label0\" style=\"margin-bottom: 10px;\"type=\"text\" placeholder=\"YYYY-MM-DD\">";
                  }
                  else {
                    echo "<input class=\"label0\" style=\"margin-bottom: 10px;\"type=\"text\" placeholder=\"Filter this Field (". $type . ")\">";
                  }
                  
                  //echo "<p>" . $row['Type'] . " ?</p>";
                  echo "</div>";

                  
                  
                  
                  $count += 1;
                  
                }

                echo"<input id = \"count\" type=\"hidden\" value=\"" . $count . "\">";

              
              
                
              ?>
                

                <div class="filter-menu-buttons">
                  <button class="filter-button reset">Reset</button>
                  <button class="filter-button apply">Apply</button>
                </div>
              </div>
          </div>

          <div class="SortBy-button-wrapper" style= "margin-right: 20px;"> 
          <button class="action-button SortBy jsSortBy" id="SortBy_button">
            <span>Sort By</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"></path>
            </svg>
          </button>
          

          <div class="SortBy-menu">

              <?php 
                
                // Now you can use the $pdo object to query the database
                $q = $pdo->query("DESCRIBE " . $selectedTable);
                $res = $q->fetchAll();
                $count = 1;

                foreach($cols as $exp) {
                  echo'<input class= "condition" type="hidden" value="' . $exp . '">';
                }

                $count = 1;

                echo"<input id= \"ActiveTable\" type=\"hidden\" value=\"" . $selectedTable . "\">";
                echo"<input id= \"ActiveQuantity\" type=\"hidden\" value=\"" . $limitClause . "\">";

                echo"<input id = \"conditionAmmount\" type=\"hidden\" value=\"" . $conditionAmmount . "\">";

                
                    
                echo "<div class=\"form-group2\">";


                  echo "<label  for=\"SortBy\" >" ."<h3 class=\"input-label2\">Sort By Attribute:</h3>" . "</label>";
                  echo '<select id="SortBy" name="SortBy"  gap:5px;" class="comparison">';
                foreach ($res as $row) {
                  if($count == 1) {
                    echo '<option  selected value="' . $row['Field'] . '" >' . $row['Field'] . '</option>';
                  }
                  else {
                    echo '<option value="' . $row['Field'] . '" >' . $row['Field'] . '</option>';
                  }
                  

                  
                  
                  $count += 1;
                  
                }


                

                echo '</select> <br>';


                echo "<label  for=\"SortBy\" >" ."<h3 class=\"input-label2\">Select Order:</h3>" . "</label>";
                echo '<select id="Order" name="Order"  gap:5px;" class="comparison">';
                echo '<option value="ASC" selected >Ascending</option>';
                echo '<option value="DESC"  >Descending </option>';
                echo '</select>';

                echo "</div>";

                echo"<input id = \"count\" type=\"hidden\" value=\"" . $count . "\">";

              
              
                
              ?>
                

                <div class="filter-menu-buttons">
                  <button class="SortBy-button reset">Reset</button>
                  <button class="SortBy-button apply">Apply</button>
                </div>
              </div>
            </div>


          <button class="action-button list active" title="List View">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-list">
              <line x1="8" y1="6" x2="21" y2="6"></line>
              <line x1="8" y1="12" x2="21" y2="12"></line>
              <line x1="8" y1="18" x2="21" y2="18"></line>
              <line x1="3" y1="6" x2="3.01" y2="6"></line>
              <line x1="3" y1="12" x2="3.01" y2="12"></line>
              <line x1="3" y1="18" x2="3.01" y2="18"></line>
            </svg>
          </button>
          <button class="action-button grid" title="Grid View">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-grid">
              <rect x="3" y="3" width="7" height="7"></rect>
              <rect x="14" y="3" width="7" height="7"></rect>
              <rect x="14" y="14" width="7" height="7"></rect>
              <rect x="3" y="14" width="7" height="7"></rect>
            </svg>
          </button>
        </div>
      </div>

      <div class="products-area-wrapper tableView">
        <!-- Dynamic Product Headers Display -->


        <div class="products-header">
        <?php
        // Dynamically fetch the column names for selected table
        $columns_query = $pdo->query("SHOW COLUMNS FROM " . $selectedTable);
        $columns = $columns_query->fetchAll(PDO::FETCH_COLUMN);
        $headercount = 1;

        // Loop through each column to generate headers
        foreach ($columns as $columnName): ?>
          <div class="product-cell">
            <?php 
            if(($headercount == 1) && (strpos($query, "ORDER BY") === false)) {
              echo htmlspecialchars(ucfirst($columnName));
              echo '<h9 class="SIT"><svg id = "' . $columnName . '" class="sorting_indicator.active" style="margin-left: 10px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"></path></svg> </h9>';
            }
            elseif (isset($_GET['actim']) && $_GET['actim'] == $columnName) {
              echo htmlspecialchars(ucfirst($columnName));
              echo '<h9 class="SIT"><svg id = "' . $columnName . '" class="sorting_indicator.active" style="margin-left: 10px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"></path></svg> </h9>';
            }
            else
            {
              echo htmlspecialchars(ucfirst($columnName));
              echo '<h9 class="SIT" ><svg id = "' . $columnName . '"   class="sorting_indicator" style="margin-left: 10px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"></path></svg> </h9>';
            } 
             
            
            $headercount += 1;
            ?>
          </div>
        <?php endforeach; ?>
        </div>

        <!-- Dynamic Product Rows Display -->
        <?php if (!empty($results)): ?>
          <?php foreach ($results as $row): ?>
            <div class="products-row">
              <?php foreach ($row as $col => $value): ?>
                <div class="product-cell">
                  <span class="cell-label"><?php echo ucfirst(htmlspecialchars($col)); ?>:</span>
                  <?php echo htmlspecialchars($value); ?>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p style="text-align: center;">No data found in the <?php echo htmlspecialchars($selectedTable); ?> table.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <!-- partial -->
  <script src="./script.js"></script>
</body>

</html>