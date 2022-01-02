<?php require_once '../database.php';
                         

//get current data of person

$name = $_GET['name'];
$query_a = "SELECT * FROM bnc353_2.Vaccine AS Vaccine WHERE name='$name';"; 

$result = $conn->query($query_a);
$vaccine = $result->fetch_assoc();

if(isset($_POST["name"])
        && isset($_POST["status"])
        && isset($_POST["approvedDate"])
        && isset($_POST["suspendedDate"])
        && isset($_POST["description"])){

    $q_name= $_POST["name"];
    $status= $_POST["status"];
    $appDate= $_POST["approvedDate"];
    $suspDate= $_POST["suspendedDate"];
    $desc= $_POST["description"];

    if($suspDate == NULL){
        $query = "UPDATE bnc353_2.Vaccine SET name='$q_name', status='$status',
	 approvalDate='$appDate', suspendedDate=NULL, description='$desc'
	 WHERE name='$q_name';"; 
    }
    else{
        $query = "UPDATE bnc353_2.Vaccine SET name='$q_name', status='$status',
	 approvalDate='$appDate', suspendedDate='$suspDate', description='$desc'
	 WHERE name='$q_name';"; 
    }

	if($conn->query($query) == true){
        //if succefull go back
        if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href='./''>Back to list of vaccine</a>");
        }
        else{
            exit(header("Location: ."));
        }
    } else{
        //else stay in edit page
        if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href='./edit.php?name=$q_name'>Retry</a>");
        }
        else{
            exit(header("Location: ./edit.php?name=" .$_POST["name"]));
        }
    }
}
$page_title = "Vaccine | Edit";
include '../header.php';
?>


<body>
    <div class="w3-top">
        <div class="w3-bar w3-red w3-card w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="../" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
            <a href="../Person/" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Person</a>
            <a href="../Vaccination" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Vaccination</a>
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
                <div class="flex flex-col items-center">
    	            <h1 class="text-2xl font-extrabold mb-2">Edit Vaccine</h1>
                </div>

                <div class="container px-6 py-2">
                    <!-- form with original data shown -->
                    <form action="./edit.php" method="post" class="flex flex-col border border-gray-50 p-4">
                        <label for="name"> Vaccine Name </label>
                        <input type="text" name="name" id="name" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?=$vaccine['name']?>" readonly><br>
                        <label for="status"> Status </label>
                        <select name="status" id="status" value="<?=$vaccine['status']?>">
                        <option selected="selected"> <?=$vaccine['status']?></option>
                            <option value="SAFE">SAFE</option>
                            <option value="SUSPENDED">SUSPENDED</option>
                        </select><br>
                        <label for="appDate"> Approved Date </label>
                        <input type="date" name="approvedDate" id="appDate" value="<?=$vaccine['approvalDate']?>" > <br>
                        <label for="susDate"> Suspended Date </label>
                        <input type="date" name="suspendedDate" id="susDate" value="<?=$vaccine['suspendedDate']?>"> <br>
                        <label for="desc"> Description </label>
                        <input type="text" name="description" id="desc" class="border-2 border-gray-100 rounded-md px-2 py-2" value="<?=$vaccine['description']?>"> <br>
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
