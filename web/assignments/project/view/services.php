<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $type; ?> Services | Plumbing Co.</title>
    <link href="/assignments/project/css/plumbingStyles.css" type="text/css" rel="stylesheet"/>
</head>
<body>
    <div class="wrapper"><!--background image applied here-->
    <div class="page-content-container"><!--content container applied here-->
    <header>
    	<?php include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/common/header.php';?>
    </header>
    <nav class="top-nav">
        <?php echo createNav(); ?>
    </nav>
    <main>
        
        <h1><?php echo $type; ?> Services</h1>
        
        <?php if(isset($message)){ echo $message; } ?>
        <?php if(isset($serviceDisplay)){ echo $serviceDisplay; } ?>
        
    </main>
    <footer>
		<?php include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/common/footer.php';?>
        <p>Last Updated: 9 February, 2018</p>
    </footer>
    </div><!--end of content container tag-->
    </div><!--end of background image tag-->
</body>
</html>

