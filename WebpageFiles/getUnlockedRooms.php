<?php

	require_once 'connDB.php';
  require_once('queryGetUnlockedRooms.php');

	$dbh = db_connect();

	if( (isset($_POST['BldgID'])) &&
      (isset($_POST['PlayerID']))) {
    $results = array();
    $bldgID = $_POST['BldgID'];
    $playerID = $_POST['PlayerID'];
		$rows = queryGetUnlockedRooms($dbh, $bldgID, $playerID);
    foreach($rows as $data) {
      $results[] = array('id' => $data['RoomID']);
    }
    print json_encode($results);
	}
  
  db_close($dbh);
?>