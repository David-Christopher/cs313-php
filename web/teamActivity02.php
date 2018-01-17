<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>02 Teach : Team Activity</title>
    <link href="css/style.css" type="text/css" rel="stylesheet"/>
    <script src="js/myscripts.js"></script>
</head>
    <body>
        <div class="wrapper"><!--background image applied here-->
            <div class="page-content-container"><!--content container applied here-->
                <header></header>
                <nav></nav>
                <main>
                    <div id="sectionChangingColor">
                        <h1>Change the background color for this section by entering a color below.</h1>
                        <input type="text" name="clrName" placeholder="Enter Color Name Here"></input>
                        <input type="submit" value="Change Color" id="colorButton" onclick="displayColor()">
                    </div>
                    <div id="buttonPosition">
                        <button id="testButton" type="button" onclick="displayClicked()">Click Me</button>
                    </div>
                    <div id="blueSection">
                        <h1 id="supriseFont">This is the Blue Section<h1>
                    </div>
                </main>
                <footer></footer>
            </div><!--end of content container tag-->
        </div>
    </body>
</html>