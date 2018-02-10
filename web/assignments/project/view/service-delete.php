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
    <title><?php if(isset($serviceInfo['servicename'])){ echo "Delete $serviceInfo[servicename]";} ?> | Plumbing Co.</title>
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
    <h1><?php if(isset($serviceInfo['servicename'])){ echo "Delete $serviceInfo[servicename]";} ?></h1>
                
        <?php
            if (isset($message)) {
             echo $message;
            }
        ?>
        <form class="add-service" method="post" action="/project/services/index.php">
            <h3>Confirm Service Deletion. The delete is permanent.</h3>
            <div class="label-div">
                
              <label><b>Service Name</b></label><br/>        
              <input type="text" readonly name="servicename" id="servicename" <?php if(isset($serviceInfo['servicename'])){echo "value='$serviceInfo[servicename]'"; }?>><br/>
              
              <label><b>Service Description</b></label><br/>
              <textarea rows="5" cols="22" readonly name="servicedescription"><?php if(isset($serviceInfo['servicedescription'])){echo $serviceInfo['servicedescription']; }?></textarea><br/>
              <input class="register-button" type="submit" name="submit" value="Delete Service">

              
              <!--action name-value pair-->
              <input type="hidden" name="action" value="deleteService">
              <input type="hidden" name="serviceid" value="<?php if(isset($serviceInfo['serviceid'])){ echo $serviceInfo['serviceid'];} ?>">
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
