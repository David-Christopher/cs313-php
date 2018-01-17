//Click Me button toggle text
    $("#testButton").click(function () {
        $(this).text(function(i, displayClicked){
            return displayClicked === 'Click Me' ? 'Clicked!' : 'Click Me'
        })
    });

function displayColor() {
   var colorText = "clrName";
   var colorChange = document.getElementsById(colorText);
   
   var colorValue = colorChange.value;
 
   var firstDiv = "sectionChangingColor";
   var changeThis = document.getElementById(firstDiv);

   changeThis.style.backgroundColor  = colorValue;
}
//Fade in and out div
	$( document ).click(function() {
        $( "#blueSection" ).toggle( "highlight" );
    });
