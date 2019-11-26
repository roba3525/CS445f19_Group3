<?php

	function queryGetUnlockedRooms($dbh, $bldgID, $playerID)
	{
    $rows = array();
    
		$sth = $dbh -> prepare("SELECT WillTakeItem.RoomID" .
                           " FROM WillTakeItem, Gives, Rooms, Buildings" . 
                           " WHERE WillTakeItem.PersonID = Gives.PersonID AND" . 
                           " WillTakeItem.ItemID = Gives.ItemID AND" . 
                           " Rooms.RoomID = WillTakeItem.RoomID AND" . 
                           " Rooms.BuildingID = Buildings.BuildingID AND" . 
                           " Buildings.BuildingID = :bldgID AND" . 
                           " PlayerID = :playerID");
    $sth -> bindValue(":bldgID", $bldgID);
    $sth ->bindValue(":playerID", $playerID);
		$sth -> execute();
		while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
    
		$sth = $dbh -> prepare("SELECT Printers.RoomID FROM Printers, Visits WHERE PlayerID = :playerID");
    $sth ->bindValue(":playerID", $playerID);
		$sth -> execute();
		while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}    
		return $rows;
	}
?>