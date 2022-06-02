<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Vaccine Availability Page 2</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <h1>Vaccine Availability</h1>
    <div class="results">
        
        <p>Vaccination sites offering vaccine type:</p>

        <table>
            <tr><td>Vaccination Site</td><td>Num of Doses Shipped to Site</td></tr>
            <?php
            include 'db_connection.php';
            $conn = OpenCon();

            $sql = "SELECT VaccinationSiteName, NumOfDoses 
            FROM lot 
            WHERE CompanyName = '". $_SESSION["vaccinetype"] ."'";

            $result = mysqli_query($conn,$sql);
            
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>". $row["VaccinationSiteName"] ."</td>";
                echo "<td>". $row["NumOfDoses"] ."</td>";
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