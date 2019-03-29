window.addEventListener('load', function() {
    
    // getting the different buttons
         let editBut = document.getElementById("edit");
            let save = document.getElementById("save");
          let cancel = document.getElementById("cancel");
    let addFavourite = document.getElementById("addFavourite");
           let stock = document.getElementById("stock");
         let data = document.querySelectorAll(".dataInput");
       let inputs = document.querySelectorAll(".compInput");
    
    editBut.addEventListener("click", function(e) {
        //displaying or hidding the buttons    
       addFavourite.style.display = "none";
       stock.style.display = "none";
       editBut.style.display = "none";
       cancel.style.display = "inline";
       save.style.display = "inline";
        
        // hidding the regular company data by adding a hid css class 
        for(let d of data){
            d.classList.add("hid");
        }
        
        // showing the input fields by adding a show css class 
        for(let l of inputs){
            l.classList.add("show");
        }
    });
    
     cancel.addEventListener("click", function(e) {
        
        addFavourite.style.display = "inline";
       stock.style.display = "inline";
       editBut.style.display = "inline";
       cancel.style.display = "none";
       save.style.display = "none";
        
        // hidding the regular company data by adding a hid css class 
        for(let d of data){
            d.classList.remove("hid");
        }
        
        // showing the input fields by adding a show css class 
        for(let l of inputs){
            l.classList.remove("show");
        }
         
     });
    
    addFavourite.addEventListener("click", function(e){
     let sym = document.getElementById("sym").getAttribute("value");
    let name = document.getElementById("name").innerHTML;
    window.location = "favorites.php?sym=" + sym + "&name=" + name;
    });
    
});