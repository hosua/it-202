// var xhr = new XMLHttpRequest();
// xhr.addEventListener("keyup", checkAuthors);

$(document).ready(function() {
    $('#author').click(function(){
        $.ajax({
            type: "POST",
            url: "data.php",
            dataType: "json",
            cache: false,
            success: function(result){
                $("#output").html("Working");
            }
        });

        author.addEventListener("keyup", checkAuthors);
        function checkAuthors() {
            let a = author.value;
            console.log(`Checking ${a}`);
        }
    });
});
