<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Display Vaccine Availability Page 1</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <h1>Vaccine Availability</h1>
    <div class="avail-1-form">
        <form method = "post" id = "availabilityform">
            <label for="vaccine-type">Choose vaccine type:</label>
            <div class="vaccine-type-options">
                <label class="option">
                    <input type="radio" id="A" name="vaccineA" value="A">
                    Moderna
                </label>
                <label class="option">
                    <input type="radio" id="B" name="vaccineB" value="B">
                    Biotech
                </label>
                <label class="option">
                    <input type="radio" id="C" name="vaccineC" value="C">
                    Google
                </label>
                <label class="option">
                    <input type="radio" id="D" name="vaccineD" value="D">
                    JohnsonJohnson
                </label>
                <label class="option">
                    <input type="radio" id="E" name="vaccineE" value="D">
                    Pfizer
                </label>

            </div>
        </form>
        <button id="submit" form = "availabilityform">Next</button>
    </div>

    <?php

if (isset($_POST['vaccineA']) OR isset($_POST['vaccineB']) OR isset($_POST['vaccineC']) OR isset($_POST['vaccineD']) OR isset($_POST['vaccineE']))
{
    if (isset($_POST['vaccineA']))
        $_SESSION["vaccinetype"] = "Moderna";
    elseif (isset($_POST['vaccinetype']))
        $_SESSION["vaccinetype"] = "Biotech";
    elseif (isset($_POST['vaccineC']))
        $_SESSION["vaccinetype"] = "Google";
    elseif (isset($_POST['vaccineD']))
        $_SESSION["vaccinetype"] = "JohnsonJohnson";
    elseif (isset($_POST['vaccineE']))
        $_SESSION["vaccinetype"] = "Pfizer";


    header('Location: availability2.php');

CloseCon($conn);

}

?>

</body>

</html>