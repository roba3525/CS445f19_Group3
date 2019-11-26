<?php

	require_once 'connDB.php';

	$dbh = db_connect();

	if( isset($_POST['BldgID']) ) {
    
		$bldgID = $_POST['BldgID'];
		$sth = $dbh->prepare("SELECT Name FROM Buildings WHERE BuildingID = :bldgID");
		$sth->bindValue(":bldgID", $bldgID);
		
	  $sth->execute();
	  
	  $row = $sth->fetch();
    echo $row['Name'];
	}
  
  db_close($dbh);
?>