<?php  
	$page_title="Vaccine";
	include '../header.php';

	require_once '../database.php';	
	$query = "SELECT * FROM bnc353_2.Vaccine AS Vaccine;";
	$statement = $conn -> query($query);
?>

<body>
	<div class="w3-top">
  		<div class="w3-bar w3-red w3-card w3-left-align w3-large">
			<a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
			<a href="../" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
			<a href="../Person/" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Person</a>
			<a href="../Vaccination" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Vaccination</a>
			<a href="../Vaccine" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white">Vaccine</a>
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
			<div >
				<div class="flex flex-row px-6 py-4 border-b border-gray-100 justify-between items-center">
					<h1 class="text-2xl m-0">Vaccine</h1>
				</div>
				
				<div class="px-6 py-4">
					<a class="text-blue-500 underline" href="create.php">Create a Vaccine</a>
				</div>
				
				<div class="container px-6 py-2">
					<table class="border-separate">
						<tr>
							<th>Name</th>
							<th>Status</th>
							<th>Approved Date</th>
							<th>Suspended Date</th>
							<th>Description</th>
							<th>Actions</th>	
						</tr>
						<? while($row = $statement->fetch_assoc()) { ?>
							<tr>
								<td><?= $row["name"] ?></td>
								<td><?= $row["status"] ?></td>
								<td><?= $row["approvalDate"] ?></td>
								<td><?= $row["suspendedDate"] ?></td>
								<td><?= $row["description"] ?></td>

								<td>
									<a class="text-blue-500 underline" href="show.php?name=<?= $row["name"] ?>" >Show</a>
									<a class="text-blue-500 underline" href="edit.php?name=<?= $row["name"] ?>" >Edit</a>
									<a class="text-red-500 underline" href="delete.php?name=<?= $row["name"] ?>" >Delete</a>
								</td>
							</tr>
						<? } ?>
					</table>
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
<body>
</html>
