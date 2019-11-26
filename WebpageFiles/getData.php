<?php
	require_once 'connDB.php';
	
	$dbh = db_connect();


	if( isset($_GET['id']) ) {
	
		$id = $_GET['id'];
		$sth = $dbh->prepare("SELECT Image, Type from Images where ImageID=:imgID");
		$sth->bindValue(":imgID",$id);
		
	  $sth->execute();
	  
	  $row = $sth->fetch();
		$data = $row['Image'];
		$type = $row['Type'];
    
	  print $data;
	  
	}else{
	   print "FILE NOT FOUND";
	}
  db_close($dbh);	
?>