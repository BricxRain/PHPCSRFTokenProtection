<?php
	session_start();
	require_once 'token.php';

	if (isset($_POST['quantity'], $_POST['product'])) {
		$product = $_POST['product'];
		$quantity = $_POST['quantity'];

		if (!empty($product) && !empty($quantity)) {
			if (Token::check($_POST['token'])) {
				echo "ORDER SUCCESFULLY";
			} else {
				echo "BLOCKED";
			}
		}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>CSRF PROTECTION</title>
</head>
<body>
	<form action="" method="post">
		<div class="product">
			<strong>A Product</strong>
			<div class="field">
				Quantity: <input type="text" name="quantity">
			</div>
			<input type="submit" name="" value="Order">
			<input type="hidden" name="product" value="1">
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
		</div>
	</form>
</body>
</html>