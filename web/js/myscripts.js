function displayClicked() {
   document.getElementById("testButton").innerHTML = "Clicked!";
}

function displayColor() {
   var colorChange = document.getElementsByName("clrName").value;
   print "colorChange";
   exit;
   var changeThis = document.getElementById("sectionChangingColor");
   changeThis.style.backgroundColor  = colorChange;
}
