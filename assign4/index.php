<?php session_start();
include "ui-core.php";
ini_set("display_errors", 1); // debugging
$active_page = basename($_SERVER["PHP_SELF"], ".php");

if (isset($_SESSION['employee-id'])) // Redirect to home if already logged in
	header("location: home.php");
?>

<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="styles.css"/>
<html>
	<div class=form-box>
		<h1 class="center"> The Story Keeper Bookstore </h1>
		<form action="logged-in.php" method="POST" onsubmit="validate(event, this);" novalidate>
			<div class="form-item">
				<label for="first-name">Book Seller's First Name:</label>
				<div style="float: right;">
					<input id="first-name" name="first-name"> 
					<p> Required </p>
				</div>
				<br> <br>
			</div>
			<div class="form-item">
				<label for="last-name">Book Seller's Last Name:</label>
				<div style="float: right;">
					<input id="last-name" name="last-name">
					<p> Required </p>
				</div>
			</div>
			<br>
			<div class="form-item">
				<label for="password">Book seller's password:</label>
				<div style="float: right;">
					<input type="password" id="password" name="password">
					<p> Required </p>
				</div>
			</div>
			<br>
			<div class="form-item">
				<label for="user-id">Book seller's ID:</label>
				<div style="float: right;">
					<input id="user-id" name="user-id">
					<p> Required </p>
				</div>
			</div>
			<br>
			<div class="form-item">
				<label for="phone-number">Book seller's phone #:</label>
				<div style="float: right;">
					<input id="phone-number" name="phone-number">
					<p> Required </p>
				</div>
			</div>
			<br>
			<div class="form-item">
				<label for="email">Book seller's email:</label>
				<div style="float: right;">
					<span style="margin-right: 80px;"> <input id="email" name="email"> </span>
				</div>
			</div>
			<br>
			<div class="form-item">
				<label for="confirm-email">Check the box to request an email confirmation</label>
				<div style="float: right;">
					<span style="margin-right: 80px;"> <input type="checkbox" name="confirm-email" id="confirm-email"> </span>
				</div>
			</div>
			<br> <br>
			<div class="center">
				<input type="reset" value="Reset">
				<input type="submit" value="Log In">
			</div>
		</form>
	</div>
</html>

<script type="text/javascript" src="script.js"></script>
