<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
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
        <h1>Plumbing Company Login</h1>
                
        <?php
            if (isset($message)) {
             echo $message;
            }
        ?>
        
        <form class="account-login"  method="post" action="/assignments/project/accounts/index.php">
            <div class="label-div">
              <label for="adminemail"><b>Email Address</b></label><br/>
              <input type="email" placeholder="Enter Email" name="adminemail" required <?php if(isset($adminemail)){echo "value='$adminemail'";}?>> <br/>

              <label><b>Password</b></label>
              <p>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</p>
              <input type="password" placeholder="Enter Password" name="adminpassword" required><br/>
              
              <input class="login-button" type="submit" name="submit" value="Login">
              
              <input type="hidden" name="action" value="Login">
            </div>
          </form>
        
        <div class="create-account">
        <h3>Not a member?</h3>
        <div class="create-account-button">
            <a href="/assignments/project/accounts/index.php?action=registration">Create an Account</a>
        </div>  
        
        </div>    
    </main>
    <footer class="template-footer">
		<?php include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/common/footer.php';?>
        <p>Last Updated: 9 February, 2018</p>
    </footer>
    </div><!--end of content container tag-->
    </div><!--end of background image tag-->
</body>
</html>