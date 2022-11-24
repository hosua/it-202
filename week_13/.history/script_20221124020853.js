var xhr = new XMLHttpRequest();
xhr.addEventListener("onkeyup", checkAuthors);

var authors = document.getElementById("author");
authors.addEventListener("onkeyup", checkAuthors)
function checkAuthors(){
    
    console.log("checking")
}
