<?php require_once '../database.php';

$SSN = $_GET['SSN'];
$query = "DELETE FROM bnc353_2.PublicHealthWorker AS PublicHealthWorker WHERE SSN = '$SSN';";

$result = $conn->query($query);

if (headers_sent()) {
    die("Redirect failed. Please click on this link: <a href='../Person''>Back to list of Workers</a>");
}
else{
    exit(header("Location: ."));
}
?>
