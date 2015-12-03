<?php
  include('brain.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <script src="javascript.js"> </script>
    <link rel= "stylesheet" type="text/css" href="styleSheet.css" />
    <style>
      .error {color: #FF0000; margin: 0;}
    </style>
  </head>
  <body>
<?php
  // define variables and set to empty values
  $firstName = $lastName = $address = $email = $phone = $deliveryMethod = "";
  $firstNameErr = $lastNameErr = $addressErr = $emailErr = $phoneErr = $deliveryMethodErr = "";
  $cardNum = "";
  $cardNumErr = "";
  
  // changes once a non valid thing pops up
  $isValid = true;
	
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["firstName"])) {
		  $firstNameErr = "First Name is required";
		  $isValid = false;
		} else {
		  $firstName = test_input($_POST["firstName"]);
		  $_SESSION['fName'] = $firstName;
				if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
				  $firstNameErr = "Only letters and white space allowed"; 
				  $isValid = false;
				}
		  }
		if (empty($_POST["lastName"])) {
		  $lastNameErr = "Last Name is required";
		  $isValid = false;
		} else {
		  $lastName = test_input($_POST["lastName"]);
		  $_SESSION['lName'] = $lastName;
				if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
				  $lastNameErr = "Only letters and white space allowed"; 
				  $isValid = false;
				}
		  }
  	if (empty($_POST["address"])) {
	  	$addressErr = "Address is required";
		$isValid = false;
	  } else {
		  $address = test_input($_POST["address"]);
		  $_SESSION['theAddress'] = $address;
	  }
	  if (empty($_POST["email"])) {
	    $emailErr = "Email is required";
		$isValid = false;
	  } else {
	      $email = test_input($_POST["email"]);
	      $_SESSION['theEmail'] = $email;
	      if (!preg_match("/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/",$email)) {
	        $emailErr = "Invalid email format"; 
			$isValid = false;
	      }
	    }
	  if (empty($_POST["phone"])) {
	    $phoneErr = "Phone Number is required";
		$isValid = false;
	  } else {
	    $phone = test_input($_POST["phone"]);
	    $_SESSION['thePhone'] = $phone;
	    if (!preg_match("/^[0-9\(\)\/\+ \-]*$/",$phone)) {
	      $phoneErr = "Invalid phone number!"; 
		  $isValid = false;
	    }
	  }
	  if (empty($_POST["deliveryMethod"])) {
	    $deliveryMethodErr = "Delivery Method is required";
		$isValid = false;
	  } else {
	    $deliveryMethod = test_input($_POST["deliveryMethod"]);
	    $_SESSION['deliveryMethod'] = $deliveryMethod;
	  }
	  if (empty($_POST["cardNum"])) {
	    $cardNumErr = "card number is required";
		$isValid = false;
	  } else {
	    $cardNum = test_input($_POST["cardNum"]);
	    $_SESSION['cardNum'] = $cardNum;
	    if (!preg_match("/^([0-9][ ]*){13,18}$/",$cardNum)) {
	      $cardNumErr = "Invalid credit card number"; 
		  $isValid = false;
	    }
		
	  }
    if(isset($_POST['paynowSubmit']) && $isValid == true){
        header("Location: receipt.php");
    }
	}
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	?>
	<div>
	  <a href = "Services.php">Back to Services</a>
	</div>
	<div>
	  <p><span class="error">* required field.</span></p>
	
	  <!-- JAVASCRIPT Validation is linked to javascript.js -->
	  <form name = "myForm" method="post" onsubmit="return validateForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	
	  <p> First Name: <br /><input type="text" name="firstName" value="<?php 
	  if(isset($_SESSION['email']))
	  {
	    echo $_SESSION['firstName'];
	  }
	  else
	  {
	    echo $firstName;
	  } ?>">
	  <span class="error">* <?php echo $firstNameErr;?></span></p>
	  <br />
	
	  <p> Last Name: <br /><input type="text" name="lastName" value="<?php 
	  if(isset($_SESSION['email']))
	  {
	    echo $_SESSION['lastName'];
	  }
	  else
	  {
	    echo $lastName;
	  } ?>"> 
	  <span class="error">* <?php echo $lastNameErr;?></span></p>
	  <br />
	
	  <p> Address: <span class="error">* <?php echo $addressErr;?>
	  <br /><textarea class="FormElement" name="address" id="address" cols="40" rows="4"><?php echo $address;?></textarea> 
	  </p>
	
	
	  <p> Email: <br /><input type="text" name="email" value="<?php 
	  if(isset($_SESSION['email']))
	  {
	    echo $_SESSION['email'];
	  }
	  else
	  {
	    echo $email;
	  } ?>"> 
	  <span class="error">* <?php echo $emailErr;?></span></p>
	  <br />
	
	  <p> Phone: <br /><input type="text" name="phone" value="<?php 
	  if(isset($_SESSION['email']))
	  {
	    echo $_SESSION['phone'];
	  }
	  else
	  {
	    echo $phone;
	  } ?>"> 
	  <span class="error">* <?php echo $phoneErr;?></span></p>
	  <br />
	  
	  <p> Delivery Method :<br />
	  <input type="radio" name="deliveryMethod" 
	  <?php if (isset($deliveryMethod) && $deliveryMethod=="regularPost") echo "checked";?>
	  value="regularPost"> Regular Post
	  <input type="radio" name="deliveryMethod" 
	  <?php if (isset($deliveryMethod) && $deliveryMethod=="Courier") echo "checked";?>
	  value="courier"> Courier
	  <input type="radio" name="deliveryMethod" 
	  <?php if (isset($deliveryMethod) && $deliveryMethod=="expressCourier") echo "checked";?>
	  value="expressCourier"> Express Courier
	  <span class="error">* <?php echo $deliveryMethodErr;?></span>
	  <br /> <br />
	  
	  <p> Credit Card Number : <br /><input type="text" name="cardNum" value="<?php echo $cardNum;?>"> 
	  <span class="error">* <?php echo $cardNumErr;?></span></p>
	  <p> Credit Card Expiry Date: <br />
	  <select name="month" id="month" onchange="" size="1">
	  <option value="01">January</option>
	  <option value="02">February</option>
	  <option value="03">March</option>
	  <option value="04">April</option>
  	<option value="05">May</option>
  	<option value="06">June</option>
  	<option value="07">July</option>
  	<option value="08">August</option>
  	<option value="09">September</option>
  	<option value="10">October</option>
  	<option value="11">November</option>
  	<option value="12">December</option>
  	</select>
  	<select name="year" id="year" onchange="" size="1">
  	<option value="2014">2014</option>
  	<option value="2015">2015</option>
  	<option value="2016">2016</option>
  	<option value="2017">2017</option>
  	<option value="2018">2018</option>
  	<option value="2019">2019</option>
  	<option value="2020">2020</option>
  	</select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  	Please sign me up for the newsletter 
  	<input type="checkbox" name="newsletter" value="Yes" /></p>
  	<br /> <br /> <br />
  	<input type="submit" name="paynowSubmit" value="Submit"> 
	</form>
	
	<?php
		include("footer.php");
	?>
	
	</div>
	</body>
	</html>
