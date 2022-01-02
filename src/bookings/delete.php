<?php require_once '../database.php';

$pID = $_GET['pID'];
$facility = $_GET['facility'];
$query = "DELETE 
    FROM bnc353_2.bookings AS b
        WHERE b.pID = '$pID' AND b.facility = '$facility';";

$result = $conn->query($query);

if (headers_sent()) {
    die("Redirect failed. Please click on this link: <a href='./''>Back to list of bookings</a>");
}
else{
    exit(header("Location: ."));
}
?>