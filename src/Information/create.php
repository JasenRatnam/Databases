<?php require_once '../database.php';

if(isset($_POST["name"]) 
        && isset($_POST["status"]) 
        && isset($_POST["approvedDate"])
        && isset($_POST["suspendedDate"])
        && isset($_POST["description"])){

    $name= $_POST["name"];
    $status= $_POST["status"];
    $appDate= $_POST["approvedDate"];
    $suspDate= $_POST["suspendedDate"];
    $desc= $_POST["description"];

    if($suspDate = 'yyyy-mm-dd'){
        $query = "INSERT INTO bnc353_2.Vaccine (name, status, approvalDate, description) 
		VALUES ('$name', '$status', '$appDate', '$desc');";
    }
    else{
        $query = "INSERT INTO bnc353_2.Vaccine (name, status, approvalDate, suspendedDate, description) 
            VALUES ('$name', '$status', '$appDate', '$suspDate', '$desc');";                                     
    }

    if($conn->query($query) == true){
        //if succefull go back
        if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href='./''>Back to list of vaccine.</a>");
        }
        else{
            exit(header("Location: ."));
        }
    } 
}
include '../header.php';
$page_title = "Vaccine | Create";
?>

<body>
    <div class="w3-top">
        <div class="w3-bar w3-red w3-card w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="../" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
            <a href="../Person/" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Person</a>
            <a href="../Vaccination" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Vaccination</a>
            <a href="../Vaccine" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white">Vaccine</a>
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
                    <h1 class="text-extrabold text-2xl mb-4">Create Vaccine</h1>
                </div>

                <div class="container px-6 py-2">
                    <form action="./create.php" method="post" class="flex flex-col p-4 border border-gray-50 border-separate flex flex-col items-center w-full">
                        <label for="name"> Vaccine Name </label>
                        <input type="text" name="name" id="name" class="border-2 border-gray-100 rounded-md px-2 py-2"><br>
                        <label for="status"> Status </label>
                        <select name="status" id="status">
                            <option value="SAFE">SAFE</option>
                            <option value="SUSPENDED">SUSPENDED</option>
                        </select><br>
                            <label for="appDate"> Approved Date </label>
                        <input type="date" name="approvedDate" id="appDate" > <br>
                        <label for="susDate"> Suspended Date </label>
                        <input type="date" name="suspendedDate" id="susDate"> <br>
                        <label for="desc"> Description </label>
                        <input type="text" name="description" id="desc" class="border-2 border-gray-100 rounded-md px-2 py-2"> <br>
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
