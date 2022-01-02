<?php require_once '../database.php';


//get current data of person

$gID = $_GET['gID'];
$query = "SELECT * FROM bnc353_2.GroupAge WHERE groupID = $gID;";

$result = $conn->query($query);
$group = $result->fetch_assoc();

if(isset($_POST["lowerBound"]) 
        && isset($_POST["upperBound"])){

    $lb = $_POST["lowerBound"];
    $ub = $_POST["upperBound"];

    $query = "UPDATE bnc353_2.GroupAge
	      SET lowerBound = $lb, upperBound = $ub
	      WHERE groupID = $gID;"; 
    $result = $conn->query($query);
    if($result){
        //if succefull go back
        if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href='./''>Back to list of age group</a>");
        }
        else{
            exit(header("Location: ."));
        }
    } else{
        //else stay in edit page
        if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href='./edit.php?gID=$gID'>Retry</a>");
        }
        else{
            exit(header("Location: ./edit.php?gID=$gID"));
        }
    }
}
$page_title="Age Group | Edit"; 
	include '../header.php';
?>

<body>
    <div class="w3-top">
        <div class="w3-bar w3-red w3-card w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="../" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
            <a href="../Person/" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Person</a>
            <a href="../Vaccination" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Vaccination</a>
            <a href="../Vaccine" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Vaccine</a>
            <a href="../Facility" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Public Health Facilities</a>
            <a href="../bookings/" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Bookings</a>
            <a href="../infectionVariant" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">COVID-19 Types</a>
            <a href="../ProvinceAgeGroup" class="w3-bar-item w3-button w3-hide-small w3-padding-large">Provinces</a>
            <a href="../AgeGroup" class="w3-bar-item w3-button w3-padding-large w3-white">Age Groups</a>
            <a href="../worksAt" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Employee Work Assignment</a>
        </div>
    </div>

    <div class="w3-row-padding w3-padding-64 w3-container">
        <div class="w3-content">
            <div>
              <div class="flex flex-col items-center">
                <h1 class="text-2xl font-extrabold mb-2">Edit Group <?= $gID ?></h1>	
              </div>

              <div class="container px-6 py-2">
                <!-- form with original data shown -->
                <form action="./edit.php?gID=<?= $gID ?>" method="post" class="flex flex-col border border-gray-50 p-4">
		    <label> lowerBound <input type="number" min="0" value="<?= $group['lowerBound'] ?>" name="lowerBound" /> </label>
		    <label> upperBound <input type="number" min="0" value="<?= $group['upperBound'] ?>" name="upperBound" /> </label>
                    <button type="submit" class="bg-blue-300 rounded-md py-2"> Update </button>
                </form>
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
