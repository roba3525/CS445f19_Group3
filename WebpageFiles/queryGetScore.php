<?php
  // Author: 			Chadd Williams
  // File: 				queryGetSalt.php
  // Date:				March 18, 2013
  // Class:				CS 445	
  // Project: 		In Class PDO Examples
  // Description: get the salt from the users table

  function queryGetScore($dbh, $user)
	{
		$retVal = "NONE";
		
		$sth = $dbh -> prepare("SELECT Score FROM Players
		WHERE Players.UserID = :UserID;");
		$sth -> bindValue(":UserID", $user);
		$sth -> execute();
		//if (1 == $sth -> rowCount())
		{
			$row = ($sth->fetch());
			$retVal = $row[0];
		}
		return $retVal;
		
	}
?>