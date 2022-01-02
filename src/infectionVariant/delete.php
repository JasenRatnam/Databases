<?php require_once '../database.php';

$type = $_GET['type'];
$query = "DELETE 
    FROM bnc353_2.infectionVariant
        WHERE type = '$type';";

$result = $conn->query($query);

if (headers_sent()) {
    die("Redirect failed. Please click on this link: <a href='./''>Back to list of COVID-19 Types</a>");
}
else{
    exit(header("Location: ."));
}
?>