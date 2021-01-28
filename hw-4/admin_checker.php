

<?php
if (!isset($_SESSION['sessionID'])){  
header("Location: login.php");
}

else {

$currentID = $_SESSION['sessionID'];
$queryAdmin   = "SELECT admin FROM account WHERE id=$currentID";
$resultsAdmin = $conn->query($queryAdmin);
$admin        = mysqli_fetch_row($resultsAdmin);
if ($admin[0] == true) {
} else {   header("Location: list.php"); }

}
?>
