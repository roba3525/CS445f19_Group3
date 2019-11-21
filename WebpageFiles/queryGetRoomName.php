<?php

  function queryGetRoomName($dbh, $roomID)
	{
		$retVal = "NONE";
		
		$sth = $dbh -> prepare("SELECT Name FROM Rooms WHERE RoomID = :room");
		$sth -> bindValue(":room", $roomID);
		$sth -> execute();
		if (1 == $sth -> rowCount())
		{
			$row = ($sth->fetch());
			$retVal = $row[0];
		}
		return $retVal;
		
	}
?>