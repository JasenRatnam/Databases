<?php require_once '../database.php';
$page_title="Facility | Montreal";
        include '../header.php';


$facilityName = $_POST['facility'];
$date = $_POST['date'];

$query = "SELECT DISTINCT firstName , lastName, email, hourlyWage
	  FROM bnc353_2.Registered re, bnc353_2.Person p, bnc353_2.PublicHealthWorker phw, bnc353_2.WorksAt wa
	  WHERE p.pID = re.pID AND re.medicareID = phw.medicardID AND phw.type = 'nurse' AND phw.SSN = wa.SSN
	  AND (DATE('2030-01-01') NOT BETWEEN wa.startDate AND wa.endDate)
	  ORDER BY hourlyWage ASC;";
$result = $conn->query($query);

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
						<h1 class="text-2xl m-0">Nurse not Working on <?= date("F jS, Y", strtotime($date)) ?></h1>
					</div>
					  <!--//show result of query-->
					  <table class="border-separate">
						<tr>
						  <th>First Name</td>
						  <th>Last NAme</th>
						  <th>Email</th>
						  <th>Hourly Wage</th>
						</tr>
						<? while($row = $result->fetch_assoc()) { ?>
						  <tr>
							<td><?= $row["firstName"] ?></td>
							<td><?= $row["lastName"] ?></td>
							<td><?= $row["email"] ?></td>
							<td><?= $row["hourlyWage"] ?></td>
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
