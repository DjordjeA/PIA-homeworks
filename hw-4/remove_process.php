<?php
/* Kada brisemo film iz baze*/
?>

<!DOCTYPE html>
<html lang="en">
<?php
include 'includer.php';
include 'session_checker.php';
?>

<div class="error">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $currentID = $_SESSION['sessionID'];
    $rowid     = $_POST['id'];

    if ($stmtDelete->execute()) { 
        echo "Film je izbrisan iz baze";
    } else {
        echo "Greska.";
    }

    if ($stmtDeleteLink->execute()) { 
        echo "<br><br>Restart...";
    } else {
        echo "Greska.";
    }

    mysqli_close($conn);
    header("Refresh:2; list.php");

} else {
    header("Location: login.php");
}
?>
</div>
</html>
