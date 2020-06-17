<?php
session_start();

   // Check user login or not
   if (!isset($_SESSION["unameMobBook"])) {
    // logged in
     header('Location: index4.php');
     }

require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])  && ($_POST["quantity"]>=1)) 
		{
			$product_ID = $db_handle->runQuery("SELECT p.product_ID, p.product_name, f.food_price, f.food_image FROM food f, product p WHERE f.product_ID = p.product_ID AND p.product_ID='" . $_GET["product_ID"] . "'");
			$itemArray = array($product_ID[0]["product_ID"]=>array('product_name'=>$product_ID[0]["product_name"], 'product_ID'=>$product_ID[0]["product_ID"], 'quantity'=>$_POST["quantity"], 'food_price'=>$product_ID[0]["food_price"], 'food_image'=>$product_ID[0]["food_image"]));

			if(!empty($_SESSION["cart_item"])) 
			{
				if(in_array($product_ID[0]["product_ID"],array_keys($_SESSION["cart_item"]))) 
				{
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($product_ID[0]["product_ID"] == $k) 
							{
								if(empty($_SESSION["cart_item"][$k]["quantity"])) 
								{
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else 
				{
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else 
			{
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["product_ID"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
        case "insert":
        $booking_ID =$_GET['booking_ID'];
        $room_ID    =$_GET['room_ID'];
        $guest_ID   =$_GET['ID'];
		$sql_order = "INSERT INTO `orders`( `room_ID`, `booking_ID`, `order_time`, `o_approve_by_admin`, `o_approve_time`, `order_status`,`order_done`) VALUES ($room_ID, $booking_ID,NOW(),0,0,'Pending',0);";
		$db_handle->runQuery_INSERT($sql_order);
		//underconstruction-----------------------
		$orderID = $db_handle->runQuery("SELECT MAX(order_ID) AS 'order_ID' FROM orders");
		 if (!empty($orderID)) { 
			foreach($orderID as $key=>$value){
                $order_ID = $orderID[$key]['order_ID'];	
                        foreach ($_SESSION["cart_item"] as $item){
                            $item_price = $item["quantity"]*$item["food_price"];
                            $product_ID = $item["product_ID"];
                            $quantity   = $item["quantity"];
                            
                            $sql_orderline = "INSERT INTO `order_line`( `order_ID`, `product_ID`, `quantity`, `subtotal`) VALUES ($order_ID,'$product_ID',$quantity,$item_price)";

                                $db_handle->runQuery_INSERT($sql_orderline);
                                    
                        }  
                        echo "
                        <script type=\"text/javascript\">
            
                        setTimeout(function() {
                            $.bootstrapGrowl(\"Order Sent!\", { type: 'success' });
                        }, 1000);
                            </script>";              
            }

            unset($_SESSION["cart_item"]);
		}
			
		//underconstruction-----------------------


	break;
	/*

	----------SAMPLE DATA INSERT----------
	INSERT INTO `orders`( `room_ID`, `order_time`, `o_approve_by_admin`, `o_approve_time`, `order_status`) VALUES (1,NOW(),0,0,'Not Approve');

	INSERT INTO `order_line`( `order_ID`, `product_ID`, `quantity`, `subtotal`) VALUES (1,'FD001',2,90.00);
	INSERT INTO `order_line`( `order_ID`, `product_ID`, `quantity`, `subtotal`) VALUES (1,'FOD002',2,138.00);
	*/
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
    <HTML>

    <HEAD>
        <TITLE>Create Order</TITLE>
        <link href="style.css" type="text/css" rel="stylesheet" />
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">

        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
					page. However, you can choose any other skin. Make sure you
					apply the skin class to the body tag so the changes take effect.
			-->
        <link rel="stylesheet" href="assets/dist/css/skins/skin-blue.min.css">

        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    </HEAD>

    <BODY>

        <div id="shopping-cart">

        </div>

        <div id="shopping-cart">
            <div class="footer">
                <a type="button" href="mobile_home.php?ID=<?php echo $_GET['ID']; ?>&booking_ID=<?php echo $_GET['booking_ID']; ?>&room_ID=<?php echo $_GET['room_ID']; ?>" class="btn btn-primary">Home</a>
            </div>

            <div class="txt-heading">Shopping Cart</div>

            <a id="btnEmpty" href="order_cart_mob.php?action=empty&ID=<?php echo $_GET['ID']; ?>&booking_ID=<?php echo $_GET['booking_ID']; ?>&room_ID=<?php echo $_GET['room_ID']; ?>">Empty Cart</a>
			<?php
					 if(isset($_SESSION["cart_item"])){
						$total_quantity = 0;
						$total_price = 0;
				?>
		    <form role="form" action="order_cart_mob.php?action=insert&ID=<?php echo $_GET['ID']; ?>&booking_ID=<?php echo $_GET['booking_ID']; ?>&room_ID=<?php echo $_GET['room_ID']; ?>" method="post" enctype="multipart/form-data">
                    <table class="tbl-cart" cellpadding="10" cellspacing="1">
                        <tbody>
                            <tr>
                                <th style="text-align:left;">Name</th>
                                <!--<th style="text-align:left;">Code</th>-->
                                <th></th>
                                <th style="text-align:right;" width="5%">Quantity</th>
                                <th style="text-align:right;" width="20%">Unit Price</th>
                                <th style="text-align:right;" width="20%">Price</th>
                                <th style="text-align:center;" width="20%">Remove</th>
                            </tr>
                            <?php		
									foreach ($_SESSION["cart_item"] as $item){
										$item_price = $item["quantity"]*$item["food_price"];
								?>
                                <tr>
                                    <td><!--<img src="<?php echo $item["food_image"] ?>" class="cart-item-image" />-->
                                        <?php echo $item["product_name"]; ?>
                                    </td>
                                    <!--<td>
                                        <?php echo $item["product_ID"]; ?>
                                    </td>-->
                                    <td></td>
                                    <td style="text-align:right;">
                                        <?php echo $item["quantity"]; ?>
                                    </td>
                                    <td style="text-align:right;">
                                        <?php echo "₱ ".$item["food_price"]; ?>
                                    </td>
                                    <td style="text-align:right;">
                                        <?php echo "₱ ". number_format($item_price,2); ?>
                                    </td>
                                    <td style="text-align:center;">
                                        <a href="order_cart_mob.php?action=remove&product_ID=<?php echo $item["product_ID"]; ?>&ID=<?php echo $_GET['ID']; ?>&booking_ID=<?php echo $_GET['booking_ID']; ?>&room_ID=<?php echo $_GET['room_ID']; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a>
                                    </td>
                                </tr>
                                <?php
												$total_quantity += $item["quantity"];
												$total_price += ($item["food_price"]*$item["quantity"]);
										}
										?>

                                    <tr>
                                        <td colspan="2" align="right">Total:</td>
                                        <td align="right">
                                            <?php echo $total_quantity; ?>
                                        </td>
                                        <td align="right" colspan="2"><strong><?php echo "₱ ".number_format($total_price, 2); ?></strong></td>
                                        <td></td>
                                    </tr>
                        </tbody>
                    </table>

                    <div class="box-body">

                        <div class="modal-footer">
                            <button type="submit" name="Submit" class="btn btn-primary" value="Submit">Create Order</button>
                        </div>

                    </div>
            </form>
            <?php
						} else {
						?>
                <div class="no-records">Your Cart is Empty</div>

                <?php 
							}
							?>
        </div>

        <div id="product-grid">

            <div class="txt-heading">Products</div>

            <?php
			$product_array = $db_handle->runQuery("SELECT p.product_ID, p.product_name, f.food_price, f.food_image FROM food f, product p WHERE f.product_ID = p.product_ID AND p.availability = 1 ORDER BY product_ID ASC");
			if (!empty($product_array)) { 
				foreach($product_array as $key=>$value){
			?>
                <div class="product-item">
                    <form method="post" action="order_cart_mob.php?action=add&product_ID=<?php echo $product_array[$key]["product_ID"]; ?>&ID=<?php echo $_GET['ID']; ?>&booking_ID=<?php echo $_GET['booking_ID']; ?>&room_ID=<?php echo $_GET['room_ID']; ?>">
                        <div class="product-image"><img width="250" height="150" src="<?php echo  $product_array[$key]["food_image"] ?>"></div>
                        <div class="product-tile-footer">
                            <div class="product-title">
                                <?php echo $product_array[$key]["product_name"]; ?>
                            </div>
                            <div class="product-price">
                                <?php echo "₱".$product_array[$key]["food_price"]; ?>
                            </div>
                            <div class="cart-action">
                                <input type="text" class="product-quantity" name="quantity" value="1" size="2" />
                                <input type="submit" value="Add to Cart" class="btnAddAction" />
                            </div>
                        </div>
                    </form>
                </div>

                <?php
				}
			}
			?>

        </div>
        
        <!-- jQuery 2.2.3 -->
        <script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="assets/plugins/jQuery/jquery-3.3.1.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/3.3.7/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="assets/dist/js/app.min.js"></script>
        <!-- FastClick -->
        <script src="assets/plugins/fastclick/fastclick.js"></script>
        <!-- toggle -->
        <script src="assets/js/bootstrap-toggle.js"></script>
        <!-- bootstrapt-growl -->
        <script src="assets/js/jquery.bootstrap-growl.js"></script>

    </BODY>

    </HTML>