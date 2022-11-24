// var xhr = new XMLHttpRequest();
// xhr.addEventListener("keyup", checkAuthors);

$(document).ready(function() {
    function strStartsWith(str, sub_str){
        
    }

    $('#author').keyup(function(){
        $.ajax({
            type: "POST",
            url: "data.php",
            dataType: "json",
            cache: false,
            success: function(authors){
                if (authors.size == 0){
                    $("#output").html("Author not found.");
                    return;
                }
                let out = "Authors found: ";
                for (let author of authors){
                    out += author + ", ";
                }
                $("#output").html(out);
            }
        });
    });
});
