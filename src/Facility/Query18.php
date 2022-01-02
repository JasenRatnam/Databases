<?php require_once '../database.php';
$page_title="Facility | Montreal";
        include '../header.php';

$query = "SELECT name, phone, number_of_vaccinations
FROM (SELECT CONCAT(P.firstName, ' ', P.lastName) AS name, 
        P.telNum AS phone, (SELECT Count(*) From bnc353_2.Vaccination V WHERE WA1.eID = V.eID)
        AS number_of_vaccinations
      FROM bnc353_2.Person P, bnc353_2.PublicHealthWorker PH, bnc353_2.WorksAt WA1, bnc353_2.Registered R
      WHERE PH.medicardID = R.medicareID AND R.pID = P.pID AND PH.SSN = WA1.SSN AND
        PH.type = 'nurse') AS B
GROUP BY name
HAVING number_of_vaccinations >= 20
ORDER BY number_of_vaccinations DESC;";
$result = $conn->query($query) or die($conn->error);
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
						<h1 class="text-2xl m-0">Nurses with at least 20 vaccinations</h1>
					</div>
					  <!--//show result of query-->
					  <table class="border-separate">
						<tr>
						  <th>Name</td>
						  <th>Phone</th>
						  <th>Number of Vaccinations</th>
						</tr>
						<? while($row = $result->fetch_assoc()) { ?>
						  <tr>
							<td><?= $row["name"] ?></td>
							<td><?= $row["phone"] ?></td>
							<td><?= $row["number_of_vaccinations"] ?></td>
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
        Jasen Ratnam		40094237 <br>
        Ali Turkman			40111059 <br>
        John Carlo Estoesta	40112372<br>
        Philippe Carrier		40153985<br>
      </p>
  </div>
</body>
</html>
