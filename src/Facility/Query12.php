<?php require_once '../database.php';
$page_title="Facility | Montreal";
        include '../header.php';


$facilityName = $_POST['facility'];
$date = $_POST['date'];

$query = "SELECT date, startTime FROM 
(SELECT date, startTime, 'FREE' AS status
FROM (WITH RECURSIVE cte3 AS
(
	SELECT '$date' AS date
	UNION ALL
	SELECT ADDDATE(date, 1)
	FROM cte3
	WHERE ADDDATE(date, 1) <= ADDDATE('$date', 20)
)
select * from cte3) dates,
(WITH RECURSIVE cte AS 
(
	SELECT f.openingTime AS startTime
	FROM bnc353_2.Facility f 
	WHERE name = '$facilityName'
	UNION ALL
	SELECT ADDTIME(startTime, '00:20:00')
	FROM cte
	WHERE ADDTIME(startTime, '00:20:00') < (SELECT closingTime FROM bnc353_2.Facility f3 WHERE name = '$facilityName') 
) SELECT * FROM cte
) schedule
WHERE (date, startTime) NOT IN (SELECT date, time
				FROM bnc353_2.bookings
				WHERE facility = '$facilityName')
UNION
SELECT date, time as startTime, 'BOOKED' as Status
FROM bnc353_2.bookings b2
WHERE facility = '$facilityName' AND date BETWEEN '$date' AND ADDDATE('$date', 20)) fullSchedule
WHERE status = 'FREE'
ORDER BY date, startTime
LIMIT 1;";

$result = $conn->query($query);

?>

<body>
    <div class="w3-top">
        <div class="w3-bar w3-red w3-card w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="../" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
            <a href="../Person/" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Person</a>
            <a href="../Vaccination" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Vaccination</a>
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
				<div class="container px-6 py-2">
				<div class="flex flex-row px-6 py-4 border-b border-gray-100 justify-between items-center">
					  <h1 class="text-2xl m-0"></h1>
					</div>
					<div class="flex flex-row px-6 py-4 border-b border-gray-100 justify-between items-center">
						<h1 class="text-2xl m-0">First available booking starting on <?= date("F jS, Y", strtotime($date)) ?></h1>
					</div>
					  <!--//show result of query-->
					  <table class="border-separate">
						<tr>
						  <th>Date</th>
						  <th>Appointment Time</td>
						</tr>
						<? while($row = $result->fetch_assoc()) { ?>
						  <tr>
							<td><?= $row["date"] ?></td>
							<td><?= $row["startTime"] ?></td>
						  </tr>
						<? } ?>
					  </table>
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
