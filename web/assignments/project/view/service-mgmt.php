<?php
if(!isset($_SESSION['loggedin'])){
    header("Location: http://vast-savannah-73411.herokuapp.com/assignments/project/index.php");
}
if ($_SESSION['adminData']['adminlevel'] < 2) {
 header('location: /project/');
 exit;
}
if (isset($_SESSION['message'])) {
 $message = $_SESSION['message'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Management | Plumbing Co.</title>
    <link href="../css/plumbingStyles.css" type="text/css" rel="stylesheet"/>
</head>
<body>
    <div class="wrapper"><!--background image applied here-->
    <div class="page-content-container"><!--content container applied here-->
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/project/common/header.php';?>
    </header>
    <nav class="top-nav">
        <?php echo createNav(); ?>
    </nav>
    <main>
        <h1>Service Management</h1>  
        <?php
            if (isset($message)) {
             echo $message;
            }
        ?>
        <div class="management-content">
             <h2 class="management-h2">Welcome to the service management page. Please choose an option below:</h2>
            <ul>
                <li><a href="/project/services/index.php?action=newService">Add a New Service</a></li>
            </ul>

                     
        <?php
        if (isset($serviceList)) {
         echo $serviceList;
        }
        ?>
             
        </div>
       
    </main>
    <footer class="template-footer">
		<?php include $_SERVER['DOCUMENT_ROOT'].'/project/common/footer.php';?>
        <p>Last Updated: 9 February, 2018</p>
    </footer>
    </div><!--end of content container tag-->
    </div><!--end of background image tag-->
</body>
</html>
<?php unset($_SESSION['message']); ?>