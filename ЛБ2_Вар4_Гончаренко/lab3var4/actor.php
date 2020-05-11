<?php

header('Content-Type: application/json');
require 'connection.php';


$cursor = $db->library->find([
	'actors' => $_GET['actor_film']
],[
	'projection' => array(
		'_id' => 0,
		'title' => 1
	)
]);
$result = "";
if ($cursor != "") {
	$result = iterator_to_array($cursor);
	$titles = array();
	foreach ($result as $title) {
		$titles[] = $title['title'];
	}
}


echo json_encode($titles);