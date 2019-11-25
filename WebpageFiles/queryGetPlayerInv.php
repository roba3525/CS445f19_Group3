<?php
	require_once 'connDB.php';

	$dbh = db_connect();
  
	if(isset($_POST['CharacterID']))
	{
    $characterID = $_POST['CharacterID'];
    $rows = array();
    
		$sth = $dbh -> prepare("SELECT ItemID FROM PlayerItems WHERE PlayerID = :charID");
    $sth -> bindValue(":charID", $characterID);
		$sth -> execute();
		while ($row = $sth -> fetch())
		{
			$rows[] = $row['ItemID'];
		}
    
		echo json_encode($rows);
	}
  
  db_close($dbh);
?>