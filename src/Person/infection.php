<?php require_once '../database.php';

$query = "SELECT type
FROM bnc353_2.infectionVariant AS inf";
$infectionTypes = $conn->query($query);

$pID = $_GET['pID'];
if(isset($_POST["dateOfInfection"]) 
        && isset($_POST["pID"])
        && isset($_POST["type"])){

            
    $dateOfInfection= $_POST["dateOfInfection"];
    $type= $_POST["type"];
    $pID= $_POST["pID"];

    $query = "INSERT INTO bnc353_2.covidhistory                                     
                            (personID,
                            dateOfInfection,
                            type)
                            VALUES
                            ('$pID',
                            '$dateOfInfection',
                            '$type')";


    if($conn->query($query) == true){
            //if succefull go back
            if (headers_sent()) {
                die("Redirect failed. Please click on this link: <a href='./''>Back to list of persons</a>");
            }
            else{
                exit(header("Location: ."));
            }
    }else{
        //else stay in edit page
        if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href='./infection.php?pID='$pID'>Retry</a>");
        }
        else{
            exit(header("Location: ./infection.php?pID='$pID'"));
        }
    }
     
}
$page_title="Person | Create"; 
include '../header.php';
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
                <div class="flex flex-col items-center w-full">
                    <h1 class="text-extrabold text-2xl mb-4">Add Infection</h1>
                </div>

                <div class="container px-6 py-2">
                    <form action="./infection.php" method="post"  class="flex flex-col p-4 border border-gray-50 border-separate flex flex-col items-center w-full">
                        <label for="dateOfInfection"> Date of the Infection </label>
                        <input type="date" name="dateOfInfection" id="dateOfInfection" class="border-2 border-gray-100 rounded-md px-2 py-2"><br>
                        <label for="type"> Type </label>
                        <select name="type" id="type">

                            <? while($row = $infectionTypes->fetch_assoc()) { ?>
                                <option value="<?= $row["type"] ?>"><?= $row["type"] ?></option>
                            <? } ?>
                        </select><br>  
                        <input type="hidden" name="pID" id="pID" value="<?= $_GET['pID']?>"> <br>
                      
                        <button type="submit" class="bg-blue-300 rounded-md py-2"> Create </button>
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