<?php

	function queryGetRoomsByBuildingID($dbh, $bldgID)
	{
    $rows = array();
    
		$sth = $dbh -> prepare("SELECT Rooms.RoomID, Rooms.Name FROM Rooms WHERE Rooms.BuildingID = :bldgID");
    $sth -> bindValue(":bldgID", $bldgID);
		$sth -> execute();
		while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
	}
?>