<?php

$cursor = $db->library->find([],[
	'projection' => array(
		'actors' => 1
	)
]);
$result = iterator_to_array($cursor);

$outputActor = array();
foreach ($result as $actor) {
	foreach ($actor['actors'] as $actorName) {
		$outputActor[] = $actorName;
	}
}
$outputActor = array_unique($outputActor);