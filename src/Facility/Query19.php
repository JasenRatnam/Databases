<?php require_once '../database.php';
$page_title="Facility | Montreal";
        include '../header.php';

$query = "SELECT f.name, f.address, f.type, f.phone, f.capacity,
				(
					SELECT COUNT(vID) as DosesGiven 
					FROM bnc353_2.Vaccination v 
					WHERE f.name = v.facility
				)  as DosesGiven ,
				(
					SELECT COUNT(SSN) 
					FROM bnc353_2.WorksAt wa
					WHERE f.name = wa.facilityName
				) AS NumbOfPHW ,
				(
					SELECT COUNT(*) 
					FROM bnc353_2.bookings b
					WHERE f.name = b.facility
				) AS Bookings

				FROM bnc353_2.Facility f 
				WHERE f.city = 'Montreal'
				Group by f.name
				ORDER BY DosesGiven ASC;";
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
						<h1 class="text-2xl m-0">Facilities in Montreal</h1>
					</div>
					  <!--//show result of query-->
					  <table class="border-separate">
						<tr>
						  <th>Facility Name</td>
						  <th>Address</th>
						  <th>Type</th>
						  <th>Phone Number</th>
						  <th>Capacity</th> 
						  <th>Number of Public Health Worker</th>
						  <th>Doses Given</th>
						  <th>Doses Scheduled </th>
						</tr>
						<? while($row = $result->fetch_assoc()) { ?>
						  <tr>
							<td><?= $row["name"] ?></td>
							<td><?= $row["address"] ?></td>
							<td><?= $row["type"] ?></td>
							<td><?= $row["phone"] ?></td>
							<td><?= $row["capaciy"] ?></td>
							<td><?= $row["NumbOfPHW"] ?></td>
							<td><?= $row["DosesGiven"] ?></td>
							<td><?= $row["Bookings"] ?></td>
							<td><?= $row["province"] ?></td>
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
