<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Data Page 1</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <h1>Patient Data</h1>
    <div class="patient-form">
        <form action = "" method = "post" id = "patientlistform">
            <label for="patient-name">Select Patient:</label>
            <select name="patient-name" id="patient-name">
            <?php
            include 'db_connection.php';
            $conn = OpenCon();

            $sql = "SELECT PatientName FROM patient";

            $result = mysqli_query($conn,$sql);
            
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                echo "<option>";
                echo $row["PatientName"];
                echo "</option>";
                }
            }
                CloseCon($conn);
            ?>
            
            </select>
        </form>
        <button id="submit" form = "patientlistform">Next</button>
    </div>

    <?php
    if (isset($_POST['patient-name'])){ 
     $_SESSION['name'] = $_POST['patient-name'];

    $conn = OpenCon();
    $sql = "SELECT OHIPNumber FROM patient WHERE PatientName = '". $_POST['patient-name'] . "'";
    $result = mysqli_query($conn , $sql);
    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['OHIP_number'] = $row["OHIPNumber"];
    }
    

    header('Location: results.php');

    CloseCon($conn);
    }
    ?>

</body>
</html>