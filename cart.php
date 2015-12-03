<?php
	include('brain.php');
	
if(isset($_SESSION['email'])){
	echo "<h3>
	<form action='' method='post'>
		<input type='submit' name='ViewOrder' value='ViewOrder' />
	</form>
	</h3>";
}
	if(isset($_POST['clearcart']))
	{
		resetCart();
	}
	if(isset($_POST['update']))
	{
		if($_POST['updateQuantity'] > 0)
			$_SESSION['cart'][$_POST['pid']] = $_POST['updateQuantity'];
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>La Cart</title>
    </head>
    <body>
	<div>
	<font color="white">
<?php

  $cart = $_SESSION['cart'];
  @$updateQuantity = $_POST['updateQuantity'];
	if(empty($cart))
	{
	  echo "Your Cart is Empty, Go look for a tour!";
	}
	else{
	
		echo
		'<table style="font-size:30px " align="center"> ',

			"<tr> ",
				"<th> <FONT COLOR='#FFFFFF'>NAME &nbsp;&nbsp;</th>",
				
				"<th> <FONT COLOR='#FFFFFF'>Quantity &nbsp;&nbsp;</th>",
				
				"<th> <FONT COLOR='#FFFFFF'>Price &nbsp;&nbsp;</th>",
				
				"<th> <FONT COLOR='#FFFFFF'>Sub-Total &nbsp;&nbsp;</th>",
			"</tr>";
		
		foreach($cart as $TourID => $quantity)
		{
			echo "<form method = 'post' action = ' {$_SERVER['PHP_SELF']}'>";
			$Service = getTour($TourID);
			if(!isset($_SESSION['email']))
			{
				$subTotal = $Service['price'] * $quantity;
			}
			else
			{
				$subTotal = $Service['price'] * $quantity;
			}
			echo 
			"<tr>",
				"<td> <FONT COLOR='#FFFFFF'> ".$Service['name']." &nbsp;&nbsp;</td>",
				
				"<td> <FONT COLOR='#FFFFFF'> <input type = 'text' name='updateQuantity' value='$quantity'>
				<input type='submit' name = 'update' value = 'Update'><input type='hidden' name = 'pid' value = '$TourID' /></td></form>";
				
				
				
				
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
	}
	
?>
	<br /> <br /> <br /> <br /> <br /> <br /> <br />
	<?php if(!empty($cart)){ ?>
	<form action="" method="post">
		<input type="submit" name="clearcart" value="Clear Cart" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" name="checkout" value="Pay Now" />
	</form>
	<?php } ?>
</font>

<?php
include("footer.php");
?>
</div>
    </body>
</html>
