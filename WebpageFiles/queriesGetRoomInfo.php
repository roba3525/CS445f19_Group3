<?php

	// Author: 			Megan DeYoung
  // File: 				queriesGetRoomInfo.php
  // Date:				November 19 2019
  // Class:				CS 445
  // Project: 		Group DB Assignment
  // Description: functions for getting the people in a room or the items in a room


function getRoomPeople($dbh, $roomID){
		$rows = Array();
		
		$sth = $dbh -> prepare("SELECT People.PersonID, FName, LName FROM People, RoomPeople WHERE
				 	People.PersonID=RoomPeople.PersonID AND RoomPeople.RoomID= :RoomID");
		$sth -> bindValue(":RoomID", $roomID);
		$sth -> execute();
			while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
		
	}


function getRoomItems ($dbh, $roomID, $playerID){
		$rows = Array();
		
		$sth = $dbh -> prepare("SELECT Items.ItemID, Name FROM Items, RoomItems WHERE Items.ItemID=RoomItems.ItemID AND RoomItems.RoomID= :RoomID"); // NOT IN (SELECT Items.ItemID FROM PlayerItems, Items, Gives WHERE PlayerItems.ItemID=Items.ItemID OR Gives.ItemID=Items.ItemID AND PlayerItems.PlayerID=:PlayerID AND Gives.PlayerID=:PlayerID)");
		$sth -> bindValue(":RoomID", $roomID);
	//	$sth -> bindValue(":PlayerID", $playerID);
		$sth -> execute();
			while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
		
	}

?>