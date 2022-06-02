<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Record Vaccination Page 1</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <h1>Record Vaccination</h1>
    <div class="form">
        <form action="" method="post" id = "ohipform">
            <label for="OHIP">What is your OHIP number?</label>
            <input type="text" id="OHIP" name="OHIPnum">
        </form>
        <button id="submit" form = "ohipform">Next</button>
    </div>

<?php

if (isset($_POST['OHIPnum']))
{

    $_SESSION["OHIP_number"] = $_POST['OHIPnum'];


include 'db_connection.php';

$conn = OpenCon();

$sql = "SELECT OHIPNumber,PatientName from Patient";
$result = mysqli_query($conn , $sql);
$var = 0;


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      if ($row["OHIPNumber"] == $_SESSION["OHIP_number"]){
          $var = 1;
          $_SESSION["name"] = $row["PatientName"];
      }
    }
}

if ($var){
    header('Location: record3.php');
} else {
    header('Location: record2.php');
}

CloseCon($conn);

}

?>

</body>

</html>