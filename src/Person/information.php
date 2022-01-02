<?php require_once '../database.php';
$page_title="Person | Information";
        include '../header.php';

$pID = $_GET['pID'];

$query = "SELECT firstName, lastName, dob FROM bnc353_2.Person as Person WHERE pID = '$pID';";
$result = $conn->query($query);
$person = $result->fetch_assoc();

$query = "SELECT date, time, f.name as location, CONCAT(f.address, ', ', f.city, ', ', f.province, ', ', f.postalCode) as address 
	FROM bnc353_2.bookings b, bnc353_2.Facility f WHERE f.name = b.facility AND b.pID = $pID
	AND date > CURDATE();";
$appointments = $conn->query($query);

$query = "SELECT type, doseNumber, lotNum, date, facility AS location FROM bnc353_2.Vaccination v 
	  WHERE pID = $pID ORDER BY date;";
$vaccines = $conn->query($query);

$query = "SELECT personID, dateOfInfection FROM bnc353_2.covidhistory c
	  WHERE personID = $pID ORDER BY dateOfInfection;";
$covid = $conn->query($query);

?>

<body>
    <div class="w3-top">
        <div class="w3-bar w3-red w3-card w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="../" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
            <a href="../Person/" class="w3-bar-item w3-button w3-padding-large w3-white">Person</a>
            <a href="../Vaccination" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Vaccination</a>
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
		<br>
		<br>
                <div class="flex flex-col items-center w-full">
                    <h1 class="text-extrabold text-2xl mb-4">Person Information</h1>
                </div>

                <div class="px-4 py-2 border-2 border-black">
                	<div class="border-b-2 px-2 pb-2 border-black">
			<div class="flex flex-row justify-between text-xl font-bold mb-4">
				<span>Health and Social Services</span>
				<span>Proof of Vaccination against COVID-19</span>
			</div>
			<span class="text-lg mb-2">User Information</span>
			<table class="border-separate">
				<tr>
					<td class="w-6">Name</td>
					<td><?= $person["firstName"]?> <?= $person["lastName"]?></td>
				</tr>
				<tr>
                                        <td class="w-6">DOB</td>
                                        <td><?= $person["dob"] ?></td>
                                </tr>
			</table>
			</div>
			<? while($row = $appointments->fetch_assoc()) { ?>
			<div class="border-b-2 p-2 border-black">
				<span class="text-lg mb-2">Appointment:</span>
				<table class="border-separate">
				<tr>
                                        <td class="mr-4">Date</td>
                                        <td><?= $row["date"]?> @ <?= $row["time"]?></td>
                                </tr>
                                <tr>
                                        <td class="mr-4">Location</td>
                                        <td><?= $row["location"] ?></td>
                                </tr>
				<tr>
                                        <td class="mr-4">Address</td>
                                        <td><?= $row["address"] ?></td>
                                </tr>
				</table>
				<br>
			</div>
			 <? } ?>
			 <? while($row = $vaccines->fetch_assoc()) { ?>	
			<div class="border-b-2 p-2 border-black">
                                <span class="text-lg mb-2">Vaccine Administered Dose # <?= $row["doseNumber"] ?></span>
				<table class="border-separate">
				<tr>
                                        <td class="mr-4">Name</td>
                                        <td><?= $row["type"]?></td>
                                </tr>
                                <tr>
                                        <td class="mr-4">Code</td>
                                        <td><?= $row["type"] ?></td>
                                </tr>
                                <tr>
                                        <td class="mr-4">Lot</td>
                                        <td><?= $row["lotNum"] ?></td>
                                </tr>
				<tr>
                                        <td class="mr-4">Date</td>
                                        <td><?= $row["date"] ?></td>
                                </tr>  
                                <tr>
                                        <td class="mr-4">Location</td>
                                        <td><?= $row["location"] ?></td>
                                </tr>
				</table>
                        </div>
			<? } ?>
			<div class="p-2">
				<span class="text-lg mb-2">Positive COVID-19 Diagnostic</div>
				<? while($row = $covid->fetch_assoc()) { ?>
                                <span>Positive COVID-19 Diagnostic on <?= date("F jS, Y", strtotime($row["dateOfInfection"])) ?></span>
                                <? } ?>
			</div>
		</div>
            </div>
        </div>
    </div>
    <!-- Bottom Grid -->
  <div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
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
