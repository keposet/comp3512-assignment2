let pics = [];
window.addEventListener('load', function() {
    fetch("https://randomuser.me/api/")
    .then(response => response.json())
    .then(function (data) {
        pics = data['results'];
        console.log(pics);
        let pics2 = pics[0];
        let pics3 = pics2['picture']
        document.querySelector(".grid-container img").src = pics3["thumbnail"];
    })
    .catch(error => console.error(error));
});