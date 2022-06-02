<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Worker Data Page 1</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <h1>Vaccination Sites</h1>
    <div class="patient-form">
        <form action = "" method = "post" id = "patientlistform">
            <label for="vaccinesite-name">Select VaccineSite:</label>
            <select name="vaccinesite-name" id="patient-name">
            <?php
            include 'db_connection.php';
            $conn = OpenCon();

            $sql = "SELECT VaccinationSiteName FROM vaccinationsite";

            $result = mysqli_query($conn,$sql);
            
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                echo "<option>";
                echo $row["VaccinationSiteName"];
                echo "</option>";
                }
            }
                CloseCon($conn);
            ?>
            
            </select>
        </form>
        <a href="results.html"><button id="submit" form = "patientlistform">Next</button></a>
    </div>

    <?php
    if (isset($_POST['vaccinesite-name'])){ 
     $_SESSION['vaccinesite-name'] = $_POST['vaccinesite-name'];
    
    header('Location: workers2.php');

    CloseCon($conn);
    }
    ?>

</body>
</html>