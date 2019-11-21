<?php

	function queryGetAssignmentByClassName($dbh, $className)
	{
    $retVal = "NONE";
    
		$sth = $dbh -> prepare("SELECT Assignments.Title FROM Assignments, Classes WHERE Classes.AssignmentID = Assignments.AssignmentID AND Classes.Name = :class");
    
    $sth -> bindValue(":class", $className);
		
    $sth -> execute();
		if (1 <= $sth -> rowCount())
		{
			$row = ($sth->fetch());
			$retVal = $row[0];
		}
		return $retVal;
	}
?>