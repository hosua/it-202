// var xhr = new XMLHttpRequest();
// xhr.addEventListener("keyup", checkAuthors);

$(document).ready(function() {
    function checkStrStart(arr, sub_str){
        
    }

    $('#author').keyup(function(){
        $.ajax({
            type: "POST",
            url: "data.php",
            dataType: "json",
            cache: false,
            success: function(authors){
                $("#output").html("Authors found: ");
                for (let author of authors){
                    console.log(author);
                }
            }
        });
    });
});
