// var xhr = new XMLHttpRequest();
// xhr.addEventListener("keyup", checkAuthors);

$(document).ready(function() {
    $('#author').keyup(function(){
        $.ajax({
            type: "POST",
            url: "data.php",
            dataType: "json",
            cache: false,
            success: function(authors){
                $("#output").html("Working");
                for (let author of authors){
                    console.log(author);
                }
            }
        });
    });
});
