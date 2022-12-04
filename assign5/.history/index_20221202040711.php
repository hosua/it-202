<html>
    <div class="container">
<?php
// session_start();
include 'info.php';
// $session_user = "";
// $err_msg = "";
// if (isset($_SESSION['user']))
//     $session_user = $_SESSION['user'];
// if (isset($_SESSION['err_msg']))
    $err_msg = $_SESSION['err_msg'];


ini_set("display_errors", 1); // debugging
ini_set("display_startup_errors", 1); // debugging

// if (!$session_user) {
//     $out = <<<EOF
//             <form method=post action="logged-in.php">
//                 <label for=user>Username: </label>
//                 <input type=text id=user name=user>
//                 <br> <br>
//                 <label for=pass>Password: </label>
//                 <input type=password id=pass name=pass>
//                 <input type="submit" value="Log in">
//             </form>
// EOF;
//     echo "$out";
// } else {
//     echo "<p> Logged in as: $session_user</p>";
//     $out = <<<EOL
//     <form action='logged-out.php'>
//         <input type='submit' value='Log out'/>
//     </form>
// EOL;
//     echo "$out";
// }
?>
<form method=post action="logged-in.php">
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
if ($err_msg) {
    echo "$err_msg";
}
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
</div>

<link rel="stylesheet" href="styles.css">

</html>