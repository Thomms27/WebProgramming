<?php
  session_start();
  session_destroy(); 
  // Check if the session is set and return the appropriate message
  if (isset($_SESSION['username'])) { 
        $msg = "You are now logged out";
  } else {
	  $msg = "<h2>Could not log you out</h2>";
  } 
?> 
<html>
  <body>
<?php echo $msg; ?><br>
  <p><a href="/login-test">Click here</a> to return to our home page </p>
</body>
