// var xhr = new XMLHttpRequest();
// xhr.addEventListener("keyup", checkAuthors);

var author = document.getElementById("author");
author.addEventListener("keyup", checkAuthors)
function checkAuthors(){
    let a = author.innerText;
    console.log(`Checking ${a}`);
}
