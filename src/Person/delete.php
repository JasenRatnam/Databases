<?php require_once '../database.php';

$pID = $_GET['pID'];
$query = "DELETE 
    FROM bnc353_2.Person
        WHERE Person.pID = '$pID';";

$result = $conn->query($query);

if (headers_sent()) {
    die("Redirect failed. Please click on this link: <a href='./''>Back to list of persons</a>");
}
else{
    exit(header("Location: ."));
}
?>