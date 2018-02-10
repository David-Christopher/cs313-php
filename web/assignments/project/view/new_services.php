<?php
if(!isset($_SESSION['loggedin'])){
    header("Location: http://vast-savannah-73411.herokuapp.com/assignments/project/index.php");
}
if ($_SESSION['adminData']['adminlevel'] < 2) {
 header('location: /project/');
 exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Services | Plumbing Co.</title>
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
        <h1>Add Services</h1>
                
        <?php
            if (isset($message)) {
             echo $message;
            }
        ?>
        <form class="add-service" method="post" action="/project/services/index.php">
            <h3>Add a new service below. All fields are required!</h3>
            <div class="label-div">
                                
              <label><b>Service Name</b></label><br/>
              <input type="text" placeholder="Enter New Service" name="servicename" required <?php if(isset($servicename)){echo "value='$servicename'";}?>> <br/>
              
              <label><b>Service Description</b></label><br/>
              <textarea rows="5" cols="22" placeholder="Enter Description" name="servicedescription" required><?php if(isset($servicedescription)){echo "$servicedescription";}?></textarea><br/>
               
              <input class="register-button" type="submit" name="submit" value="Add Service">

              
              <!--action name-value pair-->
              <input type="hidden" name="action" value="services">
            
            </div>
        </form>
    </main>
    <footer class="template-footer">
		<?php include $_SERVER['DOCUMENT_ROOT'].'/project/common/footer.php';?>
        <p>Last Updated: 9 February, 2018</p>
    </footer>
    </div><!--end of content container tag-->
    </div><!--end of background image tag-->
</body>
</html>
