<?php
/*Kada se korisnik odjavljuje */
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includer.php';?>

<div class="error">
<?php

   
   if (isset($_SESSION['sessionID'])) {

	   
	   $_SESSION = array();

	   
	   if (isset($_COOKIE[session_name()])) {
	   setcookie(session_name(), '', time() - 3600);
	   }

	   
	   session_destroy();
   }

   
   setcookie('sessionID', '', time() - 3600);

   
    echo "Odjavljivanje...";
    header("Refresh:2; login.php");

?>
</div>

</html>
