<?php require_once '../database.php';


//get current data of person

$pID = $_GET['pID'];
$query = "SELECT * FROM bnc353_2.Person as Person, bnc353_2.Registered as reg, bnc353_2.MedicareCard AS med 
WHERE Person.pID = '$pID' AND Person.pID = reg.pID AND reg.medicareID = med.medicardID;";

$result = $conn->query($query);
$person = $result->fetch_assoc();
$medicardID = $person['medicareID'];

if(isset($_POST["firstName"]) 
        && isset($_POST["middleInitial"])
        && isset($_POST["lastName"]) 
        && isset($_POST["dob"])
        && isset($_POST["telNum"])
        && isset($_POST["address"])
        && isset($_POST["city"])
        && isset($_POST["province"])
        && isset($_POST["postalCode"])
        && isset($_POST["citizenship"])
        && isset($_POST["email"])
        && isset($_POST["pID"])
        && isset($_POST["medicareID"])
        && isset($_POST["doissue"])
        && isset($_POST["doexpire"]) ){

    $firstName= $_POST["firstName"];
    $middleInitial= $_POST["middleInitial"];
    $lastName= $_POST["lastName"];
    $dob= $_POST["dob"];
    $telNum= $_POST["telNum"];
    $address= $_POST["address"];
    $city= $_POST["city"];
    $province= $_POST["province"];
    $postalCode= $_POST["postalCode"];
    $citizenship= $_POST["citizenship"];
    $email= $_POST["email"];
    $pID= $_POST["pID"];

    $medicareID= $_POST["medicareID"];
    $doissue= $_POST["doissue"];
    $doexpire= $_POST["doexpire"];


    $query = "UPDATE bnc353_2.Person SET 
                                    firstName = '$firstName', 
                                    middleInitial = '$middleInitial',
                                    lastName = '$lastName', 
                                    dob = '$dob',
                                    telNum = '$telNum',
                                    address = '$address',
                                    city = '$city',
                                    province = '$province',
                                    postalCode = '$postalCode',
                                    citizenship = '$citizenship',
                                    email = '$email'
                                    WHERE pID = '$pID';";


    if($conn->query($query) == true){

        $query = "UPDATE bnc353_2.MedicareCard SET 
            doissue = '$doissue',
            doexpire = '$doexpire' WHERE medicardID = '$medicardID';";

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
                    die("Redirect failed. Please click on this link: <a href='./edit-registered.php?pID='$pID'>Retry</a>");
                }
               else{
                    exit(header("Location: ./edit-registered.php?pID='$pID'"));
                }
            }
        
    } 
}
$page_title="Person | Edit"; 
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
                  <h1 class="text-2xl font-extrabold mb-2">Edit Person</h1>	
                </div>

                <div class="container px-6 py-2">
                    <!-- form with original data shown -->
                    <form action="./edit-registered.php?pID=<?= $person["pID"] ?>" method="post" class="flex flex-col border border-gray-50 p-4 border-separate flex flex-col items-center w-full">
                        <label for="firstName"> First Name </label><br>
                        <input type="text" name="firstName" id="firstName" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $person["firstName"]?>"> <br>
                        <label for="middleInitial"> Middle Initial </label><br>
                        <input type="text" name="middleInitial" id="middleInitial" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $person["middleInitial"]?>"> <br>
                        <label for="lastName"> Last Name </label><br>
                        <input type="text" name="lastName" id="lastName" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $person["lastName"]?>"> <br>
                        <label for="dob"> Date of Birth </label><br>
                        <input type="date" name="dob" id="dob" value="<?= $person["dob"]?>"> <br>
                        <label for="telNum"> Telephone Number </label><br>
                        <input type="tel" name="telNum" id="telNum" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $person["telNum"]?>"> <br>
                        <label for="address"> Address </label><br>
                        <input type="text" name="address" id="address" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $person["address"]?>"> <br>
                        <label for="city"> City </label><br>
                        <input type="text" name="city" id="city" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $person["city"]?>"> <br>
                        <label for="province"> Province </label><br>
                        <select name="province" id="province">
                            <option selected="selected"> <?=$person['province']?></option>
                            <option value="AB">AB</option>
                            <option value="BC">BC</option>
                            <option value="MB">MB</option>
                            <option value="NB">NB</option>
                            <option value="NL">NL</option>
                            <option value="NT">NT</option>
                            <option value="NS">NS</option>
                            <option value="NU">NU</option>
                            <option value="ON">ON</option>
                            <option value="PE">PE</option>
                            <option value="QC">QC</option>
                            <option value="SK">SK</option>
                            <option value="YT">YT</option>
                        </select><br>
                        <label for="postalCode"> Postal Code </label><br>
                        <input type="text" name="postalCode" id="postalCode" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $person["postalCode"]?>"> <br>
                        <label for="citizenship"> Citizenship </label><br>
                        <input type="text" name="citizenship" id="citizenship" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $person["citizenship"]?>"> <br>
                        <label for="email"> Email </label><br>
                        <input type="email" name="email" id="email" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $person["email"]?>"> <br>
                        
                        <label for="medicareID"> Medicare ID Number </label><br>
                        <input type="number" name="medicareID" id="medicareID" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $person["medicareID"]?>" readonly> <br>
                        <label for="doissue"> Date of Issue </label><br>
                        <input type="date" name="doissue" id="doissue" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $person["doissue"]?>"> <br>
                        <label for="doexpire"> Date of Expire </label><br>
                        <input type="date" name="doexpire" id="doexpire" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $person["doexpire"]?>"> <br>
                        
                        
                        <input type="hidden" name="pID" id="pID" value="<?= $person["pID"]?>"> <br>
                        <button type="submit" class="bg-blue-300 rounded-md py-2"> Update </button>
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