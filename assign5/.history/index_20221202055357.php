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
        <input type="submit" value="Send Message">
    </form>

    <h3 style="margin: auto;"> Users </h3>
    <!-- User list -->
    <textarea readonly id=active-users name=active-users cols=20 rows=2>
<?php
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
<script>
    $.ajax({

    });
    // keyup event => ajax behavior
    // 1st group of ajax functions -- http1 object & functions
    // content copied to database, php does SQL update
</script>
</textarea>
    <br> <br>
    <span class=warning id=warning>
<?php
    // error message here if user fails to login
?>
    </span>
    <br> <br>
    <!-- Listener -->
    <h3 style="margin: auto;"> Listener </h3>
    <label for=listener-name>
        <input type=text id=listener-name name=listener-name>
        <button type=button id=listener-button>Listen</button>
        <br> <br>
    <textarea id=listener name=listener cols=40 rows=10>
    </textarea>
</div> <!-- listener-container -->

<link rel="stylesheet" href="styles.css">

</html>