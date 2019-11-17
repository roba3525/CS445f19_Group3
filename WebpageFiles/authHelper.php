<?php
  // Author: 			Chadd Williams
  // File: 				authHelper.php
  // Date:				March 18, 2013
  // Class:				CS 445	
  // Project: 		In Class PDO Examples
  // Description: Check to make sure a user is logged in
  
	// include this code at the top of each
	// php file that requires the user to 
	// have already been authenticated 

	if( !isset($_SESSION['VALID']) ||
		 $_SESSION['VALID'] != 1 )
	{
		header('Location: Login.html');
	}
?>