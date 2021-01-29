<?php
/*Kada popunimo stranu za registraciju*/
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includer.php';?>

<div class="error">
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$_SESSION['input_username'] = $_POST['input_username'];

	$insertedUsername = $_POST['input_username'];
	$unlength = strlen($insertedUsername);
	if ($unlength < 4 || $unlength > 12){ 
		echo "Username mora da sadrzi od 4 do 12 karaktera.";
		header("Refresh:3; register.php");
	} else { 

	$insertedPassword = $_POST['input_password'];
	$cryptedPassword = crypt($insertedPassword, "abc");
	$pwlength = strlen($insertedPassword);
	if ($pwlength < 4 || $pwlength > 15){ 
		echo "Password mora da sadrzi od 4 do 15 karaktera.";
		header("Refresh:3; register.php");
	} else { 


		$stmtCheckUsername->execute();
		$stmtCheckUsername->bind_result($result);
		$stmtCheckUsername->store_result();
		$stmtCheckUsername->fetch();
	if ($stmtCheckUsername->num_rows > 0) {
				echo "<br> Username: ''" . $result . "''  vec postoji.<br><br>Pokusajte ponovo.<br>";
				header("Refresh:4; register.php");
		} else 

	
	if ( $_POST['input_password'] === $_POST['input_passwordagain']) { 

		if ($stmtRegister->execute()) { 
		  echo "Vas nalog je uspesno kreiran.<br><br>Prijavite se.";
			header("Refresh:3; login.php");
		} else {
		  echo "Greska.";
			header("Refresh:4; register.php");
		}

	} else {
				echo  "<br> Password se ne poklapa.<br><br>Pokusajte ponovo.";
				$_SESSION['input_passwordagain_error'] = "Your passwords do not match.";
				header("Refresh:3; register.php");
	}}}

} else { header("Location: login.php"); }

?>
</div>

</html>
