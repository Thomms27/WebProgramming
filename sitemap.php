<?php
	
	include('brain.php');
	
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Services</title>
    </head>
    <body>

<?php

$f = scandir(getcwd());
echo "<h2>";
foreach($f as $i)
{
	if(preg_match("/.php$/i", $i))
	{
		if(preg_match("/^Services/i", $i) || 
		   preg_match("/^Index/i", $i) ||
		   preg_match("/^Contact/i", $i) ||
		   preg_match("/^cart/i", $i) ||
		   preg_match("/^viewOrder/i", $i)){
		echo "<p>",
			"<a href= ",
			 $i,
			 ">";
		echo $i;
		echo "</a></p>";
		}
	}
}
echo "</h2>";

?>
	
    </body>
</html>
