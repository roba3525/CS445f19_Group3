<?php

  function queryRecordFinalScore($dbh, $playerID)
	{
    $score = 100;
    $sth = $dbh->prepare("SELECT COUNT(PlayerID) AS TotalFriends FROM Gives WHERE PlayerID = :playerID");
		$sth -> bindValue(":playerID", $playerID);
		$sth -> execute();
		while ($row = ($sth->fetch()))
		{
			$score += 10;
		}
    
    $sth = $dbh->prepare("UPDATE Players SET Score = :score WHERE PlayerID = :playerID");
    $sth -> bindValue(":score", $score);
		$sth -> bindValue(":playerID", $playerID);
		$sth -> execute();
	}
?>