<?php
/* pokrece se kada zelimo da dodamo film u bazu*/
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

    $inputName    = $_POST['input_moviename'];
    $inputYear    = $_POST['input_movieyear'];
    $inputTrailer = $_POST['input_movietrailer'];
    $inputId      = $_SESSION['sessionID'];

    $_SESSION['input_moviename'] = $_POST['input_moviename'];
    $_SESSION['input_movieyear'] = $_POST['input_movieyear'];
    $_SESSION['input_movietrailer'] = $_POST['input_movietrailer'];


    $stmtFindUsername->execute();
    $stmtFindUsername->bind_result($result);
    $stmtFindUsername->store_result();
    $stmtFindUsername->fetch();
    if ($stmtFindUsername->num_rows > 0) {
        $addedBy = $result;
    }

    $convertedTrailer = substr($inputTrailer, 32, 11);

    $genres = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

    for ($i = 0; $i < sizeof($genres); $i++) {
        $genres[$i] = $_POST['input_moviegenre' . $i];
    }

    $nameLength = strlen($inputName);
    if ($nameLength < 3) {
        echo "Ime filma mora se sastojati iz bar 3 karaktera. <br>";
        header("Refresh:2; addmovie.php");
    } else if ($inputYear < 1890 || $inputYear > 2021) {
        echo "Godina mora biti izmedju 1890-2021. <br>";
        header("Refresh:2; addmovie.php");
    } else {

        $stmtMovieCount->execute();
        $stmtMovieCount->bind_result($result);
        $stmtMovieCount->store_result();
        $stmtMovieCount->fetch();
        $movieCount = 0;
        if ($stmtMovieCount->num_rows > 0) {
            $movieCount = $result;
        }

        if ($movieCount >= 1000) { 
            echo "Baza filmova je puna.<br>";
            header("Refresh:2; addmovie.php");
        } else { 

            if ($stmtAddMovie->execute()) { 
                echo "Dodavanje filma...";


            $stmtNewestMID->execute();
            $stmtNewestMID->bind_result($result);
            $stmtNewestMID->store_result();
            $stmtNewestMID->fetch();
            if ($stmtNewestMID->num_rows > 0) {
                $newestMID = $result;
            }

            for ($i = 0; $i < 17; $i++) {
                if ($genres[$i] == 1) {
                    $newestGID = $i + 1;
                    if ($stmtAddLink->execute()) { 
                    } else {
                        echo "Greska u izboru zanra.";
                    }
                }
            }

            $_SESSION['input_moviename'] = "";
            $_SESSION['input_movieyear'] = "";
            $_SESSION['input_movietrailer'] = "";
          } else {
              echo "Greska.";
          }
            header("Refresh:1; list.php");
        }
    }

} else {
    header("Location: login.php");
}
?>
</div>
