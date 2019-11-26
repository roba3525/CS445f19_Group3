<?php

	require_once 'connDB.php';
  require_once 'queriesGetDialogue.php';

	$dbh = db_connect();

	if( (isset($_POST['ItemID'])) &&
      (isset($_POST['PersonID'])) &&
      (isset($_POST['PlayerID']))) {
    
    $results = "NONE";
        
    $itemID = $_POST['ItemID'];
    $personID = $_POST['PersonID'];
    $playerID = $_POST['PlayerID'];
    
		$sth = $dbh->prepare("INSERT INTO Gives(PlayerID, ItemID, PersonID) VALUES(:playerID, :itemID, :personID)");
		$sth->bindValue(":playerID", $playerID);
		$sth->bindValue(":itemID", $itemID);
    $sth->bindValue(":personID", $personID);
    
	  $sth->execute();
    
    $sth = $dbh->prepare("DELETE FROM PlayerItems WHERE ItemID = :itemID");
		
		$sth->bindValue(":itemID", $itemID);
    
	  $sth->execute();
    
    $rows = getWillTakeDialogue($dbh, $personID, $itemID);
    $results = $rows;
    
    if("NONE" == $results){
      $sth = $dbh->prepare("SELECT Rooms.Name FROM Rooms, Printers WHERE Rooms.RoomID = Printers.RoomID");
      $sth->execute();
      if (1 <= $sth -> rowCount())
      {
        $row = ($sth->fetch());
        $printerRoomName = $row[0];
      }
      $results = 'Just what I wanted! I hear the printer works in ' . $printerRoomName . '!';
      
      $sth = $dbh->prepare("INSERT INTO Visits(PlayerID, PrinterID) SELECT " . $playerID . ", Printers.PrinterID FROM Printers");
      $sth->execute();
    }
    
    print json_encode($results);
	}
  
  db_close($dbh);
?>