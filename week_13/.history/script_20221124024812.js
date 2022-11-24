// var xhr = new XMLHttpRequest();
// xhr.addEventListener("keyup", checkAuthors);

$(document).ready(function() {
    let authorObj = document.getElementById("author");
    function getMatches(arr, sub_str){
        let matches = [];
        for (let author of arr){
            if (author.toLowerCase().startsWith(search.toLowerCase()))
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
                console.log(authors.length)
                if (!search){
                    $("output").html("");
                    return;
                }
                if (authors.length == 0){
                    $("#output").html("Author not found.");
                    return;
                }
                let out = "Authors found: ";
                $("#output").html(out);
            }
        });
    });
});
