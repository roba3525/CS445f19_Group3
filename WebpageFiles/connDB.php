<?php
  // Author: 			Chadd Williams
  // File: 				connDB.php
  // Date:				March 18, 2013
  // Class:				CS 445	
  // Project: 		BigDB_Group3
  // Description: create a connection

   function db_connect ()
   {
     $dbh = new PDO("mysql:host=127.0.0.1;dbname=db_group3_f19", 
    	"PUNETID", "YOUR_PASSWD");
		 $dbh->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
     return ($dbh);
   }
	 
	 function db_close (&$dbh)
	 {
	 	$dbh = NULL;
	 }
	 
?>
