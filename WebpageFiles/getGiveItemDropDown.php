<?php
//create a dropdown based on the personId and which items you can give to them

require_once('basicErrorHandling.php');
require_once('connDB.php');
$dbh=db_connect();


if(isset($_POST['PersonID']) && isset($_POST['PlayerID'])){
	

	$personID = $_POST['PersonID'];
	$playerID = $_POST['PlayerID'];
	$rows = Array();
	
	//query for all the items this person wants/will take vs. the items in this player's inventory
		$sth = $dbh -> prepare("SELECT PlayerItems.ItemID
														FROM Items, PlayerItems WHERE PlayerItems.ItemID=Items.ItemID AND PlayerID =:PlayerID AND PlayerItems.ItemID IN (SELECT People.ItemID
														FROM People, Items, WillTakeItem
														WHERE People.ItemID=Items.ItemID
														OR WillTakeItem.ItemID=Items.ItemID
														AND WillTakeItem.PersonID= :PersonID
														AND People.PersonID = :PersonID); ");
														
		$sth -> bindValue(":PersonID", $personID);
		$sth -> bindValue(":PlayerID", $playerID);
		$sth -> execute();
			while ($row = $sth -> fetch())
		{
			$rows[] = $row['PlayerItems.ItemID'];
		}
		
		echo json_encode($rows);
	
}
?>
