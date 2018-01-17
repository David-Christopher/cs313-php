
function displayColor() {
	var textColor = "clrName";
	var enteredColor = document.getElementById(textColor);
 	var divColor = "sectionChangingColor";
	var div = document.getElementById(divColor);

	var colorValue = enteredColor.value;
	div.style.backgroundColor = colorValue;
}


