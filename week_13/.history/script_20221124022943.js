// var xhr = new XMLHttpRequest();
// xhr.addEventListener("keyup", checkAuthors);

$(document).ready(function() {
    var author = document.getElementById("author");
    $('#author').keyup(function(){
        $.ajax({
            type: "POST",
            url: "data.php",
            dataType: "json",
            cache: false,
            success: function(result){
                $("#output").html("Working");
            }
        });
        let response = this.response;
        console.log(response);
    });
});
