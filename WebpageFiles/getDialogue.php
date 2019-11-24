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


if(isset($_POST['PersonID']) && isset($_POST['PlayerID'])){
	
	$personID = $_POST['PersonID'];
	$playerID = $_POST['PlayerID'];
	
	if (checkIfGivenWant($dbh, $personID, $playerID)){
		getDefaultDialogue($dbh, $personID);
	}
	
	else {
		getItemHint($dbh, $personID);
	}

>