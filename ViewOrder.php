<?php
	include('brain.php');
	
	// Once user logs out, is redirected to index.php
	if(!isset($_SESSION['email']))
	{
		header("Location: index.php");
	}
	
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View Order</title>
    </head>
    <body>
<?php
	//-- FILE READING
	$lines = file("order.txt");
	for($i=0; $i<count($lines); $i++)
	{
		$cell = $lines[$i];
		echo "<p>",
			$cell,
			"</p>";
	}
	
?>
    </body>
</html>
