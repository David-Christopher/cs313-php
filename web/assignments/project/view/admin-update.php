<?php
if(!isset($_SESSION['loggedin'])){
    header("Location: http://vast-savannah-73411.herokuapp.com/assignments/project/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($adminInfo['adminfirstname'])){ echo "Modify $adminInfo[adminfirstname] Account";} elseif(isset($adminfirstname)) { echo $adminfirstname; }?> | Plumbing Co.</title>
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
        <h1>Update Account</h1>
        <p class="update-account-info">Use this form to update your name or email information</p>
        <?php
            if (isset($message)) {
             echo $message;
            }
        ?>
        
        <form class="register-account" method="post" action="/assignments/project/accounts/index.php">
            <p>Modify the account details below. All fields are required!</p>
            <div class="label-div">
                
              <label><b>First Name</b></label><br/>              
              <input type="text" placeholder="Modify First Name" name="adminfirstname" required pattern="[a-zA-Z]{1,24}" <?php if(isset($adminfirstname)){ echo "value='$adminfirstname'"; } elseif(isset($adminInfo['adminfirstname'])) {echo "value='$adminInfo[adminfirstname]'"; }?>><br/>
              
              <label><b>Last Name</b></label><br/>
              <input type="text" placeholder="Modify Last Name" name="adminlastname" required pattern="[a-zA-Z]{1,24}" <?php if(isset($adminlastname)){ echo "value='$adminlastname'"; } elseif(isset($adminInfo['adminlastname'])) {echo "value='$adminInfo[adminlastname]'"; }?>><br/>
              
              <label><b>Email Address</b></label><br/>
              <input type="email" placeholder="Modify Email" name="adminemail" required <?php if(isset($adminemail)){ echo "value='$adminemail'"; } elseif(isset($adminInfo['adminemail'])) {echo "value='$adminInfo[adminemail]'"; }?>><br/>
              
              <input class="register-button" type="submit" name="submit" value="Update Account">
              
              <!--action name-value pair-->
              <input type="hidden" name="action" value="updateAdmin">
            
            </div>
        </form>
        
        <h2 class="update-account-info">Password Change</h2>
        
        <form class="register-account" method="post" action="/project/accounts/index.php">
            <p>Use this form to change your password.</p>
            <div class="label-div">
              <label><b>New Password</b></label>
              <p>*Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</p>
    
              <input type="password" placeholder="Modify Password" name="adminPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br/>
              
              <input class="register-button" type="submit" name="submit" value="Change Password">

              
              <!--action name-value pair-->
              <input type="hidden" name="action" value="updateAdminpassword">     
            </div>
        </form>
    </main>
    <footer class="template-footer">
		<?php include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/common/footer.php';?>
        <p>Last Updated: 9 February, 2018</p>
    </footer>
    </div><!--end of content container tag-->
    </div><!--end of background image tag-->
</body>
</html>