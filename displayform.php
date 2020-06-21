<?php
session_start();
if (isset($_SESSION["id"])) {
	$ind = $_SESSION["id"];
}
$fname = $lname = $email = $add = $phone = $state = $city = $zip = $payment = $total = $orderno = $code = " ";
$one = rand(100, 500);
$two = rand(500, 1000);
$orderno = $one + $two;
$_SESSION["orderno"] = $orderno;
$fname = $_SESSION["firstname"];
$lname = $_SESSION["lastname"];
$email = $_SESSION["email"];
$add = $_SESSION["address"];
$phone = $_SESSION["phone"];
$state = $_SESSION["state"];
$city = $_SESSION["city"];
$zip = $_SESSION["zip"];
$payment = $_SESSION["payment"];
?>

<!DOCTYPE html>
<html>

<head>
</head>

<body>
	<?php
	if (isset($_SESSION["username"])) {
	?>
		<img src="product-images/print.png" onclick="window.print()" >

		<h2>Your Details </h2>

		<div class="row">
			<div class="col-75">
				<div class="container">
					<form action="thankyouform.php">

						<div class="row">
							<div class="col-50">

								<h3>Billing Details</h3>


								<table class="tbl-cart" cellpadding="10" cellspacing="1" border="1px">
									<tbody>
										<tr>
											<th style="text-align:left;">Product Name</th>
											<th style="text-align:left;">Code</th>
											<th style="text-align:right;" width="5%">Quantity</th>
											<th style="text-align:right;" width="10%">Unit Price</th>
											<th style="text-align:right;" width="10%">Amount</th>
										</tr>
										<?php
										$total_quantity = 0;
										$total_price = 0;
										foreach ($_SESSION["cart_item"][$ind] as $item) {
											if ($item["code"] == $_SESSION["fincode"]) {
												$item_price = $item["quantity"] * $item["price"];
										?>
												<tr>
													<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
													<td><?php echo $item["code"]; ?></td>
													<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
													<td style="text-align:right;"><?php echo "Rs. " . $item["price"]; ?></td>
													<td style="text-align:right;"><?php echo "Rs. " . number_format($item_price, 2); ?></td>
												</tr>
										<?php
												$total_quantity += $item["quantity"];
												$total_price += ($item["price"] * $item["quantity"]);
												$_SESSION["total"] = $total_price;
												$_SESSION["code"] = $_SESSION["fincode"];
												foreach ($_SESSION["cart_item"][$ind] as $k => $v) {
													if ($_SESSION["fincode"] == $k)
														unset($_SESSION["cart_item"][$ind][$k]);
												}
											}
										}
										?>

										<tr>
											<td colspan="2" align="right"><b>Total:</b></td>
											<td align="right"><?php echo $total_quantity; ?></td>
											<td align="right" colspan="2"><strong><?php echo "Rs. " . number_format($total_price, 2); ?></strong></td>

										</tr>
									</tbody>
								</table>
								<br>
								<br>

								<label for="fname"><i class="fa fa-user"></i> First Name</label>
								<input type="text" id="fname" name="firstname" placeholder="<?php echo $fname; ?>" disabled>
								<label for="lname"><i class="fa fa-user"></i> Last Name</label>
								<input type="text" id="lname" name="lastname" placeholder="<?php echo $lname; ?>" disabled>
								<label for="email"><i class="fa fa-envelope"></i> Email</label>
								<input type="text" id="email" name="email" placeholder="<?php echo $email; ?>" disabled>
								<label for="ph">Phone Number</label>
								<input type="text" id="ph" name="phone" placeholder="<?php echo $phone; ?>" disabled>
								<label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
								<input type="text" id="adr" name="address" placeholder="<?php echo $add; ?>" disabled>
								<label for="state"><i class="fa fa-institution"></i> State</label>
								<input type="text" id="state" name="state" placeholder="<?php echo $state; ?>" disabled>
								<label for="state">City</label>
								<input type="text" id="city" name="city" placeholder="<?php echo $city; ?>" disabled>
								<label for="zip">Zip</label>
								<input type="text" id="zip" name="zip" placeholder="<?php echo $zip; ?>" disabled>
								<label for="payment">Payment Mode</label>
								<input type="text" name="payment" placeholder="<?php echo $payment; ?>" disabled>
							</div>
						</div>



						<input type="submit" value="Place Order" onclick="alert('Your order has been placed successfully!!!\n Your order number is: <?php echo $_SESSION['orderno'] ?>')" class="btn"></a>
					</form>
				</div>
			</div>

		<?php
	} else {
		echo "<center><h1>Please login first .</h1></center>";
		?>
			<center><a href="login.php">Click here to login</a></center>
		<?php
	}
		?>

		<?php
		$total = $_SESSION["total"];
		$code = $_SESSION["code"];
		if (!empty($fname) && !empty($email) && !empty($add) && !empty($phone) && !empty($state) && !empty($city) && !empty($zip) && !empty($payment) && !empty($total) && !empty($orderno) && !empty($code)) {

			$host = "localhost";
			$dbusername = "root";
			$dbpassword = "";
			$dbname = "artgallery";


			// Create connection
			$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
			if (mysqli_connect_error()) {
				die('Connect Error (' . mysqli_connect_errno() . ') '
					. mysqli_connect_error());
			} else {

				$sql = "INSERT INTO billing (firstname, lastname, email, address, phone, state, city, zip, payment, procode, total, orderno) VALUES ( '$fname', '$lname', '$email', '$add', '$phone', '$state', '$city', '$zip', '$payment', '$code', '$total', '$orderno' )";
				mysqli_query($conn, $sql);
			}
		}
		?>
</body>

</html>