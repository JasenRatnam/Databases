<?php require_once '../database.php';
//backend code

$page_title="COVID-19 Variants"; 
	include '../header.php';


$query = 'SELECT * FROM bnc353_2.infectionVariant AS IV';
$statement = $conn->query($query);
?>


<head>
<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  text-align: center;
}
</style>

<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">


</head>

<body>
	  <div class="w3-top">
        <div class="w3-bar w3-red w3-card w3-left-align w3-large">
          <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
          <a href="../" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"">Home</a>
          <a href="../Person/" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Person</a>
          <a href="../Vaccination" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Vaccination</a>
          <a href="../Vaccine" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Vaccine</a>
          <a href="../Facility" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Public Health Facilities</a>
          <a href="../bookings/" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Bookings</a>
          <a href="../infectionVariant" class="w3-bar-item w3-button w3-padding-large w3-white">COVID-19 Types</a>
          <a href="../ProvinceAgeGroup" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Provinces</a>
          <a href="../AgeGroup" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Age Groups</a>
          <a href="../worksAt" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Employee Work Assignment</a>
        </div>
    </div>

    <div class="w3-row-padding w3-padding-64 w3-container">
        <div class="w3-content">
          <div>
  		      <div class="flex flex-row px-6 py-4 border-b border-gray-100 justify-between items-center">
			        <h1 class="text-2xl m-0">COVID-19 Types</h1>
		        </div>

            <div class="px-6 py-4">
              <a class="text-blue-500 underline" href="create.php">Add A New COVID-19 Type</a>
            </div>

            <div class="container px-6 py-2">
                <!--//show result of query-->
                <table class="border-separate">
                  <tr>
                      <th>Type</td>
                  </tr>
                  <? while($row = $statement->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row["type"] ?></td>
                        <td>
                            <!-- pass pID to edit and delete php file-->
                            <a class="text-blue-500 underline" href="show.php?type=<?= $row["type"] ?>" >Show</a>
                            <a class="text-blue-500 underline" href="edit.php?type=<?= $row["type"] ?>" >Edit</a>
                            <a class="text-red-500 underline" href="delete.php?type=<?= $row["type"] ?>" >Delete</a>
                        </td>
                    </tr>
                  <? } ?>
                </table>
            </div>
          </div>
        </div>  
    </div> 
    <!-- Bottom Grid -->
  <div class="w3-container w3-black footer w3-center w3-opacity w3-padding-64">
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