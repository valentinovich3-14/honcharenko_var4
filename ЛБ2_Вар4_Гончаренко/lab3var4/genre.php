<?php

require 'connection.php';
header('Content-Type: application/json');

$cursor = $db->library->find([
	'carrier'		=>	'видеокассета'
],[
	'projection' => array(
		'_id' => 0,
		'carrier' => 0
	)
]);
$result = iterator_to_array($cursor);



if ($result !== "") {
	foreach ($result as $key => $film) {
		$film['date'] = $film['date']->toDateTime()->format('d.m.Y');
	}
}

echo json_encode($result);