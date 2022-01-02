<?php require_once '../database.php';


//get current data of person

$SSNOG = $_GET['SSN'];
$query = "SELECT * FROM bnc353_2.PublicHealthWorker AS PHW 
    WHERE PHW.SSN = '$SSNOG';";

$result = $conn->query($query);
$worker = $result->fetch_assoc();
$SSNOriginal = $worker['SSN'];


if(isset($_POST["SSN"]) 
        && isset($_POST["type"])){

    $SSN= $_POST["SSN"];
    $type= $_POST["type"];

    $query = "UPDATE bnc353_2.PublicHealthWorker AS PHW SET 
                                    SSN = '$SSN',
                                    type = '$type'
                                    WHERE PHW.SSN = '$SSNOG';";

    if($conn->query($query) == true){
        
        //if succefull go back
        if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href='../Person''>Back to list of workers</a>");
        }
        else{
            exit(header("Location: ../Person"));
        }
    } else{
        //else stay in edit page
        if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href='./edit.php?pID= .$_POST[pID]''>Retry</a>");
        }
        else{
            exit(header("Location: ./edit.php?pID=" .$_POST["pID"]));
        }
    }
}
$page_title="Public Health Worker | Edit"; 
	include '../header.php';
?>

<body>
    <div class="w3-top">
        <div class="w3-bar w3-red w3-card w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="../" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
            <a href="../Person/" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white">Person</a>
            <a href="../Vaccination" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Vaccination</a>
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
                <div class="flex flex-col items-center">
                  <h1 class="text-2xl font-extrabold mb-2">Edit Public Health Worker</h1>	
                </div>

                <div class="container px-6 py-2">
                  <!-- form with original data shown -->
                  <form action="./edit.php?SSN=<?= $worker["SSN"] ?>" method="post" class="flex flex-col border border-gray-50 p-4">
                      <label for="medicardID"> Medicard ID </label><br>
                      <input type="text" name="medicardID" id="medicardID" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $worker["medicardID"]?>" readonly> <br>    
                      <label for="SSN"> SSN </label><br>
                      <input type="number" name="SSN" id="SSN" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $worker["SSN"]?>"> <br>
                      <label for="type"> Type </label>
                      <select name="type" id="type" value="<?=$worker['type']?>">
                        <option selected="selected"> <?=$worker['type']?></option>
                        <option value="nurse">Nurse</option>
                        <option value="secretary">Secretary</option>
                        <option value="manager">Manager</option>
                        <option value="security">Security</option>
                        <option value="regular">Regular</option>
                      </select><br>
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