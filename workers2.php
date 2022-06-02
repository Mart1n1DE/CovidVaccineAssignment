<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Workers</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <h1>All Workers</h1>
    <div class="worker-list">
        <table class="worker-table">
            <tr>
                <th>Name</th>
                <th>Occupation</th>
            </tr>
            
            <?php
            include 'db_connection.php';
            $conn = OpenCon();

            $sql = "SELECT DoctorName
            FROM doctor a
            INNER JOIN employsdoctors b
            ON a.HealthCareID = b.HealthCareID
            WHERE b.VaccinationSiteName =  '". $_SESSION["vaccinesite-name"] ."'";

            $result = mysqli_query($conn,$sql);
            
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>". $row["DoctorName"] ."</td>";
                echo "<td> Doctor </td>";
                echo "</tr>";
                }
            }

            $sql = "SELECT NurseName
            FROM nurse a
            INNER JOIN employsnurses b
            ON a.HealthCareID = b.HealthCareID
            WHERE b.VaccinationSiteName =  '". $_SESSION["vaccinesite-name"] ."'";

            $result = mysqli_query($conn,$sql);
            
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>". $row["NurseName"] ."</td>";
                echo "<td> Nurse </td>";
                echo "</tr>";
                }
            }

                CloseCon($conn);
            ?>

           
        </table>
    </div>
    <a href="covid.html"><button id="back">Back to Home</button></a>
</body>
</html>