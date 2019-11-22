<?php

	// Author: 			Megan DeYoung
  // File: 				queriesForImages.php
  // Date:				November 19 2019
  // Class:				CS 445
  // Project: 		Group DB Assignment
  // Description: Gets the dialogue option for a selected 
	//              person based on what item they want



// get all the pictures for the people in a given room
function getRoomPeopleImages($dbh, $roomID){
		$rows = Array();
		
		$sth = $dbh -> prepare("SELECT Image, RoomPeople.PersonID FROM RoomPeople, People, Images
													WHERE RoomPeople.PersonID=People.PersonID AND People.PictureID=Images.ImageID
													AND RoomID= :roomID;");
		$sth -> bindValue(":roomID", $roomID);
		$sth -> execute();
			while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
		
	}
}
//get all the pictures for items in a given room

function getRoomItemImages($dbh, $roomID){
		$rows = Array();
		
		$sth = $dbh -> prepare("SELECT Image, Items.ItemID FROM RoomItems, Items, Images
												WHERE RoomItems.ItemID=Items.ItemID AND Items.ImageID=Images.ImageID
												AND RoomID = :roomID;");
		$sth -> bindValue(":roomID", $roomID);
		$sth -> execute();
			while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
		
	}
}

?>