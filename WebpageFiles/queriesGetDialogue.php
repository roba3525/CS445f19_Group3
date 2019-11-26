<?php

	// Author: 			Megan DeYoung
  // File: 				queryGetDialogue.php
  // Date:				November 19 2019
  // Class:				CS 445
  // Project: 		Group DB Assignment
  // Description: queries for the dialogue option for a selected 
	//              person based on what item they want


// get a character's default dialogue -- under talk if you have given them the item they want
function checkIfGivenWant ($dbh, $PersonID, $PlayerID){
		$retVal = false;
		
		$sth = $dbh -> prepare("SELECT People.ItemID FROM People,
										Gives WHERE People.PersonID = Gives.PersonID 
										AND People.ItemID = Gives.ItemID AND 
										Gives.PersonID=:PersonID AND Gives.PlayerID=:PlayerID;");
		$sth -> bindValue(":PersonID", $PersonID);
		$sth -> bindValue(":PlayerID", $PlayerID);
		$sth -> execute();
		if (1 == $sth -> rowCount())
		{
			$retVal = true;
		}
		return $retVal;
		
	}

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

// get a character's item hint if you haven't given them what they want-- under the talk selection
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
// get a character's dialogue based on the item you gave them (will take) -- used in give

function getWillTakeDialogue($dbh, $PersonID, $ItemID){
		$retVal = "NONE";
		
		$sth = $dbh -> prepare("SELECT Phrase FROM WillTakeItem, DialogueOptions WHERE WillTakeItem.DialogueID = DialogueOptions.DialogueID AND PersonID = :PersonID AND ItemID = :ItemID");
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

?>