<?php
  function queryGetScore($dbh, $player)
	{
		$retVal = "NONE";
		
		$sth = $dbh->prepare("SELECT Score FROM Players" . 
                         " WHERE PlayerID = :playerID");
		$sth -> bindValue(":playerID", $player);
		$sth -> execute();
		if (1 == $sth -> rowCount())
		{
			$row = ($sth->fetch());
			$retVal = $row[0];
		}
		return $retVal;
		
	}
?>