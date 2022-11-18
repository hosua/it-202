function changeImage(){
	let iceCream = document.getElementById("ice-cream");
	if (iceCream.getAttribute("src") === "ice-cream-normal.jpg"){
		iceCream.setAttribute("src", "ice-cream-melted.jpg");
	} else {
		iceCream.setAttribute("src", "ice-cream-normal.jpg");
	}
	let iceButt = document.getElementById("ice-button");
	/*
	 * if (iceButt.innerText == "Melt"){
	 * 	iceButt.innerText = "Normal";
	 * } else {
	 * 	iceButt.innerText = "Melt";
	 * }
     */
}
