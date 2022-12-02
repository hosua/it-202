// var xhr = new XMLHttpRequest();
// xhr.addEventListener("keyup", checkAuthors);

var author = document.getElementById("author");
author.addEventListener("keyup", checkAuthors)
function checkAuthors(){
    let a = author.value;
    console.log(`Checking ${a}`);
    $.get("data.php", function(data) {
        var json = jQuery.parseJSON(data);
        console.log(data)
    });
}
