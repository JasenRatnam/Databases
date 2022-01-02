<?php require_once '../database.php';

$vID = $_GET['vID'];
$query = "DELETE 
    FROM bnc353_2.Vaccination
        WHERE vID = '$vID';";

$result = $conn->query($query);

if (headers_sent()) {
    die("Redirect failed. Please click on this link: <a href='./''>Back to list of persons</a>");
}
else{
    exit(header("Location: ."));
}
?>