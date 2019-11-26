<?php

	require_once 'connDB.php';
  require_once('queriesGetRoomInfo.php');

	$dbh = db_connect();

	if( isset($_POST['RoomID']) ) {
    $results = array();
    $roomID = $_POST['RoomID'];
		$rows = getRoomPeople($dbh, $roomID);
    foreach($rows as $data) {
      $results[] = array('id' => $data['PersonID'], 'FName' => $data['FName'], 'LName' => $data['LName']);
    }
    print json_encode($results);
	}
  
  db_close($dbh);
?>