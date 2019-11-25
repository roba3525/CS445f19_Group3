<?php
// Author: 				Megan DeYoung
  // File: 				GetDialogue.php
  // Date:				November 19 2019
  // Class:				CS 445
  // Project: 		Group DB Assignment
  // Description: Gets the dialogue option for a selected 
	//              person based on what item they want

require_once('basicErrorHandling.php');
require_once('connDB.php');
require_once('queriesGetDialogue.php');
$dbh=db_connect();


if(isset($_POST['PersonID'])){// && isset($_POST['PlayerID'])){
	
	$personID = $_POST['PersonID'];
//	$playerID = $_POST['PlayerID'];
	$retVal = "NONE";
	
	/*if (checkIfGivenWant($dbh, $personID, $playerID)){
		$retVal = getDefaultDialogue($dbh, $personID);
	}
	
	else {
		$retVal =getItemHint($dbh, $personID);
	}*/
	$retVal =getItemHint($dbh, $personID);
	echo $retVal;
}
?>