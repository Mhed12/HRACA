<?php
// START THE SESSION
session_start();

// CONFIGURATION
require("backend/config.php");

// CONNECT TO DB
$pdo = new PDO(
	"mysql:host=$host;dbname=$dbname;charset=$charset", 
	$user, $password, [
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES   => false,
	]
);

// PROCESS REQUESTS
switch ($_POST['request']) {
	case "add":
		// ITEMS WILL BE STORED IN THE ORDER OF
		// $_SESSION['cart'][PRODUCT ID] = QUANTITY
		if (is_numeric($_SESSION['cart'][$_POST['product_id']])) {
			$_SESSION['cart'][$_POST['product_id']]++;
		} else {
			$_SESSION['cart'][$_POST['product_id']] = 1;
		}
		break;

	// THIS PART COULD BE DONE BETTER BUT I WILL JUST LEAVE IT AS TO SIMPLIFY THINGS
	case "show":
		// FETCH PRODUCTS
		$stmt = $pdo->query('SELECT p.product_id, p.product_name, f.food_image, fc.category_name, f.food_price FROM product p, food f, food_category fc WHERE p.product_id = f.product_id AND f.category_ID = fc.category_ID AND p.product_type ="food"');
		$products = array();
		while ($row = $stmt->fetch()){
			$products[$row['product_id']] = $row;
		}

		// SPIT OUT THE CART IN HTML
		$sub = 0;
		$total = 0; ?>
		<h1>MY CART</h1>
		<table class="table table-striped">
			<tr>
				<th>Qty</th>
				<th>Item</th>
				<th>Price</th>
			</tr>
			<?php
			foreach($_SESSION['cart'] as $id=>$qty) {
				// CALCULATE THE TOTALS
				$sub = $qty * $products[$id]['food_price'];
				$total += $sub;

				// THE PRODUCT
				printf("<tr><td><input id='qty_%u' onchange='qtyCart(%u);' type='text' value='%u'/></td><td>%s</td><td>$%0.2f</td></tr>",
					$id, $id, $qty,
					$products[$id]['product_name'],
					$sub
				);
			}
			?>
			<tr>
				<td></td>
				<td><strong>Grand Total</strong></td>
				<td><strong>$<?=$total?></strong></td>
			</tr>
			<?php if($total>0){ ?>
			<tr>
				<td colspan="2"></td>
				<td>
					Name: <input type="text" id="co_name"/><br><br>
					Email: <input type="text" id="co_email"/><br><br>
					<input type="button" class="btn btn-success" value="Checkout" onclick="cartCheckout();"/>
				</td>
			</tr>
			<?php } ?>
		</table>
		<?php
		break;

	case "qty":
		if ($_POST['qty']==0) {
			unset($_SESSION['cart'][$_POST['product_id']]);
		} else {
			$_SESSION['cart'][$_POST['product_id']] = $_POST['qty'];
		}
		break;

	// NO ERROR & SECURITY CHECKS IN THIS SIMPLE EXAMPLE...
	// BEEF UP THIS SECTION IF YOU WANT
	case "checkout":
		// CREATE THE ORDER
		//INSERT INTO `orders`( `room_ID`, `order_time`, `o_approve_by_admin`, `o_approve_time`, `order_status`) VALUES (1,NOW(),0,0,'Not Approve');
		$sql = sprintf("INSERT INTO `orders` (`room_ID`, `order_time`, `o_approve_by_admin`, `o_approve_time`, `order_status`) VALUES ('%s', NOW(),0,0,'Not Approve')", 
			$_POST['name']
		);
		$pdo->exec($sql);
		$last_id = $pdo->lastInsertId();

		// INSERT THE ITEMS
		//INSERT INTO `order_line`( `order_ID`, `product_ID`, `quantity`, `subtotal`) VALUES (1,'FD001',2,90.00);
		$sql = "INSERT INTO `order_line` (`order_id`, `product_ID`, `quantity`) VALUES ";
		foreach ($_SESSION['cart'] as $id=>$qty) {
			$sql .= sprintf("(%u,%u,%u),", $last_id, $id, $qty);
		}
		$sql = substr($sql,0,-1);	// STRIP LAST COMMA
		$sql .= ";";
		$pdo->exec($sql);

		// CLEAR OUT THE CURRENT CART
		$_SESSION['cart'] = array();
		break;
}
?>