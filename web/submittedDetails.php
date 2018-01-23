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
                    <h1>Here are your submitted details:</h1><br> 
                    <p>Name: </p><?php echo $_POST["name"]; ?><br>
                    <p>Email: </p><?php echo $_POST["email"]; ?><br>
                    <p>Major: </p><?php echo $_POST["major"]; ?><br>
                    <p>Comments: </p><?php echo $_POST["comments"]; ?><br>
                    <!--Checkbox checker-->
                    <?php $allBoxes = $_POST['countriesVisited'];
                        if(empty($allBoxes))
                        {
                            echo("You didn't select any countries.");
                        }
                        else
                        {
                            $total = count($allBoxes);
                            echo("You selected $total countries: ");
                            for($i=0; $i < $total; $i++)
                            {
                                echo($allBoxes[$i] . " ");
                            }
                        }   
                    ?>

                </main>
                <footer>
                </footer>
            </div><!--end of content container tag-->
        </div>
    </body>
</html>