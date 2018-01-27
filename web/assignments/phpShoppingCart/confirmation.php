<?php session_start();

//Declare product variable and cost
$inventory = array("Banana", "Kiwi", "Apple", "Bread");
$cost = array("1.25", "5.75", "2.50", "1.99");

//Load session
 if ( !isset($_SESSION["total"]) ) {
   $_SESSION["total"] = 0;
   for ($i=0; $i< count($inventory); $i++) {
    $_SESSION["quantity"][$i] = 0;
   $_SESSION["cost"][$i] = 0;
  }
 }

//refresh
 if ( isset($_GET['refresh']) )
 {
 if ($_GET["refresh"] == 'true')
   {
   unset($_SESSION["quantity"]);
   unset($_SESSION["cost"]);
   unset($_SESSION["total"]);
   unset($_SESSION["cart"]);
   }
 }

//add
 if ( isset($_GET["add"]) )
   {
   $i = $_GET["add"];
   $quantity = $_SESSION["quantity"][$i] + 1;
   $_SESSION["cost"][$i] = $cost[$i] * $quantity;
   $_SESSION["cart"][$i] = $i;
   $_SESSION["quantity"][$i] = $quantity;
 }

//remove
  if ( isset($_GET["remove"]) )
   {
   $i = $_GET["remove"];
   $quantity = $_SESSION["quantity"][$i];
   $quantity--;
   $_SESSION["quantity"][$i] = $quantity;

//if quantity is zero, remove product from cart
   if ($quantity == 0) {
    $_SESSION["cost"][$i] = 0;
    unset($_SESSION["cart"][$i]);
  }
 else
  {
   $_SESSION["cost"][$i] = $cost[$i] * $quantity;
  }
 }
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Shopping Cart: Cart</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="../../../css/personalStyle.css" type="text/css" rel="stylesheet"/>
	<script src="../../../js/personalScripts.js"></script>
	<link rel="icon" type="image/png" href="../../../images/favicon.png">
</head>
    <body>
        <div class="wrapper"><!--background image applied here-->
            <div class="page-content-container"><!--content container applied here-->
                <header>
                	<div class="nav-background">
                        <nav class="topnav" id="myTopnav">
                          <a href="https://vast-savannah-73411.herokuapp.com/assignments/phpShoppingCart">Store</a>
                          <a href="https://vast-savannah-73411.herokuapp.com/assignments/phpShoppingCart/cart.php" class="active">Cart</a>
                          <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="topNavFunction()">&#9776;</a>
                        </nav>
	               	</div>
                </header>
                <main>
                    <img id="main_img" src="../../../images/grocery-store.jpg" alt="Image from iamwire.com">
                    <div class="products-store cart">
                    <?php if ( isset($_SESSION["cart"]) ) { ?><br/><br/><br/>
                        <h2>Confirmation of Purchase</h2>
                        <table>
                            <tr>
                                <th>Product</th>
                                <th class="table_space">&nbsp;</th>
                                <th>quantity</th>
                                <th class="table_space">&nbsp;</th>
                                <th>Amount</th>
                                <th class="table_space">&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        <?php $total = 0;
                        foreach ( $_SESSION["cart"] as $i ) { ?>
                            <tr>
                                <td><?php echo( $inventory[$_SESSION["cart"][$i]] ); ?></td>
                                <td class="table_space">&nbsp;</td>
                                <td><?php echo( $_SESSION["quantity"][$i] ); ?></td>
                                <td class="table_space">&nbsp;</td>
                                <td><?php echo( $_SESSION["cost"][$i] ); ?></td>
                                <td class="table_space">&nbsp;</td>
                            </tr>
                        <?php $total = $total + $_SESSION["cost"][$i]; }
                        $_SESSION["total"] = $total;?>
                            <tr>
                                <td colspan="7">Total : <?php echo($total); ?></td>
                            </tr>
                        </table>
                    <?php }?>
                    <h2>Shipping to:</h2>
                    <div class="shipping-info">
                        <?php 

                          if ($_POST['name'] != "") {
                              $_POST['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
                              if ($_POST['name'] == "") {
                                  $errors1 .= 'Please enter a valid name.<br/>';
                                  include 'https://vast-savannah-73411.herokuapp.com/assignments/phpShoppingCart/checkout.php';
                              }
                          } else {
                              $errors1 .= 'Please enter your name.<br/>';
                              include 'https://vast-savannah-73411.herokuapp.com/assignments/phpShoppingCart/checkout.php';
                          }

                          echo $_POST['name'];
                          echo "<br/>";

                          
                          if ($_POST['address1'] != "") {
                              $_POST['address1'] = filter_var($_POST['address1'], FILTER_SANITIZE_STRING);
                              if ($_POST['address1'] == "") {
                                  $errors2 .= 'Please enter a valid address.<br/>';
                                  include 
                              }
                          } else {
                              $errors2 .= 'Please enter your address.<br/>';
                          }

                          echo $_POST['address1'];
                          echo "<br/>";


                          if (isset($errors2)) {
                            echo $errors2;
                            echo "<br/>";
                          }

                          if (isset($_POST['address2'])) {
                              echo filter_var($_POST['address2'], FILTER_SANITIZE_STRING);
                              echo "<br/>";
                          }

                          if ($_POST['city'] != "") {
                              $_POST['city'] = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
                              if ($_POST['city'] == "") {
                                  $errors3 .= 'Please enter a valid city.<br/>';
                              }
                          } else {
                              $errors3 .= 'Please enter your city.<br/>';
                          }

                          echo $_POST['city'];
                          echo "<br/>";


                          if (isset($errors3)) {
                            echo $errors3;
                            echo "<br/>";
                          }

                          if ($_POST['state'] != "") {
                              $_POST['state'] = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
                              if ($_POST['state'] == "") {
                                  $errors4 .= 'Please enter a valid state.<br/>';
                              }
                          } else {
                              $errors4 .= 'Please enter your state.<br/>';
                          }

                          echo $_POST['state'];
                          echo "<br/>";


                          if (isset($errors4)) {
                            echo $errors4;
                            echo "<br/>";
                          }       

                          if ($_POST['number_int'] != "") {
                              $_POST['number_int'] = filter_var($_POST['number_int'], FILTER_SANITIZE_NUMBER_INT);
                              if ($_POST['number_int'] == "") {
                                  $errors5 .= 'Please enter a valid zip code.<br/>';
                              }
                          } else {
                              $errors5 .= 'Please enter your zip code.<br/>';
                          }

                          echo $_POST['number_int'];
                          echo "<br/>";


                          if (isset($errors5)) {
                            echo $errors5;
                            echo "<br/>";
                          }
                        ?>
                    </div>
                </main>
                <footer class="shopping-cart">
                    <div>
                        <div id="left">
                            <h3>About</h3>
                        </div>
                        <div id="center">
                            <p>This page is designed to simulate a php shopping cart</p>
                        </div>
                    </div>
                </footer>
            </div><!--end of content container tag-->
        </div>
    </body>
</html>