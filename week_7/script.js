$(document).ready(function() {
	$name = $("#name")
	$major = $("#major");
	
	$name.focus(function() {
		$(this).css("border-color", "blue");
	});
	$name.blur(function() {
		$(this).css("border-color", "");
	});

	$major.focus(function() {
		$(this).css("border-color", "blue");
	});
	$major.blur(function() {
		$(this)sssscss("border-color", "");
	});

	$form = $("#student-form");
	$form.submit(function(e) {
		alert(`Student Name: ${$name.val()}\tMajor: ${$major.val()}`);
	});

});


