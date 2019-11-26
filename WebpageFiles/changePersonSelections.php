<?php

	require_once 'connDB.php';

	$dbh = db_connect();

	if( isset($_POST['RoomID']) ) {
    $results = array();
    $roomID = $_POST['RoomID'];
		$rows = getRoomItems($dbh, $roomID, 0);
    foreach($rows as $data) {
      $results[] = array('id' => $data['ItemID'], 'Name' => $data['Name']);
    }
    print json_encode($results);
	}
  
  db_close($dbh);
?>