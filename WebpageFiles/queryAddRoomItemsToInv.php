<?php

	require_once 'connDB.php';

	$dbh = db_connect();

	if( (isset($_POST['RoomID'])) && (isset($_POST['CharID'])) ) {
    
    $rows = array();
    
		$roomID = $_POST['RoomID'];
    $charID = $_POST['CharID'];
		$sth = $dbh->prepare("INSERT IGNORE INTO PlayerItems (PlayerID, ItemID) SELECT :charID, ItemID FROM RoomItems WHERE RoomID = :roomID");
		$sth->bindValue(":roomID", $roomID);
    $sth->bindValue(":charID", $charID);
		
	  $sth->execute();	  
	}
  
  db_close($dbh);
?>

