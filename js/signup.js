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
        
        verifyEmail(Email);
        //looks through array to make sure all info has been filled in
        for (var i = 0; i < reqArray.length; i++) {
            if (reqArray[i] == "")  {
                //if there is a blank input then sets check to 1
                var check = 1;
            }
        }
            if (Pword != ConPow) {
                //if the passwords dont match set check to 2
                check = 2;
            }
            if (Pword.length < 6) {
                check = 3;
            }
        
        
        function verifyEmail(Email){
            var status = false;
            var emailregEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
            if (Email.search(emailregEx) == -1){
                check = 4;
            }
        }
        
        //if check is 1 the alert saying info missing
        if (check == 1){
            alert ("not all requierd info has been filled in");
            return false;
        }
        else if (check == 2){
            alert ("passwords do not match");
            return false;
        }
        else if (check == 3){
            alert( ("password must be a min of six characters long"))
            return false;
        }
        else if (check == 4){
            return false;
            alert ("Please enter a valid email address.");
        }
        else {
            return true;
        }
    }
   
})