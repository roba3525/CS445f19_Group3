<?php
 
  // Author: 			Chadd Williams
  // File: 				userAuth.php
  // Date:				March 18, 2013
  // Class:				CS 445	
  // Project: 		In Class PDO Examples
  // Description: Authenticate a user
 require_once 'basicErrorHandling.php';
 require_once 'connDB.php';
 require_once 'queryValidateUser.php';
 
session_start();
$_SESSION['VALID'] = 0;

if(  ( 	isset($_POST['txtUser']) &&
		isset($_POST['txtPassword'])))
{
  $userID = $_POST['txtUser'];
	$passwd = $_POST['txtPassword'];
 	$dbh=db_connect();
 
	$result = queryValidateUser($dbh, $userID, $passwd);


	if( TRUE == $result )
	{
		$_SESSION['VALID'] = 1;
		
		header('Location: playerOptions.php');
	}
	else
	{
		header('Location: Login.html');
		
	}
}
?>