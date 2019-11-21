<?php

  function queryGetBuildingName($dbh, $buildingID)
	{
		$retVal = "NONE";
		
		$sth = $dbh -> prepare("SELECT Name FROM Buildings WHERE BuildingID = :bldg");
		$sth -> bindValue(":bldg", $buildingID);
		$sth -> execute();
		if (1 == $sth -> rowCount())
		{
			$row = ($sth->fetch());
			$retVal = $row[0];
		}
		return $retVal;
		
	}
?>