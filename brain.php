<?php
		session_start();
		function loadTour()
		{
      if(isset($_SESSION['email'])){
		    $Services = array(
			    't001' => array(
			    'TourID' =>"t001",
			    'name' => "Mars Tour",
				'price'=>100000 * (100 - $_SESSION['discount1']) / 100,
			    'people' => 1,
			    'duration' => 1,
			    'image' => 'Mars.jpg',
			    'description' => 'The Red Planet, kind of looks like an orange...')
			    ,
			    't002' => array(
			    'TourID' =>"t002",
			    'name' => "Moon Tour",
				'price'=> 50000 * (100 - $_SESSION['discount2']) / 100,
			    'people' => 1,
			    'duration' => 1,
			    'image' => 'Moon.jpg',
			    'description' => 'This is Description for Moon Tour!')
			    ,
			    't003' => array(
			    'TourID' =>"t003",
			    'name' => "Pluto Tour",
				'price'=>250000 * (100 - $_SESSION['discount3']) / 100,
			    'people' => 1,
			    'duration' => 1,
				'image' => 'Pluto.jpg',
			    'description' => 'Pluto is not considered a planet')
		    );
    }
    else{
   $Services = array(
			    't001' => array(
			    'TourID' =>"t001",
			    'name' => "Mars Tour",
			    'price'=> 100000,
				  'people' => 1,
			    'duration' => 1,
			    'image' => 'Mars.jpg',
			    'description' => 'The Red Planet, kind of looks like an orange...')
			    ,
			    't002' => array(
			    'TourID' =>"t002",
			    'name' => "Moon Tour",
			    'price' => 50000,
				  'people' => 1,
			    'duration' => 1,
			    'image' => 'Moon.jpg',
			    'description' => 'This is Description for Moon Tour!')
			    ,
			    't003' => array(
			    'TourID' =>"t003",
			    'name' => "Pluto Tour",
			    'price' => 250000,
				  'people' => 1,
			    'duration' => 1,
				'image' => 'Pluto.jpg',
			    'description' => 'Pluto is not considered a planet')
		    );
    }
        $_SESSION['Services'] = $Services;
		    //echo $Services['MarsTour']['duration'];
		}
		loadTour();
		
		function resetTour()
		{
			unset($_SESSION['Services']);
			loadTour();
		}

		function getTour($TourID)
		{
			return $_SESSION['Services'][$TourID];
		}
		
		
		function logoutUser()
		{
			unset($_SESSION['email']);
			unset($_SESSION['password']);
			unset($_SESSION['firstName']);
			unset($_SESSION['secondName']);
			resetTour();
		}
		
		
		function loadCart()
		{
			if(!isset($_SESSION['cart']))
			{
				$_SESSION['cart'] = array();
			}
		}
		loadCart();

		function addToCart($TourID, $quantity)
		{
			if($quantity <= 0)
			{
				removeFromCart($TourID);
				return;
			}
			$_SESSION['cart'][$TourID] = $quantity;
		}

		function removeFromCart($TourID)
		{
			unset($_SESSION['cart'][$TourID]);
		}

		function resetCart()
		{
			unset($_SESSION['cart']);
			loadCart();
		}
		if(isset($_POST['checkout']))
    {
		  header("Location: paynow.php");
    }		

?>
 
<!DOCTYPE html>
<html>
<head>
<title>Golden spacetour</title>
	<link rel= "stylesheet" type="text/css" href="styleSheet.css" />
	
<meta charset="UTF-8">
<title>login system</title>

</head>

<body>

		<div id="container">
			<div>
				<img src="Solar_System.png" alt = 'Solar_System'/> <br /> 
			</div>
				<div class="index">
					<h1>The Golden Spacetour!</h1>
			
		<div id="navigation">
			<h2><a href="index.php">Main Menu</a> |
				<a href="Services.php">Services</a> | 
				<a href="Contact.php">Contact us</a> |
				<a href="cart.php">Cart</a> </h2>
		</div>

		
	</div>
		</div>
<?php
if(isset($_POST['email']) && isset($_POST['password']) && count($_POST) > 0)
{
	$lines = file("customers.txt");
	for($i=1; $i<count($lines); $i++)
	{
		$cells = explode("\t", $lines[$i]);
		$cells[0] = trim($cells[0]); // First Name
		$cells[1] = trim($cells[1]); // Last Name
		$cells[2] = trim($cells[2]); // eMail
		$cells[3] = trim($cells[3]); // password RAW
		$cells[4] = trim($cells[4]); // password MD5
		$cells[5] = trim($cells[5]); // Phone
		$cells[6] = trim($cells[6]); // Discount 1
		$cells[7] = trim($cells[7]); // Discount 2
		$cells[8] = trim($cells[8]); // Discount 3
		
		// this is where if user puts correct email and password
		$passmd5 = md5($_POST['password']);
		if($cells[2] == $_POST['email'] && $cells[4] == $passmd5 )
		{
      $_SESSION['email'] = $_POST['email'];
			//$firstName = $cells[0];
			//$secondName = $cells[1];
			$_SESSION['firstName'] = $cells[0];
			$_SESSION['lastName'] = $cells[1];
			$_SESSION['email'] = $cells[2];
			$_SESSION['phone'] = $cells[5];
			//header("Location:user.php");
			$_SESSION['discount1'] = $cells[6]; //Discount 1
			$_SESSION['discount2'] = $cells[7]; //Discount 2
			$_SESSION['discount3'] = $cells[8]; //Discount 3
		}
	}
}

if(isset($_POST['Logout']))
{
	logoutUser();
}

if(!isset($_SESSION['email']))
{
    // this is where if incorrect info provided
	echo "<form method = 'post' action = ' {$_SERVER['PHP_SELF']}'>";
	echo (!isset($_POST['email'])) ? "" : "<p class = 'error'> Oops, Wrong user name or password! </p>";
	echo "
	    
		<p>Email: 
		<input type = 'text' name='email' value=''> 
		&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		Password: 
		<input type = 'password' name='password' value=''> 
        &nbsp 
		<input type='submit' value = 'Submit'></p>
		</form>";
}


if(!isset($_SESSION['email']))
{
		$_SESSION['discount1'] = 1.0; //Discount 1
		$_SESSION['discount2'] = 1.0; //Discount 2
		$_SESSION['discount3'] = 1.0; //Discount 3
}

if(isset($_SESSION['email']))
{
echo "<h3> Hello! &nbsp";
echo $_SESSION['firstName'];
echo "&nbsp ";
echo $_SESSION['lastName'];

echo "
    <form action='' method='post'>
		<input type='submit'  name = 'Logout' value='Logout' />
	</form>
	";
echo "</h3>";	
}
	
?>
		</body>
</html>
