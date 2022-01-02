<?php require_once '../database.php';

$query = "SELECT medicareID
FROM bnc353_2.Registered AS reg";
$medicareIDList = $conn->query($query);


if(isset($_POST["SSN"]) 
        && isset($_POST["medicardID"])
        && isset($_POST["type"])){

            
    $SSN= $_POST["SSN"];
    $medicardID= $_POST["medicardID"];
    $type= $_POST["type"];

    $query = "INSERT INTO bnc353_2.PublicHealthWorker                                     
                            (SSN,
                            medicardID,
                            type)
                            VALUES
                            ('$SSN',
                            '$medicardID',
                            '$type')";


    if($conn->query($query) == true){
        //if succefull go back
        if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href='../Person''>Back to list of workers</a>");
        }
        else{
            exit(header("Location: ../Person"));
        }
    } 
}
$page_title="Public Health Worker | Create"; 
include '../header.php';
?>

<body>
    <div class="w3-top">
        <div class="w3-bar w3-red w3-card w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="../" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
            <a href="../Person/" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white">Person</a>
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
                    <h1 class="text-extrabold text-2xl mb-4">Create Worker</h1>
                </div>

                <div class="container px-6 py-2">
                    <form action="./create.php" method="post"  class="flex flex-col p-4 border border-gray-50">
                        <label for="SSN"> SSN </label>
                        <input type="number" name="SSN" id="SSN" class="border-2 border-gray-100 rounded-md px-2 py-2"><br>
                        <label for="medicardID"> Medicard ID </label>
                        <select name="medicardID" id="medicardID">

                            <? while($row = $medicareIDList->fetch_assoc()) { ?>
                                <option value="<?= $row["medicareID"] ?>"><?= $row["medicareID"] ?></option>
                            <? } ?>
                        </select><br> 

                        <label for="type"> Type </label>
                        <select name="type" id="type" value="<?=$worker['type']?>">
                            <option value="nurse">Nurse</option>
                            <option value="secretary">Secretary</option>
                            <option value="manager">Manager</option>
                            <option value="security">Security</option>
                            <option value="regular">Regular</option>
                        </select><br>
                        <button type="submit" class="bg-blue-300 rounded-md py-2"> Create </button>
                    </form>
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