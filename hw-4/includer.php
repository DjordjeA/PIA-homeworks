<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">

<?php
/* This file is included in ALL other files. */
?>

<?php
	session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "SMDb";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected. <br>";

   $db = mysqli_connect($servername, $username, $password, $dbname);

?>


<?php

$stmtRegister = $conn->prepare("INSERT INTO account (username, password) VALUES (?, ?)");
$stmtRegister->bind_param("ss", $insertedUsername, $cryptedPassword);

$stmtAddMovie = $conn->prepare("INSERT INTO movie (name, year, trailer, addedBy) VALUES (?, ?, ?, ?)");
$stmtAddMovie->bind_param("ssss", $inputName, $inputYear, $convertedTrailer, $inputId);

$stmtAddLink = $conn->prepare("INSERT INTO link (mID, gID) VALUES (?, ?)");
$stmtAddLink->bind_param("ss", $newestMID, $newestGID);

$stmtDelete = $conn->prepare("DELETE FROM movie WHERE id = ?");
$stmtDelete->bind_param("i", $rowid);

$stmtDeleteLink = $conn->prepare("DELETE FROM link WHERE mid = ?");
$stmtDeleteLink->bind_param("i", $rowid);


$stmtPromote = $conn->prepare("UPDATE account SET admin = 1 WHERE id = ?");
$stmtPromote->bind_param("i", $userToBePromoted);



$stmtLogin = $conn->prepare("SELECT id from account where username=? AND password=?");
$stmtLogin->bind_param("ss", $myusername, $mycrypt);

$stmtCheckUsername = $conn->prepare("SELECT username from account where username=?");
$stmtCheckUsername->bind_param("s", $insertedUsername);

$stmtFindUsername = $conn->prepare("SELECT username FROM account WHERE id =?");
$stmtFindUsername->bind_param("s", $inputId);

$stmtMovieCount = $conn->prepare("SELECT COUNT(*) FROM movie");

$stmtNewestMID = $conn->prepare("SELECT MAX(id) FROM movie");

?>


</html>
