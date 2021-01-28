<?php
/* Ako korisnik nije prijavljen */
?>

<?php
if (!isset($_SESSION['sessionID'])){  
header("Location: login.php");
}

else {  
    $id = $_SESSION['sessionID'];
    $query = "select id from account where id='$id'";
    $result = mysqli_query($db,$query);
    if (mysqli_num_rows($result) == 0 ) {
      header("Location: logout_process.php"); 
    }
}
?>
