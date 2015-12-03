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
        <title>Services</title>
    </head>
    <body>
    
<?php
    $Services = $_SESSION['Services'];
	
if(!isset($_SESSION['email']))
{
    foreach($Services as $Service)
    {
        echo 
        "<div>",
            "<h1>{$Service['name']} ($" . round($Service['price'], 2) . ")</h1>",
            "<a href='Tour.php?TourID={$Service['TourID']}'><img src='{$Service['image']}' style='width: 100px; height: 100px;' /></a>",
            "<p>{$Service['description']} <a href='Tour.php?TourID={$Service['TourID']}'>See More</a></p>",
        "</div>";
    }
}

else
{
    foreach($Services as $Service)
    {
        echo 
        "<div>",
            "<h1>{$Service['name']} ($" . round($Service['price'], 2) . ")</h1>",
            "<a href='Tour.php?TourID={$Service['TourID']}'><img src='{$Service['image']}' style='width: 100px; height: 100px;' /></a>",
            "<p>{$Service['description']} <a href='Tour.php?TourID={$Service['TourID']}'>See More</a></p>",
        "</div>";
    }
}

include("footer.php");
?>

    </body>
</html>
