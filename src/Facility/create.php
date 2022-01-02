<?php require_once '../database.php';

$Err = "";

$query = "SELECT CONCAT(p.firstName , ' ', p.lastName) as name, SSN
	  FROM bnc353_2.PublicHealthWorker phw, bnc353_2.Registered r, bnc353_2.Person p 
	  WHERE phw.medicardID = r.medicareID AND r.pID = p.pID 
	  AND phw.`type` = 'manager';";
$manager = $conn->query($query);


if (
    isset($_POST["name"])
    && isset($_POST["address"])
    && isset($_POST["city"])
    && isset($_POST["province"])
    && isset($_POST["postalCode"])
    && isset($_POST["phone"])
    && isset($_POST["web"])
    && isset($_POST["openingTime"])
    && isset($_POST["closingTime"])
    && isset($_POST["type"])
    && isset($_POST["category"])
    && isset($_POST["capacity"])
    && isset($_POST["managerID"])){

    $name = $_POST["name"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $province = $_POST["province"];
    $postalCode = $_POST["postalCode"];
    $phone = $_POST["phone"];
    $web = $_POST["web"];
    $openingTime = $_POST["openingTime"];
    $closingTime = $_POST["closingTime"];
    $type = $_POST["type"];
    $category = $_POST["category"];
    $capacity = $_POST["capacity"];
    $managerID = $_POST["managerID"];
    $query = "INSERT INTO bnc353_2.Facility (name, address, city, province, postalCode, phone, web, openingTime, closingTime, type, category, capacity) 
                            VALUES ('$name', 
                                    '$address', 
                                    '$city',
                                    '$province', 
                                    '$postalCode', 
                                    '$phone', 
                                    '$web',
                                    '$openingTime',
                                    '$closingTime',
                                    '$type',
                                    '$category',
                                   $capacity);";
    if ($conn->query($query) == true) {
        if ($managerID != -1) { 
	    $query = "INSERT INTO bnc353_2.WorksAt (SSN, facilityName, eID, startDate, hourlyWage) 
		      VALUES ($managerID, '$name'," . rand() .  ", '" . date("Y-m-d") . "', 50.00);";
	    if ($conn->query($query) == true) {
		$query = "UPDATE bnc353_2.Facility SET managerID = (SELECT eID FROM bnc353_2.WorksAt WHERE SSN=$managerID and facilityName='$name')
			  WHERE name = '$name';";
		if ($conn->query($query)) {
		//if succefull go back
        	if (headers_sent()) {
            	    die("Redirect failed. Please click on this link: <a href='./''>Back to list of facilities</a>");
        	} else {
            	    exit(header("Location: ."));
        	}
		}
	    } else {
		echo $conn->error;
	    } 
	} else {

 	//if succefull go back
        if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href='./''>Back to list of facilities</a>");
        } else {
            exit(header("Location: ."));
        }
	}
    }
}
	echo $conn->error;
    $page_title="Facility | Create"; 
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
            <a href="../Facility" class="w3-bar-item w3-button w3-padding-large w3-white">Public Health Facilities</a>
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
                    <h1 class="text-extrabold text-2xl mb-4">Create Facility</h1>
                </div>

                <div class="container px-6 py-2">
                    <form action="create.php" method="post" class="flex flex-col p-4 border border-gray-50 border-separate flex flex-col items-center w-full">
                        <label for="name"> Facility Name </label>
                        <input type="text" name="name" id="name" class="border-2 border-gray-100 rounded-md px-2 py-2"><br>
                        <label for="address"> Address </label>
                        <input type="text" name="address" id="address" class="border-2 border-gray-100 rounded-md px-2 py-2"><br>
                        <label for="city"> City </label>
                        <input type="text" name="city" id="city" class="border-2 border-gray-100 rounded-md px-2 py-2"><br>
                        <label for="province"> Province </label>
                        <select name="province" id="province">
                            <option value="AB">Alberta</option>
                            <option value="BC">British Colombia</option>
                            <option value="MB">Manitoba</option>
                            <option value="NB">New Brunswick</option>
                            <option value="NL">Newfoundland and Labrador</option>
                            <option value="NT">Northwest Territories</option>
                            <option value="NS">Nova Scotia</option>
                            <option value="NU">Nunavut</option>
                            <option value="ON">Ontario</option>
                            <option value="PE">Prince Edward Island</option>
                            <option value="QC">Quebec</option>
                            <option value="SK">Saskatchewan</option>
                            <option value="YT">Yukon</option>
                        </select><br>
                        <label for="postalCode"> Postal Code </label>
                        <input type="text" name="postalCode" id="postalCode" class="border-2 border-gray-100 rounded-md px-2 py-2"><br>
                        <label for="phone"> Phone </label>
                        <input type="text" name="phone" id="phone" class="border-2 border-gray-100 rounded-md px-2 py-2"><br>
                        <label for="web"> Website </label>
                        <input type="text" name="web" id="web" class="border-2 border-gray-100 rounded-md px-2 py-2"><br>
                        <label for="openingTime"> Opening time </label>
                        <input type="time" name="openingTime" id="openingTime" class="border-2 border-gray-100 rounded-md px-2 py-2"><br>
                        <label for="closingTime"> Closing time </label>
                        <input type="time" name="closingTime" id="closingTime" class="border-2 border-gray-100 rounded-md px-2 py-2"><br>
                        <label for="type"> Type </label>
                        <select name="type" id="type">
                            <option value="hospital">Hospital</option>
                            <option value="clinic">Clinic</option>
                            <option value="special">Special</option>
                        </select><br>
                        <label for="category"> Category </label>
                        <select name="category" id="category">
                            <option value="appointment">Appointment</option>
                            <option value="walkIN-Appointment">Walk-In Appointment</option>
                        </select><br>
                        <label for="capacity"> Capacity </label>
                        <input type="number" name="capacity" id="capacity" class="border-2 border-gray-100 rounded-md px-2 py-2"><br>
                        <label for="manager"> Manager </label>
			            <select name="managerID" id="manager">
                            <option value="-1">None</option>
			                <? while($row = $manager->fetch_assoc()) {?>			
                            <option value="<?= $row['SSN'] ?>"><?= $row['name'] ?></option>
			                <? } ?>
                        </select><br>
                        <!-- <input type="number" name="managerID" value="-1" id="managerID" class="border-2 border-gray-100 rounded-md px-2 py-2"><br> -->
                        <br>
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
