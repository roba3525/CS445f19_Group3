<?php

	function queryGetCharacterID($dbh, $userID, $characterName)
	{
    $retVal = "NONE";
    
		$sth = $dbh -> prepare("SELECT PlayerID FROM Players WHERE CharacterName = :charName AND UserID = :userID");
    
    $sth -> bindValue(":charName", $characterName);
    $sth -> bindValue(":userID", $userID);
		
    $sth -> execute();
		if (1 <= $sth -> rowCount())
		{
			$row = ($sth->fetch());
			$retVal = $row[0];
		}
		return $retVal;
	}
?>