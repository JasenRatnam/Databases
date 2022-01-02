<?php require_once '../database.php';

$SSN = $_GET['SSN'];
$facilityName = $_GET['facilityName'];
$query = "DELETE 
    FROM bnc353_2.WorksAt WA
        WHERE WA.SSN = '$SSN'  AND WA.facilityName = '$facilityName';";

$result = $conn->query($query);

if (headers_sent()) {
    die("Redirect failed. Please click on this link: <a href='./''>Back to list of Assignments</a>");
}
else{
    exit(header("Location: ."));
}
?>