/*let nums = [];
window.addEventListener('load', function() {
    fetch("https://randomuser.me/api/")
    .then(response => response.json())
    .then(function (data) {
        
    })
    .catch(error => console.error(error));
});*/
function update(amt, total, sym){
    let x = document.querySelector("#amt" + sym);
    let y = document.querySelector("#cp" + sym);
    let z = document.querySelector("#tv" + sym);
    x.innerHTML = Number(x.innerHTML) + amt;
    z.innerHTML = (Number(x.innerHTML) * y.innerHTML.substring(1, y.innerHTML.length)) + total;
    
}

window.addEventListener('load', function(){
    let full = 0;
    let w = document.querySelector("#tpv");
    let x = document.querySelectorAll(".tv");
    for(let i=0; i<x.length;i++){
        full += Number(x[i].innerHTML);
        x[i].innerHTML = "$" + Number(x[i].innerHTML).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    if (full>0){
    w.innerHTML = "Total Portfolio Value: $" + full.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    } else {
        w.innerHTML = "";
    }
})
