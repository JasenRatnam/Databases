<?php require_once '../database.php';


//get current data of person

$name = $_GET['name'];
$query_a = "SELECT * FROM bnc353_2.Facility AS Facility WHERE Facility.name='$name';";

$result = $conn->query($query_a);
$facility = $result->fetch_assoc();

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
	
	$ogName = $_POST["ogName"];

    $query = "UPDATE bnc353_2.Facility 
                            SET 
							    name = '$name',
                                address='$address', 
                                city='$city', 
                                province='$province', 
                                postalCode='$postalCode', 
                                phone='$phone', web='$web',
                                openingTime='$openingTime', 
                                closingTime='$closingTime', 
                                type='$type', 
                                category='$category',
                                capacity='$capacity', 
                                managerID=$managerID
	                        WHERE name='$ogName';";
    if ($conn->query($query) == true) {
        //if succefull go back
        if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href='./''>Back to list of facilities</a>");
        } else {
            exit(header("Location: ."));
        }
    } else {
        //else stay in edit page
        if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href='./edit.php?pID= .$_POST[pID]''>Retry</a>");
        } else {
            exit(header("Location: ./edit.php?pID=" . $_POST["pID"]));
        }
    }
}
$page_title="Facility | Edit"; 
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
                <div class="flex flex-col items-center">
                    <h1 class="text-2xl font-extrabold mb-2">Edit Facility</h1>
                </div>

                <div class="container px-6 py-2">
                    <!-- form with original data shown -->
                    <form action="./edit.php" method="post" class="flex flex-col border border-gray-50 p-4 border-separate flex flex-col items-center w-full">
                        <label for="name"> Facility Name </label>
                        <input type="text" name="name" id="name" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $facility['name'] ?>"><br>
                        <label for="address"> Address </label>
                        <input type="text" name="address" id="address" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $facility['address'] ?>"><br>
                        <label for="city"> City </label>
                        <input type="text" name="city" id="city" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $facility['city'] ?>"><br>
                        <label for="province"> Province </label>
                        <select name="province" id="province">
                            <option value="AB" <?php if ($facility['province'] == 'AB') {echo "selected"; } ?>>Alberta</option>
                            <option value="BC" <?php if ($facility['province'] == 'BC') {echo "selected"; } ?>>British Colombia</option>
                            <option value="MB" <?php if ($facility['province'] == 'MB') {echo "selected"; } ?>>Manitoba</option>
                            <option value="NB" <?php if ($facility['province'] == 'NB') {echo "selected"; } ?>>New Brunswick</option>
                            <option value="NL" <?php if ($facility['province'] == 'NL') {echo "selected"; } ?>>Newfoundland and Labrador</option>
                            <option value="NT" <?php if ($facility['province'] == 'NT') {echo "selected"; } ?>>Northwest Territories</option>
                            <option value="NS" <?php if ($facility['province'] == 'NS') {echo "selected"; } ?>>Nova Scotia</option>
                            <option value="NU" <?php if ($facility['province'] == 'NU') {echo "selected"; } ?>>Nunavut</option>
                            <option value="ON" <?php if ($facility['province'] == 'ON') {echo "selected"; } ?>>Ontario</option>
                            <option value="PE" <?php if ($facility['province'] == 'PE') {echo "selected"; } ?>>Prince Edward Island</option>
                            <option value="QC" <?php if ($facility['province'] == 'QC') {echo "selected"; } ?>>Quebec</option>
                            <option value="SK" <?php if ($facility['province'] == 'SK') {echo "selected"; } ?>>Saskatchewan</option>
                            <option value="YT" <?php if ($facility['province'] == 'YT') {echo "selected"; } ?>>Yukon</option>
                        </select><br>
                        <label for="postalCode"> Postal Code </label>
                        <input type="text" name="postalCode" id="postalCode" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $facility['postalCode'] ?>"><br>
                        <label for="phone"> Phone </label>
                        <input type="text" name="phone" id="phone" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $facility['phone'] ?>"><br>
                        <label for="web"> Website </label>
                        <input type="text" name="web" id="web" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $facility['web'] ?>"><br>
                        <label for="openingTime"> Opening time </label>
                        <input type="time" name="openingTime" id="openingTime" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $facility['openingTime'] ?>"><br>
                        <label for="closingTime"> Closing time </label>
                        <input type="time" name="closingTime" id="closingTime" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $facility['closingTime'] ?>"><br>
                        <label for="type"> Type </label>
                        <select name="type" id="type" value="<?= $facility['type'] ?>">
                            <option value="hospital">Hospital</option>
                            <option value="clinic">Clinic</option>
                            <option value="special">Special</option>
                        </select><br>
                        <label for="category"> Category </label>
                        <select name="category" id="category" value="<?= $facility['category'] ?>">
                            <option value="appointment">Appointment</option>
                            <option value="walkIN-Appointment">Walk-In Appointment</option>
                        </select><br>
                        <label for="capacity"> Capacity </label>
                        <input type="text" name="capacity" id="capacity" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $facility['capacity'] ?>"><br>
                        <label for="managerID"> Manager ID </label>
                        <input type="text" name="managerID" id="managerID" value="NULL" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?= $facility['managerID'] ?>"><br>
                        <br>
						<input type="hidden" name="ogName" id="ogName" value="<?= $facility["name"]?>"> <br>
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
