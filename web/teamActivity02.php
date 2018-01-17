<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>02 Teach : Team Activity</title>
    <link href="css/style.css" type="text/css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/myscripts.js"></script>
</head>
    <body>
        <div class="wrapper"><!--background image applied here-->
            <div class="page-content-container"><!--content container applied here-->
                <main>
                    <div id="sectionChangingColor">
                        <h1>Change the background color for this section by entering a color below.</h1>
                        <input type="text" id="clrName" placeholder="Red, Pink, #d3d3d3"></input><br/>
                        <input type="submit" value="Change Color" id="colorButton" onclick="displayColor()">
                    </div>
                    <div id="buttonPosition">
                        <h1>See What I Do!</h1>
                        <button id="testButton" type="button">Click Me</button>
                    </div>
                    <div id="blueSection">
                        <h1 id="supriseFont">This Section Can Be Turned On or Off</h1>
                    </div>
                    <div id="on_offSection">
                        <button id="onOffButton" type="button">Click Off</button>
                    </div>
                </main>
                <footer>
                </footer>
            </div><!--end of content container tag-->
        </div>
    </body>
</html>