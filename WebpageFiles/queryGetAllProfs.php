<?php

	function queryGetAllProfs($dbh)
	{
    $rows = array();
    
		$sth = $dbh -> prepare("SELECT Professors.ProfID, FName, LName FROM Professors, People WHERE Professors.ProfID = People.PersonID");
    
		$sth -> execute();
		while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
	}
?>