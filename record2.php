<?php
session_start();
?>



<!DOCTYPE html>
<html>
<head>
    <title>Record Vaccination Page 2</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <h1>Record Vaccination</h1>
    <p class="page-2-text">Looks like we do not have you in the database yet.</p>
    <div class="form">
        <form action ="" method = "post" id = "namephoneform">
            <label for="name">What is your full name?</label>
            <input type="text" id="name" name="name">
            <label for="phone">What is your phone number?</label>
            <input type="phone" id="phone" name="phone">
        </form>
        <button id="submit" form = "namephoneform">Next</button>
    </div>

<?php

if (isset($_POST['phone']) AND isset($_POST['name']))
{

    $_SESSION["name"] = $_POST['name'];
    $_SESSION["phone_number"] = $_POST['phone'];

include 'db_connection.php';

$conn = OpenCon();

$sql = "INSERT INTO Patient 
(PatientName,OHIPNumber,PhoneNumber,SpouseOHIPNumber)
VALUES('" . $_SESSION["name"] ."' , '" . $_SESSION["OHIP_number"] ."' , '". $_SESSION["phone_number"] ."', NULL)
";
$result = mysqli_query($conn,$sql);

header('Location: record3.php');


CloseCon($conn);

}

?>


</body>

</html>