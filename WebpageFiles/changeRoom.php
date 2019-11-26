<?php

	require_once 'connDB.php';

	$dbh = db_connect();

	if( isset($_POST['RoomID']) ) {
    
		$roomID = $_POST['RoomID'];
		$sth = $dbh->prepare("SELECT Name FROM Rooms WHERE RoomID = :roomID");
		$sth->bindValue(":roomID", $roomID);
		
	  $sth->execute();
	  
	  $row = $sth->fetch();
    echo $row['Name'];
	}
  
  db_close($dbh);
?>