window.addEventListener('load', function() {
   
   let menuButton = document.getElementById("menuBars");
   menuButton.addEventListener('click', function(e) {
    let nav = document.querySelector(".navLinks");
    let drop = document.getElementById("dropdown-content");
    nav.classList.toggle('hidden');
    drop.classList.toggle('hidden');

   });
   
});