<?php

	require_once 'connDB.php';

	$dbh = db_connect();

	if( isset($_POST['PersonID']) ) {
    
		$personID = $_POST['PersonID'];
		$sth = $dbh->prepare("SELECT PictureID from People WHERE People.PersonID = :personID");
		$sth->bindValue(":personID", $personID);
		
	  $sth->execute();
	  
	  $row = $sth->fetch();
    echo $row['PictureID'];
	  
	}
  
  db_close($dbh);
?>
