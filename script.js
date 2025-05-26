var hyperReference = "";

document.addEventListener('DOMContentLoaded', function () {
// Only attach filter event if the element exists
var selectTableBtn = document.querySelector(".jsTableSelect");
var filterBtn = document.querySelector(".jsFilter");
var sortByBtn = document.querySelector(".jsSortBy");
var selectTableMenu = document.querySelector(".SelectTable-menu");
var filterMenu = document.querySelector(".filter-menu");
var sortByMenu = document.querySelector(".SortBy-menu");
  

if (selectTableBtn) {
  selectTableBtn.addEventListener("click", function () {
    
    if (selectTableMenu) {
      if(selectTableMenu.classList.contains("active") == false)
      {
        selectTableMenu.classList.add("active");
        if(filterMenu) {
          filterMenu.classList.remove("active");
        }

        if(sortByMenu) {
          sortByMenu.classList.remove("active");
        }
      }
      else{
        selectTableMenu.classList.remove("active");
        if(filterMenu) {
          filterMenu.classList.remove("active");
        }

        if(sortByMenu) {
          sortByMenu.classList.remove("active");
        }
      }
    }
    
  });
}

  
if (filterBtn) {
  filterBtn.addEventListener("click", function () {

    if (filterMenu) {
      if(filterMenu.classList.contains("active") == false)
      {
        filterMenu.classList.add("active");
        if(selectTableMenu) {
          selectTableMenu.classList.remove("active");
        }
        if(sortByMenu) {
          sortByMenu.classList.remove("active");
        }
      }
      else {
        filterMenu.classList.remove("active");
        if(selectTableMenu) {
          selectTableMenu.classList.remove("active");
        }
        if(sortByMenu) {
          sortByMenu.classList.remove("active");
        }
      }
    }
    
  });
}

if(sortByBtn) {
  sortByBtn.addEventListener("click", function () {

    
    if (sortByMenu) {
      
      if(sortByMenu.classList.contains("active") == false)
      {
        
        sortByMenu.classList.add("active");
        if(selectTableMenu) {
          selectTableMenu.classList.remove("active");
        }
        if(filterMenu) {
          filterMenu.classList.remove("active");
        }
      }
      else {
        
        sortByMenu.classList.remove("active");
        if(selectTableMenu) {
          selectTableMenu.classList.remove("active");
        }
        if(filterMenu) {
          filterMenu.classList.remove("active");
        }
      }
    }
    
  });
}

document.addEventListener("click", function (event) {
  // Select buttons
  const selTableButton = document.querySelector("#selectTable_button");
  const filButton = document.querySelector("#filter_button");
  const stbyBtn = document.querySelector("#SortBy_button");

  // Select menus
  const selectTableMenu = document.querySelector(".SelectTable-menu");
  const filterMenu = document.querySelector(".filter-menu");
  const srtbyMenu = document.querySelector(".SortBy-menu");

  // Select descendants of the menus
  const inseltableform = document.querySelectorAll(".SelectTable-menu > *");
  const infilform = document.querySelectorAll(".filter-menu > *");
  const insrtbyform = document.querySelectorAll(".SortBy-menu > *");

  // Helper function: Check if the target is inside a NodeList
  const isClickInsideNodes = (nodes) => {
    return Array.from(nodes).some(node => node.contains(event.target));
  };

  try {
    if (
    !selTableButton.contains(event.target) && 
    !filButton.contains(event.target) && 
    !sortByBtn.contains(event.target)&&
    !selectTableMenu.contains(event.target) && 
    !filterMenu.contains(event.target) && 
    !srtbyMenu.contains(event.target) &&
    !isClickInsideNodes(inseltableform) && 
    !isClickInsideNodes(infilform) &&
    !isClickInsideNodes(insrtbyform)
  ) {
    if (selectTableMenu) {
      selectTableMenu.classList.remove("active");
    }
    if (filterMenu) {
      filterMenu.classList.remove("active");
    }

    if(sortByMenu) {
      sortByMenu.classList.remove("active");
    }
  }
  } catch (error) {
    
  }
  
});


  

  // Mode switch code (dark/light mode)
  var modeSwitch = document.querySelector('.mode-switch');
  

  // Check localStorage and apply theme without transition
  if (localStorage.getItem('theme') === 'light') {
      document.documentElement.classList.add('light');
      modeSwitch.classList.add('active');
  }
  
  // Function to toggle theme with smooth transition
  function toggleTheme() {
      document.documentElement.classList.add('theme-transition'); // Apply transition
  
      document.documentElement.classList.toggle('light');
      modeSwitch.classList.toggle('active');
    
  
      // Save the current theme state
      localStorage.setItem('theme', 
          document.documentElement.classList.contains('light') ? 'light' : 'dark'
      );
  
      // Remove transition class after the effect finishes (optional)
      setTimeout(() => {
          document.documentElement.classList.remove('theme-transition');
      }, 500); // Match transition duration in CSS
  }
  
  modeSwitch.addEventListener('click', toggleTheme);

  // List/Grid view toggle
  var gridBtn = document.querySelector(".grid");
  var listBtn = document.querySelector(".list");
  var productsArea = document.querySelector(".products-area-wrapper");

  if (gridBtn && listBtn && productsArea) {
    gridBtn.addEventListener("click", function () {
      listBtn.classList.remove("active");
      gridBtn.classList.add("active");
      productsArea.classList.add("gridView");
      productsArea.classList.remove("tableView");
    });
    listBtn.addEventListener("click", function () {
      listBtn.classList.add("active");
      gridBtn.classList.remove("active");
      productsArea.classList.remove("gridView");
      productsArea.classList.add("tableView");
    });
  }

  // Apply button for filter (if present)
  var applyBtn = document.querySelector(".SelectTable-button.apply");
  if (applyBtn) {
    applyBtn.addEventListener("click", function (e) {
      e.preventDefault();
      var selectedCategory = document.querySelector("#filter-category").value;
      var selectedQuantity = document.querySelector("#filter-quantity").value;
      if (selectedCategory) {
        hyperReference += "show_table.php?table=" + encodeURIComponent(selectedCategory) +
          "&quantity=" + encodeURIComponent(selectedQuantity);
          //console.log(hyperReference);
          updateHref();
      } else {
        alert("Please select a category.");
      }

      

    });
  }

  

});

