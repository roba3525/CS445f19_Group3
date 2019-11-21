<?php

  function queryGetRoomID($dbh, $roomName)
	{
		$retVal = "NONE";
		
		$sth = $dbh -> prepare("SELECT RoomID FROM Rooms WHERE Name = :room");
		$sth -> bindValue(":room", $roomName);
		$sth -> execute();
		if (1 == $sth -> rowCount())
		{
			$row = ($sth->fetch());
			$retVal = $row[0];
		}
		return $retVal;
		
	}
?>