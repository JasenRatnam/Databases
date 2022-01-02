<?php require_once '../database.php';

$Err = "";

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
        && isset($_POST["passNum"])){

            
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

    $passNum= $_POST["passNum"];

    $query = "INSERT INTO bnc353_2.Person                                     
                            (firstName,
                            middleInitial,
                            lastName,
                            dob,
                            telNum,
                            address,
                            city,
                            province,
                            postalCode,
                            citizenship,
                            email)
                            VALUES
                            ('$firstName',
                            '$middleInitial',
                            '$lastName',
                            '$dob',
                            '$telNum',
                            '$address',
                            '$city',
                            '$province',
                            '$postalCode',
                            '$citizenship',
                            '$email')";
echo $query;

    if($conn->query($query) == true){

        $query = "INSERT INTO bnc353_2.NotRegistered                                     
                           (pID,
                           passNum)
                            VALUES
                            ((
                                SELECT pID FROM bnc353_2.Person AS p WHERE p.firstName = '$firstName'
                            ),
                            '$passNum')";

        if($conn->query($query) == true){


            //if succefull go back
            if (headers_sent()) {
                die("Redirect failed. Please click on this link: <a href='./''>Back to list of persons</a>");
            }
            else{
                exit(header("Location: ."));
            }
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
                    <h1 class="text-extrabold text-2xl mb-4">Create Person</h1>
                </div>

                <div class="container px-6 py-2">
                    <form action="./create-non-registered.php" method="post"  class="flex flex-col p-4 border border-gray-50 border-separate flex flex-col items-center w-full">
                        <label for="firstName"> First Name </label>
                        <input type="text" name="firstName" id="firstName" class="border-2 border-gray-100 rounded-md px-2 py-2"><br>
                        <label for="middleInitial"> Middle Initial </label>
                        <input type="text" name="middleInitial" id="middleInitial" class="border-2 border-gray-100 rounded-md px-2 py-2"><br>
                        <label for="lastName"> Last Name </label><br>
                        <input type="text" name="lastName" id="lastName" class="border-2 border-gray-100 rounded-md px-2 py-2"> <br>
                        <label for="dob"> Date of Birth </label><br>
                        <input type="date" name="dob" id="dob" > <br>
                        <label for="telNum"> Telephone Number </label><br>
                        <input type="tel" name="telNum" id="telNum" class="border-2 border-gray-100 rounded-md px-2 py-2"> <br>
                        <label for="address"> Address </label><br>
                        <input type="text" name="address" id="address" class="border-2 border-gray-100 rounded-md px-2 py-2"> <br>
                        <label for="city"> City </label><br>
                        <input type="text" name="city" id="city" class="border-2 border-gray-100 rounded-md px-2 py-2"> <br>
                        <label for="province"> Province </label><br>
                        <select name="province" id="province">
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
                        <input type="text" name="postalCode" id="postalCode" class="border-2 border-gray-100 rounded-md px-2 py-2"> <br>
                        <label for="citizenship"> Citizenship </label><br>
                        <input type="text" name="citizenship" id="citizenship" class="border-2 border-gray-100 rounded-md px-2 py-2"> <br>
                        <label for="email"> Email </label><br>
                        <input type="email" name="email" id="email" class="border-2 border-gray-100 rounded-md px-2 py-2"> <br>
                        
                        <label for="passNum"> Passport Number </label><br>
                        <input type="number" name="passNum" id="passNum" class="border-2 border-gray-100 rounded-md px-2 py-2"> <br>
                        
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