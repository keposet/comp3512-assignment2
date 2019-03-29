let nums = [];
window.addEventListener('load', function() {
    fetch("https://randomuser.me/api/")
    .then(response => response.json())
    .then(function (data) {
        
    })
    .catch(error => console.error(error));
});