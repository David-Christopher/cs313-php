        <div>
            <img class="logo" src="images/site/logo.gif" alt="Plumbing Co. Logo Image">
            
            
            <div class="my-account">
                <div class="welcome-message">
                    
                    <?php if(isset($_SESSION['loggedin'])){
                                              
                        if(isset($_SESSION['adminData']['servicename'])){
                            echo "<a href='http://vast-savannah-73411.herokuapp.com/assignments/project/accounts/index.php?action=myAccount'>";
                            printf("<span>Welcome %s</span>", $_SESSION['adminData']['servicename']);
                            echo "</a>";
                        } 
                    }
                    ?>

                </div>
                <?php if(isset($_SESSION['loggedin'])){
                    echo '<a class="my-account-link" href="http://vast-savannah-73411.herokuapp.com/assignments/project/accounts/index.php?action=Logout">Logout</a>';
                }
                else{ echo '<a href="http://vast-savannah-73411.herokuapp.com/assignments/project/accounts/index.php?action=login"><img class="account-folder-img" src="images/site/account.gif" alt="Personal Account Folder Image"></a>
                <a class="my-account-link" href="http://vast-savannah-73411.herokuapp.com/assignments/project/accounts/index.php?action=login">My Account</a>';
                }?>
            </div>
        </div>
