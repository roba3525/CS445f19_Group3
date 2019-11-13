<?php
	// Author: 			Chadd Williams
	// File: 				queryValidateUser.php
	// Date:				March 18, 2013
	// Class:				CS 445
	// Project: 		In Class PDO Examples
	// Description: validate a user using hashed passwords and salts
	
	require_once 'queryGetSalt.php';
	
	/*
	  create table users (username varbinary(25),
	 				  	passwd varbinary(512),
	  						salt varbinary(512),
	   					Primary Key (username));
	 
	 */
	
	function queryValidateUser($dbh, $user, $passwd)
	{
		$retVal = FALSE;
		$salt = queryGetSalt($dbh, $user);
	
		$hashedPW = crypt($passwd . $salt, '$2y$07$8d88bb4a9916b302c1c68c$');
	
		$sth = $dbh -> prepare("SELECT * FROM users WHERE
				 	username = :user and passwd = :pass");
		$sth -> bindValue(":user", $user);
		$sth -> bindValue(":pass", $hashedPW);
		$sth -> execute();
		if (1 == $sth -> rowCount())
		{
			//print "LOGGED IN!";
			$retVal = TRUE;
		}
		else
		{
			print "BAD user";	
		}
		return $retVal;
	}
?>