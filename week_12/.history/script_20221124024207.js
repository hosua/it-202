// var xhr = new XMLHttpRequest();
// xhr.addEventListener("keyup", checkAuthors);

$(document).ready(function() {
    let authorObj = document.getElementById("author");
    function strStartsWith(str, sub_str){
        return str.startsWith(sub_str);
    }

    $('#author').keyup(function(){
        $.ajax({
            type: "POST",
            url: "data.php",
            dataType: "json",
            cache: false,
            success: function(authors){
                var search = authorObj.value;
                if (authors.size == 0){
                    $("#output").html("Author not found.");
                    return;
                }
                let out = "Authors found: ";
                for (let author of authors){
                    if (author.startsWith(search))
                        out += author + ", ";
                }
                $("#output").html(out);
            }
        });
    });
});
