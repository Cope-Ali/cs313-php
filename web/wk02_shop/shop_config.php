<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "wk02_shop/browse.php":
			$CURRENT_PAGE = "Browse"; 
			$PAGE_TITLE = "Browse - Find the chicken of your DREAMS!";
			break;
		case "shoppingcart.php":
			$CURRENT_PAGE = "Cart"; 
			$PAGE_TITLE = "Your Shopping Cart - Great Choice!";
			break;
		default:
			$CURRENT_PAGE = "Checkout";
			$PAGE_TITLE = "Checkout - Make them YOURS!";
	}
?>