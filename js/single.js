function loadCompanyData(qsSymbol){
             let companyList = [];
            let symbol = qsSymbol;
            
            window.addEventListener('load', function() {
            const companies = `./services/companies.php?sym=${symbol}`;
            
            
            fetch(companies)
            .then(response => response.json())
            .then(function (data) {
            companyList = data;
            singleComp(companyList);
            
            console.log(companyList);
        
            })
            .catch(error => console.error(error));
            
            // function for populating company information
            function singleComp(companyList){
            let varList = ["name", "sector", "subindustry", "address", "exchange", "website"];    
                
                for(let i = 0; i < companyList.length; i++){
                    for(let v = 0; v < varList.length; v++){
                        let compName = companyList[i][varList[v]];
                        let name = document.createTextNode(compName);
                        let selector = "#" + varList[v];
                        let inputSel = "#" + varList[v] + "Entry";
                        let input = document.querySelector(inputSel);
                        input.setAttribute("value", compName);
                        let comp = document.querySelector(selector);
                        comp.appendChild(name);
                    }
                }
 
            } 
                
            });
}

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