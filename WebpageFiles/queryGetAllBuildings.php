<?php

	function queryGetAllBuildings($dbh)
	{
    $rows = array();
    
		$sth = $dbh -> prepare("SELECT BuildingID, Name FROM Buildings");

		$sth -> execute();
		while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
	}
?>