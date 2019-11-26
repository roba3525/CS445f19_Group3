<?php

	require_once 'connDB.php';
  require_once('queryGetRoomsByBuildingID.php');

	$dbh = db_connect();

	if( isset($_POST['BldgID']) ) {
    $results = array();
    $bldgID = $_POST['BldgID'];
		$rows = queryGetRoomsByBuildingID($dbh, $bldgID);
    foreach($rows as $data) {
      $results[] = array('id' => $data['RoomID'], 'name' => $data['Name']);
    }
    print json_encode($results);
	}
  
  db_close($dbh);
?>