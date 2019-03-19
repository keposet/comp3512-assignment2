let companyList = [];

window.addEventListener('load', function() {
    
    const companies = 'https://comp3512-assignment2-rdoel282.c9users.io/services/companies.php';
    
    fetch(companies)
    .then(response => response.json())
    .then(function (data) {
    companyList = data;
    companyListings(companyList);
    filterCompList();
    // localStorage.setItem("compData", JSON.stringify(companyList));
    
    console.log(companyList);

    })
    .catch(error => console.error(error));

// add code for the img pop over
let ul = document.querySelector("#companyList");


ul.addEventListener("mouseover", function(e){
    let el = e.target.className;
    let a = e.target.id;
    if(el == "img"){
        let x = e.clientX;
        let y = e.clientY;
        let div = e.target.nextSibling;
        let sym = e.target.getAttribute("value");
        let img = document.createElement("img");
        img.setAttribute("src", "logos/" + sym + ".svg");
        div.appendChild(img);
        img.style.height = "50px";
        div.style.top = y + "px";
        div.style.left = x + "px";
        div.style.display = "block";
        // could think about putting function here and passing div
        out(div, a);
        
    }
});

// function for leaving the div
function out(div, a){
let img = document.querySelector("#" + a);    
img.addEventListener("mouseleave", function(e){
    div.style.display = "none";
    while(div.firstChild){
    div.removeChild(div.firstChild);
    }
});
}
    
//function for creating the list of comapnies  
function companyListings(companyList){
        
    for (let i = 0; i < companyList.length; i++){
        let na = companyList[i]['symbol'];
        let compName = companyList[i]['name'];
        let uls = document.querySelector("#companyList");
        let nas = document.createTextNode(na);
        let name = document.createTextNode(compName);
        let span = document.createElement("span");
        let span2 = document.createElement("span");
        let a = document.createElement("a");
        let img = document.createElement("img");
        let li = document.createElement("li");
        let div =document.createElement("div");
        img.setAttribute("value", na);
        img.setAttribute("class", "img");
        img.setAttribute("id", na);
        img.setAttribute("src", "logos/" + na + ".svg");
        li.setAttribute("value", na);
        li.appendChild(img);
        li.appendChild(div);
        span.appendChild(nas);
        li.appendChild(span);
        span2.appendChild(name);
        li.appendChild(span2);
        a.setAttribute("href", "single-company.php?sym=" +na);
        a.appendChild(li);
        uls.appendChild(a);
    }
}

// filtering the comapny list
function filterCompList(){
    let nameArray = [];
    let compInfo = document.querySelectorAll("#companyList a");
    let filterBox = document.querySelector("#compFilter");
    let list = document.querySelector("#companyList");
    for(let i =0; i < compInfo.length; i++){
        nameArray.push(compInfo[i]);
    } 
    
    filterBox.addEventListener('keyup', function(e) {
        let inputVal = e.target.value;
        let matches = findMatches(inputVal, nameArray);
        // clear the existing elements 
        clear(list);
        for(let m of matches){
            list.appendChild(m);
        }
    });
}

// might need to put a nother array of just string elements 
function findMatches(wordToMatch, compInfo) {
     return compInfo.filter(obj => {
     const regex = new RegExp(wordToMatch, 'gi');
     return obj.textContent.match(regex);
     });
}

// function to clear exising data 
function clear(element){
    while(element.firstChild){
        element.firstChild.remove();
    }
}
    
});