<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>03 Teach : Team Activity</title>
    <link href="css/style.css" type="text/css" rel="stylesheet"/>
    <script src="js/myscripts.js"></script>
</head>
    <body>
        <div class="wrapper"><!--background image applied here-->
            <div class="page-content-container"><!--content container applied here-->
                <main>
                    <form action="submittedDetails.php" method="post">
                        
                        <label>Name: </label>
                        <input type="text" name="name"><br><br>
                        
                        <label>E-mail: </label>
                        <input type="text" name="email"><br><br>
                        
                        <label>What is your major: </label><br>
                        <input type="radio" name="major" value="CS"> Computer Science<br>
                        <input type="radio" name="major" value="WDD"> Web Design and Development<br>
                        <input type="radio" name="major" value="CIT"> Computer Information Technology<br>
                        <input type="radio" name="major" value="CIT"> Computer Engineering<br><br>
                        <label>Comments: </label>
                        <input type="textarea" name="comments"><br><br>
                        
                        <label>Which of these countries have you visited?</label><br>
                        <input type="checkbox" name="countriesVisited[]" value="NA"/>North America<br>
                        <input type="checkbox" name="countriesVisited[]" value="SA"/>South America<br>
                        <input type="checkbox" name="countriesVisited[]" value="EU"/>Europe<br>
                        <input type="checkbox" name="countriesVisited[]" value="AS"/>Asia<br>
                        <input type="checkbox" name="countriesVisited[]" value="AU" />Australia<br>
                        <input type="checkbox" name="countriesVisited[]" value="AF"/>Africa<br>
                        <input type="checkbox" name="countriesVisited[]" value="AN" />Antarctica<br><br>

                        <input type="submit">

                    </form>
                </main>
                <footer>
                </footer>
            </div><!--end of content container tag-->
        </div>
    </body>
</html>