<html>
    <div class="container">
<?php
include 'info.php';

ini_set("display_errors", 1); // debugging
ini_set("display_startup_errors", 1); // debugging

$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
$sql = "SELECT * FROM Users";
?>

<form method=post action="index.php">
    <label for=user>Username: </label>
    <input type=text id=user name=user>
    <br> <br>
    <label for=pass>Password: </label>
    <input type=password id=pass name=pass>
    <input type="submit" value="Send Message">
</form>
<textarea readonly id=active-users name=active-users cols=20 rows=2>
</textarea>
<br> <br>
<textarea id=messenger name=messenger cols=40 rows=10>
</textarea>
<br> <br>
<span class=warning id=warning>
<?php
 // error message here
?>
</span>
</div> <!-- messenger-container -->
<br> <br>
<div class=container>
    <label for=listener-name>
    <input type=text id=listener-name name=listener-name>
    <button type=button id=listener-button>Listen</button>
    <br> <br>
    <textarea id=listener name=listener cols=40 rows=10>
    </textarea>
</div> <!-- listener-container -->

<link rel="stylesheet" href="styles.css">

</html>