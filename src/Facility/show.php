<?php require_once '../database.php';

$name = $_GET['name'];
$query = "SELECT * FROM bnc353_2.Facility AS Facility WHERE name='$name';";

$result = $conn->query($query);
$facility = $result->fetch_assoc();

$page_title="Facility | Show"; 
	include '../header.php';

?>

<body>
    <div class="w3-top">
        <div class="w3-bar w3-red w3-card w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="../" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
            <a href="../Person/" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Person</a>
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
                <div>
                    <div class="flex flex-row px-6 py-4 border-b border-gray-100 justify-between items-center flex flex-col items-center w-full">
                        <h1 class="text-2xl m-0"><?= $facility["name"] ?></h1>
                    </div>
                
                <div class="container px-6 py-2">
                    
                    <table id="vertical-1"; class="border-separate flex flex-col items-center w-full">
                        <tr>
                            <th style="text-align:left">Address:</th>
                            <td><?= $facility["address"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">City:</th>
                            <td><?= $facility["city"] ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Province:</th>
                            <td><?= $facility["province"] ?></td>
                        <tr>
                            <th style="text-align:left">Postal Code:</th>
                            <td><?= $facility["postalCode"] ?></td>
                        <tr>
                            <th style="text-align:left">Phone Number:</th>
                            <td><?= $facility["phone"] ?></td>
                        <tr>
                            <th style="text-align:left">Website:</th>
                            <td><?= $facility["website"] ?></td>
                        <tr>
                            <th style="text-align:left">Opening Time:</th>
                            <td><?= $facility["openingTime"] ?></td>
                        <tr>
                            <th style="text-align:left">Closing Time:</th>
                            <td><?= $facility["closingTime"] ?></td>
                        <tr>
                            <th style="text-align:left">Type:</th>
                            <td><?= $facility["type"] ?></td>
                        <tr>
                            <th style="text-align:left">Category:</th>
                            <td><?= $facility["category"] ?></td>
                        <tr>
                            <th style="text-align:left">Capacity:</th>
                            <td><?= $facility["capacity"] ?></td>
                        <tr>
                            <th style="text-align:left">Manager ID:</th>
                            <td><?= $facility["managerID"] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
	    <div class="flex flex-row">
		<form action="Query13.php" method="POST" class="flex flex-col border border-gray-100 p-4">	
		    <label> Date: 
		    <input required name="date" type="date" />
		    </label>
		    <input type="hidden" name="facility" value="<?= $name ?>" />
		    <input type="submit" value="View nurse not working" />
		</form>
		<form action="Query11.php" method="POST" class="flex flex-col border border-gray-100 p-4">
                    <label> From:
                    <input required name="from" type="date" />
                    </label>
		    <label> To:
                    <input required name="to" type="date" />
                    </label>
                    <input type="hidden" name="facility" value="<?= $name ?>" />
                    <input type="submit" value="View Facility Bookings" />
                </form> 
		<form action="Query12.php" method="POST" class="flex flex-col border border-gray-100 p-4">
                    <label> Date:
                    <input required name="date" type="date" />
                    </label>
                    <input type="hidden" name="facility" value="<?= $name ?>" />
                    <input type="submit" value="First free booking" />
                </form> 	
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
