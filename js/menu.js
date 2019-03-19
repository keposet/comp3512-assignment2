window.addEventListener('load', function() {
   let menuButton = document.querySelector("#menuBars");
   menuButton.addEventListener('click', function(e) {
    let nav = document.querySelector("#navLinks");
    let navLink = document.querySelectorAll("#navLinks li");
    let drop = document.querySelector("#dropdown-content");
    
      if(nav.getAttribute("value") == "open")
      {
        nav.setAttribute("value", "closed");
       drop.style.height = "0px";
       nav.style.display = "none";
       for(let n of navLink){
        n.style.display ="none"; 
      }
      }
      else{
        nav.setAttribute("value", "open");
       drop.style.height = "102px";
       nav.style.display = "block";
       for(let n of navLink){
        n.style.display ="block"; 
      }
     }
      
    //   alert("menu click");
    //   e.target.classList.toggle('hidden');
    //   e.target.
       


        
       
      window.addEventListener('resize', function() {
          nav.style.display = "inline";
        for(let n of navLink){
        n.style.display ="inline"; 
      }
      });
       
    //   
   });
    // let screen = document.width();
    // alert(screen);
    
});