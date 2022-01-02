<?php require_once '../database.php';

$name = $_GET['name'];
$query = "DELETE FROM bnc353_2.Vaccine AS Vaccine WHERE name = '$name'";

$result = $conn->query($query);

if (headers_sent()) {
    die("Redirect failed. Please click on this link: <a href='./''>Back to list of Vaccine</a>");
}
else{
    exit(header("Location: ."));
}
?>
