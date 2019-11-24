<?php

	require_once 'connDB.php';

	$dbh = db_connect();

	if( isset($_POST['ItemID']) ) {
    
		$itemID = $_POST['ItemID'];
		$sth = $dbh->prepare("SELECT ImageID from Items WHERE ItemID = :itemID");
		$sth->bindValue(":itemID", $itemID);
		
	  $sth->execute();
	  
	  $row = $sth->fetch();
    echo $row['ImageID'];
	  
	}
  
  db_close($dbh);
?>
