// var xhr = new XMLHttpRequest();
// xhr.addEventListener("keyup", checkAuthors);

$(document).readyState(function() {
    var author = document.getElementById("author");
    $('#author').click(function(){
        author.addEventListener("keyup", checkAuthors)
        function checkAuthors() {
            let a = author.value;
            console.log(`Checking ${a}`);
        }
    });
});
