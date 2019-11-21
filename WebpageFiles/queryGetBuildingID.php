<?php

  function queryGetBuildingID($dbh, $buildingName)
	{
		$retVal = "NONE";
		
		$sth = $dbh -> prepare("SELECT BuildingID FROM Buildings WHERE Name = :bldg");
		$sth -> bindValue(":bldg", $buildingName);
		$sth -> execute();
		if (1 == $sth -> rowCount())
		{
			$row = ($sth->fetch());
			$retVal = $row[0];
		}
		return $retVal;
		
	}
?>