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
 require_once 'queryIsAdmin.php';
 
session_start();
$_SESSION['VALID'] = 0;
$_SESSION['ADMIN'] = 0;

if(  ( 	isset($_POST['txtUser']) &&
		isset($_POST['txtPassword'])))
{
  $userID = $_POST['txtUser'];
	$passwd = $_POST['txtPassword'];
 	$dbh=db_connect();
 
	$result = queryValidateUser($dbh, $userID, $passwd);
  $isAdmin = queryIsAdmin($dbh, $userID);

	if( TRUE == $result )
	{
    header('Location: admin.php');
		$_SESSION['VALID'] = 1;
    $_SESSION['USERNAME'] = $userID; 
    if(TRUE == $isAdmin) {
      $_SESSION['ADMIN'] = 1;
      header('Location: admin.php');
    }
		
		header('Location: playerOptions.php');
	}
	else
	{
		header('Location: Login.html');
	}
}
?>