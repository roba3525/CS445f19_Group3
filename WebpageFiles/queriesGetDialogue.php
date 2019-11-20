<?php

	// Author: 			Megan DeYoung
  // File: 				queryGetDialogue.php
  // Date:				November 19 2019
  // Class:				CS 445
  // Project: 		Group DB Assignment
  // Description: Gets the dialogue option for a selected 
	//              person based on what item they want


// get a character's default dialogue
function getDefaultDialogue($dbh, $PersonID){
		$retVal = "NONE";
		
		$sth = $dbh -> prepare("SELECT Phrase FROM People, DialogueOptions WHERE
				 	People.DialogueID=DialogueOptions.DialogueID AND People.PersonID= :PersonID");
		$sth -> bindValue(":PersonID", $PersonID);
		$sth -> execute();
		if (1 == $sth -> rowCount())
		{
			$row = ($sth->fetch());
			$retVal = $row[0];
		}
		return $retVal;
		
	}
}

// get a character's item hint
function getItemHint($dbh, $PersonID){
		$retVal = "NONE";
		
		$sth = $dbh -> prepare("SELECT Phrase FROM People, Items, DialogueOptions WHERE
				 	People.ItemID=Items.ItemID AND Items.ItemHintID=DialogueOptions.DialogueID
					AND People.PersonID= :PersonID");
		$sth -> bindValue(":PersonID", $PersonID);
		$sth -> execute();
		if (1 == $sth -> rowCount())
		{
			$row = ($sth->fetch());
			$retVal = $row[0];
		}
		return $retVal;
		
	}
}
// get a character's dialogue based on the item you gave them (will take)

function getItemHint($dbh, $PersonID, $ItemID){
		$retVal = "NONE";
		
		$sth = $dbh -> prepare("SELECT Phrase FROM WillTakeItem, DialogueOptions
										WHERE WillTakeItem.DialogueID=DialogueOptions.DialogueID
										AND PersonID= :PersonID AND ItemID = :ItemID;");
		$sth -> bindValue(":PersonID", $PersonID);
		$sth -> bindValue(":ItemID", $ItemID);
		$sth -> execute();
		if (1 == $sth -> rowCount())
		{
			$row = ($sth->fetch());
			$retVal = $row[0];
		}
		return $retVal;
		
	}
}

?>