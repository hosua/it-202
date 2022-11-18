// The list of "registered" UCIDs
let registered = ["jao43", "foo123", "baaz444"];

function validateInput(){
	let ucid = document.getElementById("ucid").value;
	let re = /^[a-zA-Z]+\d{0,3}$/;
	if (ucid.match(re) === null){
		alert("UCID DOES NOT CONFORM TO VALID FORMAT");
		console.log("bad ucid");
		return false;	
	}

	// check if in registered
	if (!registered.includes(ucid)){
		alert("VALID UCID FORMAT BUT INVALID UCID");
		return false;
	}
		
	alert("VALID UCID FORMAT AND UCID FOUND");
	return true;
}