var filapplyBtn = document.querySelector(".filter-button.apply");
  if (filapplyBtn) {
    filapplyBtn.addEventListener("click", function() {

      //var count = document.querySelectorAll("#count").value;
      var count = document.querySelector("#count").value;
      var ActiveTable = document.querySelector("#ActiveTable").value;
      var ActiveQuantity = document.querySelector("#ActiveQuantity").value;
      var sortByElement = document.querySelector("#sortby");
      var ordElement = document.querySelector("#order");

      var sortBy = sortByElement ? sortByElement.value : null; // Check if element exists before accessing value
      var ord = ordElement ? ordElement.value : null;

      hyperReference += "show_table.php?table=" + encodeURIComponent(ActiveTable) +
          "&quantity=" + encodeURIComponent(ActiveQuantity);

      // Select all elements with the class "label0"
      var inputs = document.querySelectorAll(".label0");

      var types = document.querySelectorAll(".Type");

      var compare = document.querySelectorAll(".comparison");
      var name = document.querySelectorAll(".names");

      // Create an array to store the values
      var values = [];

      var valueType = [];

      var comparisons = [];

      var names = [];

      
      

      // Loop through each element and get its value
      inputs.forEach(input => {
        values.push(input.value); 
      

      });

      types.forEach(type => {
        valueType.push(type.value); 

      });

    compare.forEach(comp => {
        comparisons.push(comp.value); 

    });

    name.forEach(namee => {
      names.push(namee.value); 

  });

  var numAdded = 0;

    for (let i = 0; i < count; i++) {

      var input= values[i];
      var type = valueType[i];
      var comparison = comparisons[i];
      var name = names[i];

      

      if(!input.length) {
        //hyperReference += "&col" + (i+1) + "=" + "null"
        continue;
      }
      else if(isValid(input, type)) {

        if(!comparison.length){
          alert("Error, the comparison for (" + name + ": " + "\"" + input + "\"" + ") cannot be left null.")
          return;
        }
         
        if((numAdded+1) == 1) {
          if(type == "varchar" || type == "date"){
            var req ="WHERE " + name + " " + comparison + " \'" + input + "\'";
            hyperReference += "&col" + (i+1) + "=" + encodeURIComponent(req);
            numAdded += 1;
          }
          else {
            var req ="WHERE " + name + " " + comparison + " " + input;
            hyperReference += "&col" + (i+1) + "=" + encodeURIComponent(req);
            numAdded += 1;
          }
          
        }
        else {
          if(type == "varchar" || type == "date")
            {
              var req = " AND " + name + " " + comparison + " \'" + input + "\'";
              hyperReference += "&col" + (i+1) + "=" + encodeURIComponent(req);
              numAdded += 1;
            }
            else {
              var req = " AND " + name + " " + comparison + " " + input;
              hyperReference += "&col" + (i+1) + "=" + encodeURIComponent(req);
              numAdded += 1;
            }
        }
        
      }
      else {
        alert("Error, (" + name + ": " + "\"" + input + "\"" + ") is not a valid input for type " + type + ".");
        break;
      }

    }

     hyperReference += "&count=" + encodeURIComponent(count);

     if((sortBy != null) && (ord != null)) {
      hyperReference += "&sortby=" + encodeURIComponent(sortBy) + "&order=" + encodeURIComponent(ord) + "&actim=" + encodeURIComponent(sortBy);
     }

     

    updateHref();




      console.log(values);
      console.log(count);
      console.log(valueType);
      console.log(comparisons);
      console.log(names);



      /*if (selectedCategory) {
        window.location.href = "show_table.php?table=" + encodeURIComponent(selectedCategory) +
          "&quantity=" + encodeURIComponent(selectedQuantity);
      } else {
        alert("Please select a category.");
      }*/


    });
  }


