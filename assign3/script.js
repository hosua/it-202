const input_buttons = document.querySelectorAll(".input-button");

input_buttons.forEach(input_button => {
	input_button.addEventListener("mouseover", function() {
		input_button.style.backgroundColor = "rgb(35, 113, 140)";
	});

	input_button.addEventListener("mouseout", function() {
		input_button.style.backgroundColor = "";
	});
});
