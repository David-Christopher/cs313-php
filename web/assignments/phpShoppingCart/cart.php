<?php session_start();

//Declare product variable and cost
$inventory = array("Banana", "Kiwi", "Apple", "Bread");
$cost = array("1.00", "5.00", "2.00", "1.99");

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
                    <div class="products-store">
                    <?php if ( isset($_SESSION["cart"]) ) { ?><br/><br/><br/>
                        <h2>Cart</h2>
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
                                <td><a href="?remove=<?php echo($i); ?>">remove from cart</a></td>
                            </tr>
                        <?php $total = $total + $_SESSION["cost"][$i]; }
                        $_SESSION["total"] = $total;?>
                            <tr>
                                <td colspan="7">Total : <?php echo($total); ?></td>
                            </tr>
                        </table>
                    <?php }?>
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