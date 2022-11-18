class BookSeller {
	constructor(firstName, lastName, password, id){
		this.firstName = firstName;
		this.lastName = lastName;
		this.password = password;
		this.id = id;
	}
}

	
let bookSellers = [
	new BookSeller("John", "Smith", "1!Qq", "12345670"),
	new BookSeller("Will", "Smith", "2@Ww", "12345671"),
	new BookSeller("Josh", "Ortiga", "3#Ee", "12345672"),
	new BookSeller("Michael", "Jordan", "4$Rr", "12345673"),
	new BookSeller("George", "Washington", "5%Tt", "12345674"),
	new BookSeller("Peter", "Parker", "6^Yy", "12345675"),
	new BookSeller("Peter", "Griffin", "7&Uu", "12345676"),
	new BookSeller("Homer", "Simpson", "8*Ii", "12345677"),
];

const confirmEmail = document.getElementById("confirm-email");
const emailTextBox = document.getElementById("email");

confirmEmail.addEventListener("change", (event) => {
	if (event.currentTarget.checked) {
		let p_node = document.createElement("p");
		let txt = document.createTextNode("Required");
		p_node.appendChild(txt);
		emailTextBox.parentNode.after(p_node);
	} else {
		emailTextBox.parentNode.nextSibling.remove();
	}
});


function validate(event, form){
	let firstName = form.querySelector("#first-name");
	let lastName = form.querySelector("#last-name");
	let password = form.querySelector("#password");
	let userId = form.querySelector("#user-id");
	let phoneNumber = form.querySelector("#phone-number");
	let email = form.querySelector("#email");
	// console.log("Validating...");
	// only check email if checkbox checked

	// Check if all inputs have something in them
	if (firstName.value == ""){
		console.log("Missing first name");
		firstName.classList.add("error");
		alert("Missing first name");
		event.preventDefault();
		return false;
	} else {
		firstName.classList.remove("error");
	}
	if (lastName.value == ""){
		console.log("Missing last name");
		lastName.classList.add("error");
		alert("Missing last name");
		event.preventDefault();
		return false;
	} else {
		lastName.classList.remove("error");
	}

	if (password.value == ""){
		console.log("Missing password");
		password.classList.add("error");
		alert("Missing password");
		event.preventDefault();
		return false;
	} else {
		password.classList.remove("error");
	}
	if (userId.value == ""){
		console.log("Missing user ID");
		userId.classList.add("error");
		alert("Missing user ID");
		event.preventDefault();
		return false;
	} else {
		userId.classList.remove("error");
	}
	
	if (phoneNumber.value == ""){
		console.log("Missing phone number");
		phoneNumber.classList.add("error");
		alert("Missing phone number");
		event.preventDefault();
		return false;
	} else {
		phoneNumber.classList.remove("error");
	}

	if (email.value == "" && document.getElementById("confirm-email").checked){
		console.log("Missing email");
		email.classList.add("error");
		alert("Missing email");
		event.preventDefault();
		return false;
	} else {
		email.classList.remove("error");
	}

	// Validate if the inputs are legal
	
	if (!validatePass(password.value, password)){
		event.preventDefault();
		return false;
	}

	if (!validateUserID(userId.value, userId)){
		event.preventDefault();
		return false;
	}
	if (!validatePhoneNumber(phoneNumber.value, phoneNumber)){
		event.preventDefault();
		return false;
	}

	if (document.getElementById("confirm-email").checked && !validateEmail(email.value, email)){
		event.preventDefault();
		return false;
	}
	// let allVars = `${firstName} ${lastName} ${password} ${userId} ${phoneNumber} ${email}`;
	// console.log(allVars);
	var verify_res = verifyInput(form);
	console.log(`Verify result: ${verify_res}`);
	if (!verify_res){
		event.preventDefault();
		alert(`Could not find matching login credentials for: ${firstName.value} ${lastName.value}`);
	} else {
		let transaction = document.getElementById("transaction-opts");
		let transaction_text = transaction.options[transaction.selectedIndex].text;
		alert(`Welcome ${firstName.value} ${lastName.value}! Transaction "${transaction_text}" completed.`);
	}
	return verify_res;
}

