<?php

	// Author: 			Thomas Robasciotti
  // File: 				queriesAdminUser.php
  // Date:				November 24 2019
  // Class:				CS 445
  // Project: 		Group DB Assignment
  // Description: functions for admin user queries


function getAllUsers($dbh){
		$rows = Array();
		
		$sth = $dbh -> prepare("SELECT * FROM Users");
		$sth -> execute();
			while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
		
	}
?>