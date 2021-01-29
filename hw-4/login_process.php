<?php
/* Pokrece se kada se popuni login strana*/
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includer.php';?>

<div class="error">
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {


$myusername = $_POST['login_username'];
$mypassword = $_POST['login_password'];
$mycrypt = crypt($mypassword, "abc");

  $stmtLogin->execute();
  $stmtLogin->bind_result($result);
  $stmtLogin->store_result();
  $stmtLogin->fetch();
  if ($stmtLogin->num_rows > 0) {
    $_SESSION['sessionID'] = $result;
    setcookie('sessionID', $result, time() + (60 * 60 * 24 * 30)); 
    echo "Uspesno ste se prijavili.<br><br>Otvaranje...";
    header("Refresh:2; list.php");
  } else {
    echo "Pogresno korisnicko ime ili lozinka.<br><br>Pokusajte ponovo.";
    header("Refresh:2; login.php");
  }

} else { header("Location: login.php"); }

?>
</div>

</html>
