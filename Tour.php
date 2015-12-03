<?php
	include('brain.php');
if(isset($_SESSION['email'])){
	echo "<h3>
	<form action='' method='post'>
		<input type='submit' name='ViewOrder' value='ViewOrder' />
	</form>
	</h3>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<script src="javascript.js"> </script>
	<link rel= "stylesheet" type="text/css" href="styleSheet.css" />
	</head>

  <body>
  <div>
    <a href = "Services.php">Back to Services</a>
  </div>

<?php

	$Service = getTour($_GET['TourID']);
    //if(!isset($Service)) { header('Location: Services.php'); }
  // echo $Service['TourID'];
if(!isset($_SESSION['email']))
{
	 echo 
    "<div>",
        "<h1>{$Service['name']} ($" . round($Service['price'], 2) . ")</h1>",
        "<img src='{$Service['image']}' style='width: 200px; height: 200px;' />",
        "<p>{$Service['description']}</p>",
    "</div>";
}
else
{
	 echo 
    "<div>",
        "<h1>{$Service['name']} ($" . round($Service['price'], 2) . ")</h1>",
        "<img src='{$Service['image']}' style='width: 200px; height: 200px;' />",
        "<p>{$Service['description']}</p>",
    "</div>";
}

?>

<br />

<p> Number of tickets: </p>
  <form action="" method="post">
    <input type="hidden" name="TourID" value="<?php echo $Service['TourID']; ?>" />
    <input type="text" name="quantity" />
    <input type="submit" name ="addtocart" value="Add to Cart" />
  </form>
  <br />
<?php

if(isset($_POST['addtocart']))
{
	addToCart($_POST['TourID'],$_POST['quantity']);
}


include("footer.php");

?>
	</body>
</html>
