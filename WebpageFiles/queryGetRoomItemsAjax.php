<?php

	require_once 'connDB.php';

	$dbh = db_connect();

	if( isset($_POST['RoomID']) ) {
    
    $rows = array();
    
		$roomID = $_POST['RoomID'];
		$sth = $dbh->prepare("SELECT Items.ItemID FROM Items, RoomItems WHERE
				 	Items.ItemID=RoomItems.ItemID AND RoomItems.RoomID= :RoomID");
		$sth->bindValue(":RoomID", $roomID);
		
	  $sth->execute();
    
    $row = $sth -> fetch()
		{
			$rows[] = $row;
		}
    
    echo json_encode($rows);
	  
	}
  
  db_close($dbh);
?>

