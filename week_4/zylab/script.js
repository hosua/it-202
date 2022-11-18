// Your solution goes here 

function isStrongPassword(pass){
	if (pass.length < 8){
		console.log("Too short");
		return false;
	}
	let find_password = /password/;
	if (find_password.exec(pass) !== null){
		console.log("Password cannot contain \"password\" as the character.");
		return false;
	}
		
	let find_upper = /.*[A-Z].*/;
	if (find_upper.exec(pass) === null){
		console.log("Password must contain at least 1 uppercase character");
	}
	return true;
}

isStrongPassword("passwoArzz");
