<?php

require 'connection.php';
header('Content-Type: application/json');

$utcTotalTime = new MongoDB\BSON\UTCDateTime((time()+7200) * 1000);
$currentYear = $utcTotalTime->toDateTime()->format('Y');

$cursor = $db->library->find([],[
	'projection' => array(
		'_id' => 0,
		'carrier' => 0
	)
]);
$result = iterator_to_array($cursor);



if ($result !== "") {
	$films = array();
	foreach ($result as $key => $film) {
		$filmDate = $film['date']->toDateTime()->format('Y');
		if ($filmDate == $currentYear){
			$film['date'] = $filmDate;
			$films[] = $film;
		}
	}
}


echo json_encode($films);