let stockInfo = ['date','open','high','low','close','volume'];
let companyList = [];

window.addEventListener('load', function() {
    
    let sym = document.querySelector("#symbol").getAttribute("value");
    // alert(sym);
    
    const companyInfo = "https://api.iextrading.com/1.0/stock/" + sym +"/chart/1m";
    
    fetch(companyInfo)
    .then(response => response.json())
    .then(function (data) {
    companyList = data;
    setupMonthStockData(companyList);
    // companyListings(companyList);
    // localStorage.setItem("compData", JSON.stringify(companyList));
    
    console.log(companyList);

    })
    .catch(error => console.error(error));

});

// function setup month stock dat
function setupMonthStockData(array){

let table = document.getElementById("tableHeading");

    for(let i = 0; i < array.length; i++){
        let tr = document.createElement("tr");
        for (let c = 0; c < stockInfo.length; c++){
            let td = document.createElement("td");
            td.setAttribute("class", stockInfo[c]);
            let num = array[i][stockInfo[c]];
            // formatting for 2 decimal places 
            if(stockInfo[c] != "date" && stockInfo[c] != "volume"){
                num = num.toFixed(2);
            }
            if(stockInfo[c] == "volume"){
                num = num.toLocaleString();
            }
            
            let input = document.createTextNode(num);
            td.appendChild(input);
            tr.appendChild(td);
            tr.setAttribute("id", "row" +i);
        }

        table.appendChild(tr);
    }

    stockListner(array);
    // stockDataheadings();
}   

// function for the event listener for stock headings
function stockListner(array){
    let heading = document.querySelector("#stockHeadings");
    heading.addEventListener('click', function (e) {
    let id = e.target.getAttribute("id");
    
    // if(document.querySelector("#stockTable").hasChildNodes()){
    //     clear(document.querySelector("#stockTable"));
    // }
    
    if(document.querySelector("#tableHeading").hasChildNodes()){
        clear(document.querySelector("#tableHeading"));
    }
    
    // think about putting this in a case statment
    // if else ladder for month stock heading sorts 
     if(id == "dateHeading"){
        setupMonthStockData(array.sort(function(a, b){return a.date.split('-').join('') - b.date.split('-').join('')}));
        // stockListner(array);
     }
     else if(id == "openHeading"){
        setupMonthStockData(array.sort(function(a, b){return a.open - b.open}));
     }
     else if(id == "closeHeading"){
        setupMonthStockData(array.sort(function(a, b){return a.close - b.close}));
     }
     else if(id == "highHeading"){
         setupMonthStockData(array.sort(function(a, b){return a.high - b.high}));
     }
     else if(id == "lowHeading"){
         setupMonthStockData(array.sort(function(a, b){return a.low - b.low}));
     }
     else if(id == "volumeHeading"){
        setupMonthStockData(array.sort(function(a, b){return a.volume - b.volume}));
     }
     
    });

    
}

// function to clear exising data 
function clear(element){
    while(element.firstChild){
        element.firstChild.remove();
    }
}