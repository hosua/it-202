var xhr = new XMLHttpRequest();
xhr.addEventListener("onkeyup", checkAuthors);

var authors = document.getElementById("author");
authors.addEventListener("keyup", checkAuthors)
function checkAuthors(){
    
    console.log("checking")
}
