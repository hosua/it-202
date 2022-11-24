// var xhr = new XMLHttpRequest();
// xhr.addEventListener("keyup", checkAuthors);

$(document).ready(function() {
    let authorObj = document.getElementById("author");
    function getMatches(arr, sub_str){
        let matches = [];
        for (let author of arr){
            if (author.toLowerCase().startsWith(sub_str.toLowerCase()))
                matches.push(author);
        }
        return matches;
    }
    $('#author').keyup(function(){
        $.ajax({
            type: "POST",
            url: "data.php",
            dataType: "json",
            cache: false,
            success: function(authors){
                var search = authorObj.value;
                var matches = getMatches(authors, search);
                if (search == ""){
                    console.log("Empty search");
                    $("output").html("");
                } else if (matches.length == 0){
                    $("#output").html("Author not found.");
                } else {
                    let out = "Authors found: ";
                    for (let match of matches){
                        out += match + ", ";
                    }
                    $("#output").html(out);
                }
            }
        });
    });
});
