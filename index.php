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
  <body>
	  <div>
	
			<h3>
					We the people at "The Golden Spacetour" are here with an <br/>
					opportunity of a lifetime for you!!!<br/>
					Come explore the vastness of our Solar System<br/>
					and see what's the big deal with all these planets.<br/>
					Travel in our new spaceships, fit for a certain amount<br/>
					of people we have not yet calculated. Seriously, this ship<br/>
					is like a bottomless bag of peanuts. <br/>
			</h3>
				
				
				<p><strong> Want to tour? </strong> come for any <em>Planets</em> you like!</p>
				<p> <a href="Contact.html">Terms and Conditions applies!</a></p> 
					<hr/>
		</div>
    <div>
<?php
      include("footer.php");
?>
    </div>
  </body>
</html>
