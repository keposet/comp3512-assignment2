function errorWindow(){
// window.addEventListener('load', function(){
//     let parent = document.getElementById('errorLbl');
//     console.log(parent);
//     let errMsg = "This password already exists, please use another";
//     parent.textContent += errMsg;
// })
    alert("This Email already exists, please use another");
}


window.addEventListener('load', function() {
    let subbut = document.querySelector("#signup");
    subbut.addEventListener("click", function(e) {
        validateForm();
    });
    
    let vispas = document.querySelector("#showPass");
    vispas.addEventListener("click", function(e) {
        var ps = document.getElementById("Pword");
        var conPs = document.getElementById("ConPow");
        if (ps.type === "password") {
            ps.type = "text";
            conPs.type = "text";
        }
        else {
            ps.type = "password";
            conPs.type = "password";
        }
    });
    
    //checks all the input in the form
    function validateForm(){
        
        //gets the input from the forms
        var Fname = document.forms["signup"]["FName"].value;
        var Lname = document.forms["signup"]["LName"].value;
        var City = document.forms["signup"]["City"].value;
        var Country = document.forms["signup"]["Country"].value;
        var Email = document.forms["signup"]["Email"].value;
        var Pword = document.forms["signup"]["Pword"].value;
        var ConPow = document.forms["signup"]["ConPow"].value;
        
        //puts the input into an array
        var reqArray = [Fname, Lname, City, Country, Email, Pword, ConPow];
        
        //looks through array to make sure all info has been filled in
        for (var i = 0; i < reqArray.length; i++) {
            if (reqArray[i] == "")  {
                //if there is a blank input then sets check to 1
                var check = 1;
            }
            else if (Pword != ConPow) {
                //if the passwords dont match set check to 2
                check = 2;
            }
        }
        
        //if check is 1 the alert saying info missing
        if (check == 1){
            alert ("not all requierd info has been filled in");    
        }
        else if (check == 2){
            alert ("passwords do not match");
        }
    }


})