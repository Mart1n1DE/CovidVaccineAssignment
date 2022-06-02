<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Results Page</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <h1>Results</h1>
    
    <div class="results">
        <div class="results-text">
            <p>Name: <?php echo $_SESSION["name"] ?></p> 
            <p>OHIP Number: <?php echo $_SESSION["OHIP_number"] ?></p>
        </div>

        <table>
            <tr>
                <th>Company</th>
                <th>Vaccine Site</th>
                <th>Vaccine Date</th>
            </tr>
            
            <?php
            include 'db_connection.php';
            $conn = OpenCon();

            $sql = "SELECT b.CompanyName, a.VaccinationSiteName, a.VaccineDate 
            FROM vaccinates a 
            INNER JOIN lot b
            ON a.LotNumber = b.LotNumber
            WHERE a.OHIPNumber = '". $_SESSION["OHIP_number"] ."'";

            $result = mysqli_query($conn,$sql);
            
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>". $row["CompanyName"] ."</td>";
                echo "<td>". $row["VaccinationSiteName"] ."</td>";
                echo "<td>". $row["VaccineDate"] ."</td>";
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