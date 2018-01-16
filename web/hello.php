<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World</title>
    <link href="css/style.css" type="text/css" rel="stylesheet"/>
</head>
    <body>
        <div class="wrapper"><!--background image applied here-->
            <div class="page-content-container"><!--content container applied here-->
                <header></header>
                <nav></nav>
                <main>
                    <h1><?php
                    echo "Hello world!";
                    ?></h1>
                    <h2><?php        
                    $num = 3 / 4; 
print $num;
                    ?></h2>
                </main>
                <footer></footer>
            </div><!--end of content container tag-->
        </div>
    </body>
</html>