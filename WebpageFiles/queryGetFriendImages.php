<?php

	function queryGetFriendImages($dbh, $PlayerID, $UserID)
	{
    $rows = array();
    
		$sth = $dbh -> prepare("SELECT Images.ImageID, Image, COUNT(People.PersonID) AS COUNT
														FROM Gives, People, Images, Users
														WHERE Gives.PersonID=People.PersonID
														AND People.PictureID=Images.ImageID
														AND Gives.PlayerID=:PlayerID
														AND UserID=:UserID;");
    $sth -> bindValue(":PlayerID", $PlayerID);
		$sth -> bindValue(":UserID", $UserID);
		$sth -> execute();
		while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
	}
?>