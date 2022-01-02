<?php require_once '../database.php';
//backend code
$page_title="Person"; 
	include '../header.php';

$query = 'SELECT Person.*, reg.*, 
(SELECT COUNT(personID) FROM bnc353_2.covidhistory AS his WHERE his.personID = Person.pID) AS infCount
FROM bnc353_2.Person AS Person, bnc353_2.Registered AS reg WHERE Person.pID = reg.pID';
$statement = $conn->query($query);

$query = 'SELECT Person.*, nonReg.*, 
(SELECT COUNT(personID) FROM bnc353_2.covidhistory AS his WHERE his.personID = Person.pID) AS infCount
FROM bnc353_2.Person AS Person, bnc353_2.NotRegistered AS nonReg WHERE Person.pID = nonReg.pID';
$statement2 = $conn->query($query);

$query = "SELECT PublicHealthWorker.*, reg.*, Person.*, 
(SELECT COUNT(personID) FROM bnc353_2.covidhistory AS his WHERE his.personID = Person.pID) AS infCount
FROM bnc353_2.PublicHealthWorker AS PublicHealthWorker, bnc353_2.Registered AS reg, bnc353_2.Person AS Person
WHERE Person.pID = reg.pID AND PublicHealthWorker.medicardID = reg.medicareID;";
$statement3 = $conn -> query($query);

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
        <div class="flex flex-row px-6 py-4 border-b border-gray-100 justify-between items-center">
          <h1 class="text-2xl m-0">Person</h1>
        </div>
	<div class="flex flex-row">
        <div class="px-6 py-4">
          <a class="text-blue-500 underline" href="create-registered.php">Add A Registered Person</a>
        </div>

        <div class="px-6 py-4">
          <a class="text-blue-500 underline" href="create-non-registered.php">Add A  Non-Registered Person</a>
        </div>

        <div class="px-6 py-4">
          <a class="text-blue-500 underline" href="../PublicHealthWorker/create.php">Add A Public Health Worker</a>
        </div>
	</div>
        <div class="container px-6 py-2">
          <div class="flex flex-row px-6 py-4 border-b border-gray-100 justify-between items-center">
            <h1 class="text-2xl m-0">Registered Person</h1>
          </div>
          <!--//show result of query-->
          <table class="border-separate">
            <tr>
              <th>pID</td>
              <th>First Name</th>
              <th>Middle Initial</th>
              <th>Last Name</th>
              <th>Date of Birth</th> 
              <th>Telephone Number</th>
              <th>Address</th>
              <th>City</th>
              <th>Province</th>
              <th>Postal Code</th>
              <th>Citizenship</th>
              <th>Email</th>
              <th>Medicare ID</th>
              <th>Number of Infections</th>
              <th>Actions</th>
            </tr>
            <? while($row = $statement->fetch_assoc()) { ?>
              <tr>
                <td><?= $row["pID"] ?></td>
                <td><?= $row["firstName"] ?></td>
                <td><?= $row["middleInitial"] ?></td>
                <td><?= $row["lastName"] ?></td>
                <td><?= $row["dob"] ?></td>
                <td><?= $row["telNum"] ?></td>
                <td><?= $row["address"] ?></td>
                <td><?= $row["city"] ?></td>
                <td><?= $row["province"] ?></td>
                <td><?= $row["postalCode"] ?></td>
                <td><?= $row["citizenship"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["medicareID"] ?></td>
                <td><?= $row["infCount"] ?></td>
                <td>
                <!-- pass pID to edit and delete php file-->
                <a class="text-blue-500 underline" href="show-registered.php?pID=<?= $row["pID"] ?>" >Show</a>
                <a class="text-blue-500 underline" href="edit-registered.php?pID=<?= $row["pID"] ?>" >Edit</a><br>
                <a class="text-blue-500 underline" href="infection.php?pID=<?= $row["pID"] ?>" >Add infection</a>
                <a class="text-red-500 underline" href="delete.php?pID=<?= $row["pID"] ?>" >Delete</a>
                </td>
              </tr>
            <? } ?>
          </table>
        </div>

        <div class="container px-6 py-2">
          <div class="flex flex-row px-6 py-4 border-b border-gray-100 justify-between items-center">
            <h1 class="text-2xl m-0">Non-Registered Person</h1>
          </div>
          <!--//show result of query-->
          <table class="border-separate">
            <tr>
              <th>pID</td>
              <th>First Name</th>
              <th>Middle Initial</th>
              <th>Last Name</th>
              <th>Date of Birth</th> 
              <th>Telephone Number</th>
              <th>Address</th>
              <th>City</th>
              <th>Province</th>
              <th>Postal Code</th>
              <th>Citizenship</th>
              <th>Email</th>
              <th>Passport Number</th>
              <th>Number of Infections</th>
              <th>Actions</th>
            </tr>
            <? while($row = $statement2->fetch_assoc()) { ?>
              <tr>
                <td><?= $row["pID"] ?></td>
                <td><?= $row["firstName"] ?></td>
                <td><?= $row["middleInitial"] ?></td>
                <td><?= $row["lastName"] ?></td>
                <td><?= $row["dob"] ?></td>
                <td><?= $row["telNum"] ?></td>
                <td><?= $row["address"] ?></td>
                <td><?= $row["city"] ?></td>
                <td><?= $row["province"] ?></td>
                <td><?= $row["postalCode"] ?></td>
                <td><?= $row["citizenship"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["passNum"] ?></td>
                <td><?= $row["infCount"] ?></td>
                <td>
                <!-- pass pID to edit and delete php file-->
                <a class="text-blue-500 underline" href="show-non-registered.php?pID=<?= $row["pID"] ?>" >Show</a>
                <a class="text-blue-500 underline" href="edit-non-registered.php?pID=<?= $row["pID"] ?>" >Edit</a><br>
                <a class="text-blue-500 underline" href="infection.php?pID=<?= $row["pID"] ?>" >Add infection</a>
                <a class="text-red-500 underline" href="delete.php?pID=<?= $row["pID"] ?>" >Delete</a>
                </td>
              </tr>
            <? } ?>
          </table>
        </div>

        <div class="container px-6 py-2">
          <div class="flex flex-row px-6 py-4 border-b border-gray-100 justify-between items-center">
            <h1 class="text-2xl m-0">Public Health Worker</h1>
          </div>
          <!--//show result of query-->
          <table class="border-separate">
            <tr>
              <th>pID</td>
              <th>First Name</th>
              <th>Middle Initial</th>
              <th>Last Name</th>
              <th>Date of Birth</th> 
              <th>Telephone Number</th>
              <th>Address</th>
              <th>City</th>
              <th>Province</th>
              <th>Postal Code</th>
              <th>Citizenship</th>
              <th>Email</th>
              <th>SSN</th>
              <th>Medicare ID</th>
              <th>Type</th>
              <th>Number of Infections</th>
              <th>Actions</th>
            </tr>
            <? while($row = $statement3->fetch_assoc()) { ?>
							<tr>
                <td><?= $row["pID"] ?></td>
                <td><?= $row["firstName"] ?></td>
                <td><?= $row["middleInitial"] ?></td>
                <td><?= $row["lastName"] ?></td>
                <td><?= $row["dob"] ?></td>
                <td><?= $row["telNum"] ?></td>
                <td><?= $row["address"] ?></td>
                <td><?= $row["city"] ?></td>
                <td><?= $row["province"] ?></td>
                <td><?= $row["postalCode"] ?></td>
                <td><?= $row["citizenship"] ?></td>
                <td><?= $row["email"] ?></td>
								<td><?= $row["SSN"] ?></td>
								<td><?= $row["medicardID"] ?></td>
								<td><?= $row["type"] ?></td>
                <td><?= $row["infCount"] ?></td>

								<td>
									<a class="text-blue-500 underline" href="../PublicHealthWorker/show.php?SSN=<?= $row["SSN"] ?>" >Show</a>
									<a class="text-blue-500 underline" href="../PublicHealthWorker/edit.php?SSN=<?= $row["SSN"] ?>" >Edit</a> <br>
                  <a class="text-blue-500 underline" href="infection.php?pID=<?= $row["pID"] ?>" >Add infection</a>
                  <a class="text-red-500 underline" href="../PublicHealthWorker/delete.php?SSN=<?= $row["SSN"] ?>" >Delete</a>
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
