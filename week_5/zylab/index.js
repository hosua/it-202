function parseScores(scoresString) {
	// TODO: Compete the function
	return scoresString.split(" ");
}

function buildDistributionArray(scoresArray) {
	let res = [ 0, 0, 0, 0, 0 ];
	// TODO: Compete the function
	scoresArray.forEach((num) => {
		if (num >= 90){
			res[0]++;
		} else if (num >= 80){
			res[1]++;
		} else if (num >= 70){
			res[2]++;
		} else if (num >= 60){
			res[3]++;
		} else {
			res[4]++;
		}
	});
	console.log(res);
	return res;
}

function setTableContent(userInput) {
	// TODO: Compete the function
	let scoresArray = parseScores(userInput);
	let distArray = buildDistributionArray(scoresArray);
	
	// let tdList = document.getElementsByTagName("td");
	let firstRow = document.getElementById("firstRow");
	let thirdRow = document.getElementById("thirdRow");
	for (let i = 0; i < distArray.length; i++){
		// tdList[i].innerHTML += "<div style='height:" + (distArray[i] * 10) + "px' class='bar" + i + "'></div>";
		firstRow.innerHTML += "<td><div style='height:" + (distArray[i] * 10) + "px' class='bar" + i + "'></div></td>";
		thirdRow.innerHTML += "<td>" + distArray[i] + "</td>";
	}
}

// The argument can be changed for testing purposes
setTableContent("45 78 98 83 86 99 90 59");
