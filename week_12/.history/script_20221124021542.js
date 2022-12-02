// var xhr = new XMLHttpRequest();
// xhr.addEventListener("keyup", checkAuthors);

$.get("data.php", function(data) {
    var json = jQuery.parseJSON(data);
    console.log(json)
});

var author = document.getElementById("author");
author.addEventListener("keyup", checkAuthors)
function checkAuthors(){
    let a = author.value;
    console.log(`Checking ${a}`);
}
