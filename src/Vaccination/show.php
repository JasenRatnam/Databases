<?php require_once '../database.php';

$page_title="Vaccination | Show"; 
	include '../header.php';

$vID = $_GET['vID'];
$query = "SELECT * FROM bnc353_2.Vaccination AS V
                            WHERE V.vID = '$vID';";

$result = $conn->query($query);
$vaccination = $result->fetch_assoc();

$pID = $vaccination['pID'];

$query = "SELECT * FROM bnc353_2.Person AS P
                            WHERE P.pID = '$pID';";

$result = $conn->query($query);
$person = $result->fetch_assoc();

?>


<body>
    <div class="w3-top">
        <div class="w3-bar w3-red w3-card w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="../" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
            <a href="../Person/" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Person</a>
            <a href="../Vaccination" class="w3-bar-item w3-button w3-padding-large w3-white">Vaccination</a>
            <a href="../Vaccine" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Vaccine</a>
            <a href="../Facility" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Public Health Facilities</a>
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
                 <div class="flex flex-row px-6 py-4 border-b border-gray-100 justify-between items-center flex flex-col items-center w-full">
                    <h1 class="text-extrabold text-2xl mb-4">Vaccination ID:<?= $vID ?></h1>
                </div>

                <div class="container px-6 py-2">

                    <table id="vertical-1">
                        <tr>
                            <th style="text-align:left">Person ID:</th>
                            <td><?= $vaccination["pID"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Person Name:</th>
                            <td><?= $person["firstName"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Facility:</th>
                            <td><?= $vaccination["facility"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Employee ID:</th>
                            <td><?= $vaccination["eID"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Type:</th>
                            <td><?= $vaccination["type"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Country:</th>
                            <td><?= $vaccination["country"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Lot Number:</th>
                            <td><?= $vaccination["lotNum"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Dose Number:</th>
                            <td><?= $vaccination["doseNumber"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Date:</th>
                            <td><?= $vaccination["date"] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Grid -->
  <div class="w3-container footer w3-black w3-center w3-opacity w3-padding-64">
      <h1 class="w3-margin w3-xlarge">Courtesy of Team BNC353_2</h1>
      <p class="w3-text-grey">
        Jasen Ratnam		40094237 <br>
        Ali Turkman			40111059 <br>
        John Carlo Estoesta	40112372<br>
        Philippe Carrier		40153985<br>
      </p>
  </div>
</body>
</html>