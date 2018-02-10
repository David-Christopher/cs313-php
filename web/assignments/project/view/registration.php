<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emplyee Registration</title>
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
        <h1>Plumbing Company Registration</h1>
        
        <?php
            if (isset($message)) {
             echo $message;
            }
        ?>
        
        <form class="register-account" method="post" action="/assignments/project/accounts/index.php">
            <p>All fields are required</p>
            <div class="label-div">
                
              <label for="adminfirstname"><b>First Name</b></label><br/>
              <input type="text" placeholder="Enter First Name" name="adminfirstname" required pattern="[a-zA-Z]{1,24}" <?php if(isset($adminfirstname)){echo "value='$adminfirstname'";}?>> <br/>
              
              <label for="adminlastname"><b>Last Name</b></label><br/>
              <input type="text" placeholder="Enter Last Name" name="adminlastname" required pattern="[a-zA-Z]{1,24}" <?php if(isset($adminlastname)){echo "value='$adminlastname'";}?>> <br/>
              
              <label for="adminemail"><b>Email Address</b></label><br/>
              <input type="email" placeholder="Enter Email" name="adminemail" required <?php if(isset($adminemail)){echo "value='$adminemail'";}?>> <br/>

              <label for="adminpassword"><b>Password</b></label>
              <p>*Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</p>
    
              <input type="password" name="adminpassword" placeholder="Enter Password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br/>
    
              <input class="register-button" type="submit" name="submit" value="Register">

              
              <!--action name-value pair-->
              <input type="hidden" name="action" value="register">
            
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