<?php

	require_once 'connDB.php';

	$dbh = db_connect();

	if( isset($_POST['PersonID']) ) {
    
		$personID = $_POST['PersonID'];
		$sth = $dbh->prepare("DELETE FROM PlayerItems WHERE PlayerID IN (SELECT PlayerID From Players WHERE UserID = :userID)");
		$sth->bindValue(":userID", $personID);
		
	  $sth->execute();
    
		$sth = $dbh->prepare("DELETE FROM Gives WHERE PlayerID IN (SELECT PlayerID From Players WHERE UserID = :userID)");
		$sth->bindValue(":userID", $personID);
		
	  $sth->execute();
    
		$sth = $dbh->prepare("DELETE FROM Visits WHERE PlayerID IN (SELECT PlayerID From Players WHERE UserID = :userID)");
		$sth->bindValue(":userID", $personID);
    
    $sth->execute();
    
		$sth = $dbh->prepare("DELETE FROM Players WHERE UserID = :userID");
		$sth->bindValue(":userID", $personID);    
    
    $sth->execute();
    
    $sth = $dbh->prepare("DELETE FROM Users WHERE UserID = :userID");
		$sth->bindValue(":userID", $personID); 

    $sth->execute();
  }
  
  db_close($dbh);
?>