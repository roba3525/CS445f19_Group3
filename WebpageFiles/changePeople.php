<?php

	require_once 'connDB.php';
  require_once('queriesGetRoomInfo.php');

	$dbh = db_connect();

	if( isset($_POST['RoomID']) ) {

    $roomID = $_POST['RoomID'];
		$rows = getRoomPeople($dbh, $roomID);
    
    print json_encode($rows['PersonID']);
	}
  
  db_close($dbh);
?>