function validatePass(password, passwordObj){
	// Will need to split this into multiple regular expressions to output specific errors.
	// var re = /^((?=.*[A-Z].*)(?=.*\d.*)(?=.*(\W|_).*))$/;
	
	// TODO: Get error msg to show next to input box
	if (password.length > 10){
		alert("Password must be less than 11 characters long");
		// To display custtom error message in text box.
		// novalidate must be a form attribute in html as well.
		// passwordObj.setCustomValidity("Password must be less than 11 characters long");
		// passwordObj.reportValidity();
		passwordObj.classList.add("error");
		console.log("Password must be less than 11 characters long");
		return false;
	} else {
		passwordObj.classList.remove("error");
	}
	
	var capCheck = /(?=.*[A-Z].*)/;
	if (capCheck.exec(password) === null){
		alert("Password missing capital letter");
		// passwordObj.setCustomValidity("Password missing capital letter");
		// passwordObj.reportValidity();
		console.log("Password missing capital letter");
		passwordObj.classList.add("error");
		return false;
	} else {
		passwordObj.classList.remove("error");
	}
	var numCheck = /(?=.*\d.*)/;
	if (numCheck.exec(password) === null){
		// passwordObj.setCustomValidity("Password missing number");
		// passwordObj.reportValidity();
		console.log("Password missing number");
		alert("Password missing number");
		passwordObj.classList.add("error");
		return false;
	}  else {
		passwordObj.classList.remove("error");
	}
	var specCheck = /(?=.*(\W|_).*)/;
	if (specCheck.exec(password) === null){
		alert("Password missing special char");
		// passwordObj.setCustomValidity("Password missing special char");
		// passwordObj.reportValidity();
		passwordObj.classList.add("error");
		console.log("Password missing special char");
		return false;
	} else {
		passwordObj.classList.remove("error");
	}
	return true;
}

function validateUserID(userID, userIdObj){
	var re = /^(\d{8})$/;	
	var res = re.exec(userID);
	if (res === null){
		alert("UserID must be an 8 digit number");
		// userIdObj.setCustomValidity("UserID must be an 8 digit number");
		// userIdObj.reportValidity();
		userIdObj.classList.add("error");
		console.log("UserID must be an 8 digit number");
		return false;
	} else {
		userIdObj.classList.remove("error");
	}
	return true;
}

function validatePhoneNumber(phoneNumber, phoneNumberObj){
	var re = /^(\d{3}( |-)\d{3}(\2)\d{4})$/;
	var res = re.exec(phoneNumber);
	if (res === null){
		alert("Phone number must be in the format XXX XXX XXXX or XXX-XXX-XXXX");
		// phoneNumberObj.setCustomValidity("Phone number must be in the format XXX XXX XXXX or XXX-XXX-XXXX");
		// phoneNumberObj.reportValidity();
		phoneNumberObj.classList.add("error");
		console.log("Phone number must be in the format XXX XXX XXXX or XXX-XXX-XXXX");
		return false;
	} else {
		phoneNumberObj.classList.remove("error");
	}
	return true;
}

function validateEmail(email, emailObj){
	// TODO
	var re = /^(.+@(\w|-){2,}\..{2,5})$/;
	var res = re.exec(email);
	if (res === null){
		alert("Invalid email address");
		// emailObj.setCustomValidity("Invalid email address");
		// emailObj.reportValidity();
		emailObj.classList.add("error");
		console.log("Invalid email address");
		return false;
	} else {
		emailObj.classList.remove("error");
	}

	return true;
}

function foundMatch(firstName, lastName, password, id){
	var res = false;

	bookSellers.forEach((book_seller) => {
		if (book_seller.firstName.toLowerCase() == firstName.toLowerCase()){
			if (book_seller.lastName.toLowerCase() == lastName.toLowerCase() && 
				book_seller.password == password && 
				book_seller.id == id){
				res = true;
				return
			}
		}
	});

	(res) ? console.log("Found match") : console.log("Did not find match");
	return res;
}

function verifyInput(form){
	console.log("Verifying...");
	let firstName = form.querySelector("#first-name").value;
	let lastName = form.querySelector("#last-name").value;
	let password = form.querySelector("#password").value;
	let userId = form.querySelector("#user-id").value;
	return foundMatch(firstName, lastName, password, userId);
}

