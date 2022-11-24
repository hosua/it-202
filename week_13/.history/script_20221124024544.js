// var xhr = new XMLHttpRequest();
// xhr.addEventListener("keyup", checkAuthors);

$(document).ready(function() {
    let authorObj = document.getElementById("author");

    $('#author').keyup(function(){
        $.ajax({
            type: "POST",
            url: "data.php",
            dataType: "json",
            cache: false,
            success: function(authors){
                var search = authorObj.value;
                console.log(authors.size)
                if (!search){
                    $("output").html("");
                    return;
                }
                if (authors.size == 0){
                    $("#output").html("Author not found.");
                    return;
                }
                let out = "Authors found: ";
                for (let author of authors){
                    if (author.toLowerCase().startsWith(search.toLowerCase()))
                        out += author + ", ";
                }
                $("#output").html(out);
            }
        });
    });
});
