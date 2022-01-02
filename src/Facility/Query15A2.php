<?php require_once '../database.php';
$page_title = "Facility | Montreal";
include '../header.php';

$facility = $_POST['facility'];
$date = $_POST['date'];

$query = "SELECT P.firstName, P.lastName, WA.startDate, WA.endDate, PH.type AS duty
FROM bnc353_2.WorksAt WA, bnc353_2.PublicHealthWorker PH, bnc353_2.Facility F, bnc353_2.Person P, bnc353_2.Registered R
WHERE WA.facilityName = '$facility'
     AND WA.startDate <= '$date' 
     AND WA.endDate >= '$date'
     AND F.name = WA.facilityName 
     AND PH.SSN = WA.SSN 
     AND PH.medicardID = R.medicareID 
     AND R.pID = P.pID;";
$result = $conn->query($query) or die($conn->error);

$query2 = "SELECT P.firstName, P.lastname, B.date, B.time
FROM bnc353_2.Facility F, bnc353_2.Person P, bnc353_2.bookings B
WHERE F.name = B.facility AND P.pID = B.pID AND F.name = '$facility' AND B.`date` = '$date';";
$result2 = $conn->query($query2) or die($conn->error);
?>

<body>
    <div class="w3-top">
        <div class="w3-bar w3-red w3-card w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="../" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
            <a href="../Person/" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Person</a>
            <a href="../Vaccination" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Vaccination</a>
            <a href="../Vaccine" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Vaccine</a>
            <a href="../Facility" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white">Public Health Facilities</a>
            <a href="../bookings/" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Bookings</a>
            <a href="../infectionVariant" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">COVID-19 Types</a>
            <a href="../ProvinceAgeGroup" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Provinces</a>
            <a href="../AgeGroup" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Age Groups</a>
            <a href="../worksAt" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Employee Work Assignment</a>
        </div>
    </div>
    <div class="w3-row-padding w3-padding-64 w3-container">
        <div class="w3-content">
            <div>
                <div class="container px-6 py-2">
                    <div class="flex flex-row px-6 py-4 border-b border-gray-100 justify-between items-center">
                        <h1 class="text-2xl m-0"></h1>
                    </div>
                    <div class="flex flex-row px-6 py-4 border-b border-gray-100 justify-between items-center">
                        <h1 class="text-2xl m-0">Workers in <?= $facility ?> on <?= $date ?></h1>
                    </div>
                    <!--//show result of query-->
                    <table class="border-separate">
                        <tr>
                            <th>First Name</td>
                            <th>Last Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Duty</th>
                        </tr>
                        <? while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $row["firstName"] ?></td>
                                <td><?= $row["lastName"] ?></td>
                                <td><?= $row["startDate"] ?></td>
                                <td><?= $row["endDate"] ?></td>
                                <td><?= $row["duty"] ?></td>
                            </tr>
                        <? } ?>
                    </table>
                    <div class="flex flex-row px-6 py-4 border-b border-gray-100 justify-between items-center">
                        <h1 class="text-2xl m-0">Appointments in <?= $facility ?> on <?= $date ?></h1>
                    </div>
                    <!--//show result of query-->
                    <table class="border-separate">
                        <tr>
                            <th>First Name</td>
                            <th>Last Name</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                        <? while ($row = $result2->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $row["firstName"] ?></td>
                                <td><?= $row["lastName"] ?></td>
                                <td><?= $row["date"] ?></td>
                                <td><?= $row["time"] ?></td>
                            </tr>
                        <? } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Grid -->
    <div class="w3-container footer w3-black w3-center w3-opacity w3-padding-64">
        <h1 class="w3-margin w3-xlarge">Courtesy of Team BNC353_2</h1>
        <p class="w3-text-grey">
            Jasen Ratnam 40094237 <br>
            Ali Turkman 40111059 <br>
            John Carlo Estoesta 40112372<br>
            Philippe Carrier 40153985<br>
        </p>
    </div>
</body>

</html>