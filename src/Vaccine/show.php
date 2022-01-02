<?php 
require_once '../database.php';

$name = $_GET['name'];
$query = "SELECT * FROM bnc353_2.Vaccine AS Vaccine WHERE name='" . $name . "';";

$result = $conn->query($query);
$vaccine = $result->fetch_assoc();

$page_title = "Vaccine | " . $vaccine["name"];
include '../header.php';
?>

<body>
    <div class="w3-top">
        <div class="w3-bar w3-red w3-card w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="../" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
            <a href="../Person/" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Person</a>
            <a href="../Vaccination" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Vaccination</a>
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
            <div>
                <div class="flex flex-row px-6 py-4 border-b border-gray-100 justify-between items-center flex flex-col items-center w-full">
                    <h1 class="text-2xl m-0"><?= $vaccine["name"] ?></h1>
                </div>

                <div class="container px-6 py-2">

                    <table id="vertical-1">
    
                        <tr>
                            <th style="text-align:left">Name:</th>
                            <td><?= $vaccine["name"] ?></td>
                        </tr>
                        
                        <tr>
                            <th style="text-align:left">Status:</th>
                            <td><?= $vaccine["status"] ?></td>
                        </tr>
                        
                        <tr>
                            <th style="text-align:left">Approved Date:</th>
                            <td><?= $vaccine["approvalDate"] ?></td>
                        </tr>

                        <tr>
                            <th style="text-align:left">Suspended Date:</th>
                            <td><?= $vaccine["suspendedDate"] ?></td>
                        </tr>
                        
                        <tr>
                            <th style="text-align:left">Description:</th>
                            <td><?= $vaccine["description"] ?></td>
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
