<?php

	function queryGetAllClasses($dbh)
	{
    $rows = array();
    
		$sth = $dbh -> prepare("SELECT DISTINCT Name FROM Classes");
		$sth -> execute();
		while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
	}
?>