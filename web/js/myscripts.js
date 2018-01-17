function displayClicked() {
   document.getElementById("testButton").innerHTML = "Clicked!";
}

function displayColor() {
   var colorText = "clrName";
   var colorChange = document.getElementsById(colorText);
   
   var colorValue = colorChange.value;
 
   var firstDiv = "sectionChangingColor";
   var changeThis = document.getElementById(firstDiv);
   
   changeThis.style.backgroundColor  = colorValue;
}
