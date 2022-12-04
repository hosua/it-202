<html>
<div class="container">
    <?php
include 'info.php';

ini_set("display_errors", 1); // debugging
ini_set("display_startup_errors", 1); // debugging

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>

<form method=post action="index.php">
    <label for=user>Username: </label>
    <input type=text id=user name=user>
    <br> <br>
    <label for=pass>Password: </label>
    <input type=password id=pass name=pass>
</form>

<h3 style="margin: auto;"> Users </h3>
<!-- User list -->
<textarea readonly id=active-users name=active-users cols=20 rows=2>
<?php
// Show users
$sql = "SELECT * FROM Users;";
$query_res = $conn->query($sql);
while ($row = $query_res->fetch_assoc()) {
    echo $row['username'] . " ";
}
?>
</textarea>
    <!-- Messenger -->
    <br> <br>
    <h3 style="margin: auto;"> Messenger </h3>
<textarea id=messenger name=messenger cols=40 rows=10>
</textarea>
    <br> <br>
    <span class=warning id=warning>
    <!-- error message here if user fails to login -->
    </span>
    <br> <br>
    <!-- Listener -->
    <h3 style="margin: auto;"> Listener </h3>
    <label for=listen-user>
        <label for=listen-user>Enter a user to listen to:</label>
        <input type=text id=listen-user name=listen-user>
        <!-- <button type=button id=listener-button>Listen</button> -->
        <br> <br>
    <textarea id=listener name=listener cols=40 rows=10>
    </textarea>
</div> <!-- listener-container -->
</html>

<link rel="stylesheet" href="styles.css">



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        $("#messenger").keyup(function(){
            var user = $("#user").val();
            var pass = $("#pass").val();
            var msg = $(this).val();
            $.ajax({
                url: "set-chat.php",
                type: "POST",
                data: {
                    user: user, pass: pass, msg: msg
                },
                success: function(response){
                    console.log("Message sent.");
                    $("#warning").html("");
                },
                error: function(response){
                    console.log("Error");
                    $("#warning").html("ERROR: Invalid username or password.");
                }
            });
        });
       
        var listen_user = $("#listen-user");
        $.ajax({
            url: 'listen-chat.php',
            data: {
                listen_user: listen_user
            },
            error: function(){
                // fire when timeout reached
                console.log("User not found");
            },
            success: function(){
                // do something on success
            }, 
            timeout: 1000 // timeout after 1 second
        });
    });
</script>