<?php require_once '../database.php';

$page_title="Person | Show"; 
	include '../header.php';

$pID = $_GET['pID'];
$query = "SELECT * FROM bnc353_2.Person as Person, bnc353_2.Registered AS reg, bnc353_2.MedicareCard AS med WHERE Person.pID = reg.pID
                            AND Person.pID = '$pID' AND reg.medicareID = med.medicardID;";

$result = $conn->query($query);
$person = $result->fetch_assoc();

$query = "SELECT * FROM bnc353_2.covidhistory AS his WHERE his.personID = '$pID';";

$infections = $conn->query($query);
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
        <br>
	<br>
	<a class="float-right text-blue-400 underline cursor-pointer" href="./information.php?pID=<?=$pID?>">View all information</a>
	<div class="w3-content">
            <div>
                <div class="flex flex-row px-6 py-4 border-b border-gray-100 justify-between items-center flex flex-col items-center w-full">
                    <h1 class="text-extrabold text-2xl m-0"><?= $person["lastName"] ?></h1>
                </div>

                <div class="container px-6 py-2">

                    <table id="vertical-1"; class="border-separate flex flex-col items-center w-full">
                        <tr>
                            <th style="text-align:left">First Name:</th>
                            <td><?= $person["firstName"] ?></td>
                        
                        </tr>
                        <tr>
                            <th style="text-align:left">Middle Initial:</th>
                            <td><?= $person["middleInitial"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Last Name:</th>
                            <td><?= $person["lastName"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Date of Birth:</th>
                            <td><?= $person["dob"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Telephone Number:</th>
                            <td><?= $person["telNum"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Address:</th>
                            <td><?= $person["address"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">City:</th>
                            <td><?= $person["city"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Province:</th>
                            <td><?= $person["province"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Postal Code:</th>
                            <td><?= $person["postalCode"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Citizenship:</th>
                            <td><?= $person["citizenship"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Email:</th>
                            <td><?= $person["email"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Medicare ID:</th>
                            <td><?= $person["medicareID"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Medicare Date of Issue:</th>
                            <td><?= $person["doissue"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Medicare Date of Expire:</th>
                            <td><?= $person["doexpire"] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div>
                <div class="flex flex-row px-6 py-4 border-b border-gray-100 justify-between items-center flex flex-col items-center w-full">
                    <h1 class="text-extrabold text-2xl m-0">INFECTIONS</h1>
                </div>

                <div class="container px-6 py-2">

                    <table class="border-separate flex flex-col items-center w-full">
                        <tr>
                            <th>Date of Infections</th>
                            <th>Type</th>
                        </tr>

                        <? while($row = $infections->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $row["dateOfInfection"] ?></td>
                                <td><?= $row["type"] ?></td>
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
