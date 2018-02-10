<?php
if(!isset($_SESSION['loggedin'])){
    header("Location: http://vast-savannah-73411.herokuapp.com/assignments/project/index.php");
}
    // A valid user exists, log them in
    $_SESSION['loggedin'] = TRUE;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plumbing Admin Access</title>
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
     <h1><?php if(isset($adminfirstname)){ echo "$adminfirstname"; } elseif(isset($adminData['adminfirstname'])) {echo "$adminData[adminfirstname]"; }?><?php echo ' '?><?php if(isset($adminlastname)){ echo "$adminlastname"; } elseif(isset($adminData['adminlastname'])) {echo "$adminData[adminlastname]"; }?>: Logged In</h1>
        <?php
            if (isset($message)) {
             echo $message;
            }
        ?>
     <ul>
         <li>First name: <?php if(isset($adminfirstname)){ echo "$adminfirstname"; } elseif(isset($adminData['adminfirstname'])) {echo "$adminData[adminfirstname]"; }?></li>       
         <li>Last name: <?php if(isset($adminlastname)){ echo "$adminlastname"; } elseif(isset($adminData['adminlastname'])) {echo "$adminData[adminlastname]"; }?></li>
         <li>Email: <?php if(isset($adminemail)){ echo "$adminemail"; } elseif(isset($adminData['adminemail'])) {echo "$adminData[adminemail]"; }?></li>
     </ul>
     <a class="update-account-info" href=<?php echo "http://vast-savannah-73411.herokuapp.com/assignments/project/accounts/index.php?action=modAdmin&id=$adminData[adminid]"?>>Update Account Information</a>
     
     <?php if ($adminData['adminlevel'] > 1){
         echo '<div class="admin-functions">';
         echo '<h3>Administrative Functions</h3>';
         echo '<p>Use the link below to manage services</p>';
         echo '<a class="admin-link" href="http://vast-savannah-73411.herokuapp.com/assignments/project/services/">Services</a>';
         echo '</div>';
         
         echo '<div class="admin-functions">';
         echo '<p>Use the link below to manage service images ***COMING SOON***</p>';
         echo '<a class="admin-link" href="#">Upload and Delete Images</a>';
         //IMAGE UPLOAD & DELETE LINK http://vast-savannah-73411.herokuapp.com/assignments/project/uploads/
         echo '</div>';
     } ?>     
     
    </main>
    <footer class="template-footer">
		<?php include $_SERVER['DOCUMENT_ROOT'].'/project/common/footer.php';?>
        <p>Last Updated: 9 February, 2018</p>
    </footer>
    </div><!--end of content container tag-->
    </div><!--end of background image tag-->
</body>
</html>