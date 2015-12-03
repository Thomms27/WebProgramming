<?php
include('brain.php');
?>
<!DOCTYPE html>
<html>
  <head>
	<script src="javascript.js"> </script>
    <link rel= "stylesheet" type="text/css" href="styleSheet.css" />
    </head>
  <body>
    <div>
	<?php
	//include ('paynow.php');
	//$firstName = $_GET['firstName'];
	$cart = $_SESSION['cart'];
	$Total;
	$firstName = $_SESSION['fName'];
	$lastName = $_SESSION['lName'];
	$address = $_SESSION['theAddress'];
	$email = $_SESSION['theEmail'];
	$phone = $_SESSION['thePhone'];
	$deliveryMethod = $_SESSION['deliveryMethod'];
	
	echo "<h4>";
	echo "First Name:   "  , $firstName;
	echo "<br />";
	echo "Second Name:   " , $lastName;
	echo "<br />";
	echo "Address:   " , $_SESSION['theAddress'];
	echo "<br />";
	echo "Email Address:   " , $_SESSION['theEmail'];
	echo "<br />";
	echo "Phone Number:   " , $_SESSION['thePhone'];
	echo "<br />";
	echo "Selected Delivery Method:   " , $_SESSION['deliveryMethod'];
	
	
	echo "<br /><br /> Order Details: ";
	echo "</h4>";
		echo
		'<table style="font-size:30px " align="center"> ',
			"<tr> ",
				"<th> <FONT COLOR='#FFFFFF'>NAME   &nbsp;&nbsp;</th>",
				
				"<th> <FONT COLOR='#FFFFFF'>Quantity &nbsp;&nbsp;</th>",
				
				"<th> <FONT COLOR='#FFFFFF'>Price &nbsp;&nbsp;</th>",
				
				"<th> <FONT COLOR='#FFFFFF'>Sub-Total &nbsp;&nbsp;</th>",
			"</tr>";
	
		foreach($cart as $TourID => $quantity)
		{
			$Service = getTour($TourID);
			if(!isset($_SESSION['email']))
			{
				$subTotal = $Service['price'] * $quantity;
				$Total += $subTotal;
			}
			else
			{
				$subTotal = $Service['price'] * $quantity;
				$Total += $subTotal;
			}
			echo 
			"<tr>",
				"<td> <FONT COLOR='#FFFFFF'> ".$Service['name']." &nbsp;&nbsp;</td>",
				
				"<td> <FONT COLOR='#FFFFFF'> $quantity</td>";
				
				
				if(!isset($_SESSION['email']))
				{
					echo 
					"<td> <FONT COLOR='#FFFFFF'> $" . round($Service['price'],2) ." &nbsp;&nbsp;</td>";
				}
				else
				{
					echo
					"<td> <FONT COLOR='#FFFFFF'> $" . round($Service['price'],2) ." &nbsp;&nbsp;</td>";
				}
				echo
				"<td> <FONT COLOR='#FFFFFF'> $" . round($subTotal,2) ."&nbsp;&nbsp;</td>",
			"</tr>";
		}
	echo "</table>";
	echo "<h1>Total Amount : $", $Total , "</h1>";
	?>
	----------------------------------------------------------------------------------------------------
	<?php
	$file = fopen("order.txt","w");
	fwrite($file,"Name:  ");
	fwrite($file, $firstName);
	fwrite($file, "-");
	fwrite($file, $lastName);
	fwrite($file, " \r\n");
	fwrite($file, "Address: ");
	 fwrite($file, $address);
	 fwrite($file, " \r\n");
	 fwrite($file, "Email Address: ");
	 fwrite($file, $email);
	 fwrite($file, " \r\n");
	 fwrite($file, "Phone Number: ");
	 fwrite($file, $phone);
	 fwrite($file, " \r\n");
	 fwrite($file, "Delivery Method :  ");
	 fwrite($file, $deliveryMethod);
	 fwrite($file, " \r\n");
	 fwrite($file, "Total Amount : $ ");
	 fwrite($file, $Total);
	 fwrite($file, " \r\n");
	 fwrite($file, " \r\n");
	 fwrite($file, "Order Details: \r\n");
	
	foreach($cart as $TourID => $quantity)
	{
		$Service = getTour($TourID);
		fwrite($file, $Service['name']);
		fwrite($file, " - ");
		fwrite($file,$quantity);
		fwrite($file, "Tickets");
		fwrite($file, " \r\n");
	}
	fclose($file);
	echo "View Order Details in Order.txt";
	resetCart();
	
	include("footer.php");
	
	?>
	</div>
  </body>
</html>