// Reset button for filter (clears selection and reloads default view)
var resetBtn = document.querySelector(".SelectTable-button.reset");
if (resetBtn) {
  resetBtn.addEventListener("click", function (e) {
    e.preventDefault();

    // Clear dropdowns
    document.querySelector("#filter-category").selectedIndex = 0;
    document.querySelector("#filter-quantity").selectedIndex = 0;

    // Reload page with no filters
    hyperReference = "show_table.php";
    updateHref();
  });
}

var filResetBtn = document.querySelector(".filter-button.reset");
if (filResetBtn) {
  filResetBtn.addEventListener("click", function (e) {
    e.preventDefault();


    // Reload page with no filters
    hyperReference = "show_table.php";
    updateHref();
  });
}

var srtByResetBtn = document.querySelector(".SortBy-button.reset");
if (srtByResetBtn) {
  srtByResetBtn.addEventListener("click", function (e) {
    e.preventDefault();


    // Reload page with no filters
    hyperReference = "show_table.php";
    updateHref();
  });
}

var srtByApplyBtn = document.querySelector(".SortBy-button.apply");
if (srtByApplyBtn) {
  srtByApplyBtn.addEventListener("click", function() {

    var conditionAmmount = document.querySelector("#conditionAmmount").value;
    var ActiveTable = document.querySelector("#ActiveTable").value;
    var ActiveQuantity = document.querySelector("#ActiveQuantity").value;
    var sortBy = document.querySelector("#SortBy").value;
    var order = document.querySelector("#Order").value;
    var conditions = document.querySelectorAll(".condition");
  
    hyperReference += "show_table.php?table=" + encodeURIComponent(ActiveTable) + "&quantity=" + encodeURIComponent(ActiveQuantity);
  
    var i = 1;
  
    conditions.forEach(condition => {
      var cond = "&col" + i + "=" + encodeURIComponent(condition.value);
      hyperReference += cond;
      i += 1;
    });
  
  
    hyperReference += "&sortby=" + encodeURIComponent(sortBy) + "&order=" + encodeURIComponent(order);
  
    hyperReference += "&count=" + encodeURIComponent(conditionAmmount);


    hyperReference += "&actim=" + encodeURIComponent(sortBy);

  
    updateHref()
    
  
  
  }
  );

  
}





function isValid(input,  type)
{
  if(type == "varchar") {
    return true;
  }
  else if (type == "int") {
    return isInteger(input);
  }
  else if(type == "double") {
    return isDouble(input);
  }
  else if(type == "date") {
    return isSQLDate(input); 
  }
}

function isInteger(str) {
  return /^\d+$/.test(str); 
}

function isDouble(str) {
  return /^\d+(\.\d+)?$/.test(str); 
}

function isSQLDate(str) {
  // Regex to match the format YYYY-MM-DD
  return /^\d{4}-\d{2}-\d{2}$/.test(str);
}

function confirmAction(Question) {
    let userResponse = confirm(Question);
    
    return userResponse;
}




function updateHref() {
  window.location.href = hyperReference;
}


