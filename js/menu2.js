window.addEventListener('load', function() {
   let menuButton = document.querySelector("#menuBars");
   menuButton.addEventListener('click', function(e) {
    let nav = document.querySelector(".navLinks");
    let drop = document.querySelector("#dropdown-content");
    nav.classList.toggle('hidden');
    drop.classList.toggle('hidden');
    // drop.style.height = "102px";
   });
});