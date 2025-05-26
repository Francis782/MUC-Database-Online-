var hyperReference = "";


document.addEventListener('DOMContentLoaded', function () {


  var selectDB = document.querySelector(".jssubmit-db");
  if (selectDB) 
    {
    
      selectDB.addEventListener("click", function() {
        var selection = document.querySelector("#dbsel").value;
        //console.log("Selected DB: " + selection);
        var using = document.querySelector("#using");

        if (selection == "") {
            using.style.color = "red";
            using.innerHTML = "Please select a database!";
            return;
        }

        using.style.color = "yellow";
        using.innerHTML = "Using " + selection;
        hyperReference += "selectDB.php?&DB=" + encodeURIComponent(selection);
        updateHref();
        return;
        

      });
    }

});


function confirmAction(Question) {
    let userResponse = confirm(Question);
    
    return userResponse;
}




function updateHref() {
  window.location.href = hyperReference;
}


