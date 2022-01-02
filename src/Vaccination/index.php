<?php require_once '../database.php';
//backend code
$page_title="Vaccination"; 
	include '../header.php';

$query = 'SELECT * FROM bnc353_2.Vaccination AS Vaccination';
$statement = $conn->query($query);
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
        <div class="flex flex-row px-6 py-4 border-b border-gray-100 justify-between items-center">
          <h1 class="text-2xl m-0">Vaccination</h1>
        </div>

        <div class="px-6 py-4">
          <a class="text-blue-500 underline" href="create.php">Add A  New Vaccination</a>
        </div>

		    <div class="container px-6 py-2">

          <!--//show result of query-->
          <table class="border-separate">
            <tr>
                <th>Vaccine ID</td>
                <th>Person ID</th>
                <th>Facility</th>
                <th>Employee ID</th>
                <th>Type</th> 
                <th>Country</th>
                <th>Lot Number</th>
                <th>Dose Number</th>
                <th>Date</th>
            </tr>

            <? while($row = $statement->fetch_assoc()) { ?>
              <tr>
                <td><?= $row["vID"] ?></td>
                <td><?= $row["pID"] ?></td>
                <td><?= $row["facility"] ?></td>
                <td><?= $row["eID"] ?></td>
                <td><?= $row["type"] ?></td>
                <td><?= $row["country"] ?></td>
                <td><?= $row["lotNum"] ?></td>
                <td><?= $row["doseNumber"] ?></td>
                <td><?= $row["date"] ?></td>
                <td>
                    <!-- pass pID to edit and delete php file-->
                    <a class="text-blue-500 underline" href="show.php?vID=<?= $row["vID"] ?>" >Show</a>
                    <a class="text-red-500 underline" href="delete.php?vID=<?= $row["vID"] ?>" >Delete</a>
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
</body>
</html>