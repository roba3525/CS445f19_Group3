<?php
  // Author: 			Chadd Williams
  // File: 				queryGetSalt.php
  // Date:				March 18, 2013
  // Class:				CS 445	
  // Project: 		In Class PDO Examples
  // Description: get the salt from the users table

  function queryGetSalt($dbh, $user)
	{
		$retVal = "NONE";
		
		$sth = $dbh -> prepare("SELECT salt FROM users WHERE
				 	username = :user");
		$sth -> bindValue(":user", $user);
		$sth -> execute();
		if (1 == $sth -> rowCount())
		{
			$row = ($sth->fetch());
			$retVal = $row[0];
		}
		return $retVal;
		
	}
?>