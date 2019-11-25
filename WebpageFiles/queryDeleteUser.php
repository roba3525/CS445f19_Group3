<?php

	require_once 'connDB.php';

	$dbh = db_connect();

	if( isset($_POST['PersonID']) ) {
    
    $rows = array();
    
		$personID = $_POST['PersonID'];
		$sth = $dbh->prepare("DELETE FROM Users WHERE UserID = :userID");
		$sth->bindValue(":userID", $personID);
		
	  $sth->execute();
  }
  
  db_close($dbh);
?>

