<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Record Vaccination Page 3</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <h1>Record Vaccination</h1>
    <div class="form">
        <form action = "" method = "post" id = "vaccineclinicform">
            <label for="clinic">Which clinic was the vaccine administered?</label>
            <div class="clinic-options">
                <label class="option">
                    <input type="radio" id="A" name="clinicA" value="A">
                    BramptonCleanVaccines
                </label>
                <label class="option">
                    <input type="radio" id="B" name="clinicB" value="B">
                    MarkhamCleanVaccines
                </label>
                <label class="option">
                    <input type="radio" id="C" name="clinicC" value="C">
                    MissisaugaCleanVaccines
                </label>
                <label class="option">
                    <input type="radio" id="D" name="clinicD" value="D">
                    RHillCleanVaccines
                </label>
                <label class="option">
                    <input type="radio" id="E" name="clinicE" value="E">
                    TBayCleanVaccines
                </label>
                <label class="option">
                    <input type="radio" id="F" name="clinicF" value="E">
                    TorontoCleanVaccines
                </label>
            </div>
            <label for="lot">What is the vaccine lot number?</label>
            <input type="text" id="lot" name="lot">
            <label for="date">What date did you recieve the vaccine?</label>
            <input type="date" id="date" name="date">
        </form>
        <button id="submit" form = "vaccineclinicform">Submit</button>
    </div>

<?php

if ((isset($_POST['clinicA']) OR isset($_POST['clinicB']) OR isset($_POST['clinicC']) OR isset($_POST['clinicD']) OR isset($_POST['clinicE']) OR isset($_POST['clinicF'])) AND isset($_POST['lot']) AND isset($_POST['date']))
{
    if (isset($_POST['clinicA']))
        $_SESSION["vaccinesitename"] = "BramptonCleanVaccines";
    elseif (isset($_POST['clinicB']))
        $_SESSION["vaccinesitename"] = "MarkhamCleanVaccines";
    elseif (isset($_POST['clinicC']))
        $_SESSION["vaccinesitename"] = "MissisaugaCleanVaccines";
    elseif (isset($_POST['clinicD']))
        $_SESSION["vaccinesitename"] = "RHillCleanVaccines";
    elseif (isset($_POST['clinicE']))
        $_SESSION["vaccinesitename"] = "TBayCleanVaccines";
    else $_SESSION["vaccinesitename"] = "TorontoCleanVaccines";

    $_SESSION["lot"] = $_POST['lot'];
    $_SESSION["date"] = $_POST['date'];

include 'db_connection.php';

$conn = OpenCon();

$sql = "INSERT INTO vaccinates 
(LotNumber,VaccineDate,VaccinationSiteName,OHIPNumber)
VALUES('" . $_SESSION["lot"] ."' , '" . $_SESSION["date"] ."' , '". $_SESSION["vaccinesitename"] ."','". $_SESSION["OHIP_number"] . "')";

$result = mysqli_query($conn,$sql);

header('Location: results.php');

CloseCon($conn);

}
?>


</body>

</html>