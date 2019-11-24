<?php 
// create a view for a specific player that holds the items that unavailble for them to take

function createUnavailableItemsView ($dbh, $playerID){
	//drop view if it exists
	$sth = $dbh -> prepare("DROP VIEW IF EXISTS UnavailableItems_VW" . ":PlayerID" . ";");
	$sth -> bindValue(":PlayerID", $playerID);
	$sth -> execute();
	
	//create view
	$sth = $dbh -> prepare("CREATE VIEW UnavailableItems_VW" . ":PlayerID " ."AS
									SELECT Items.ItemID
									FROM PlayerItems, Items, Gives
									WHERE PlayerItems.ItemID=Items.ItemID
									AND Gives.ItemID=Items.ItemID
									AND Gives.PlayerID=:PlayerID
									AND PlayerItems.PlayerID=:PlayerID;");
	$sth -> bindValue(":PlayerID", $playerID);
	$sth -> execute();

}

 ?>