<?php

	function addUserPlayer($dbh, $userID, $characterName)
	{
    try
  	{
			$sth = $dbh->prepare("INSERT INTO Players(CharacterName, Score, UserID) VALUES (:character, 0, :user)");
      
			$sth->bindValue(":character",$characterName);
			$sth->bindValue(":user",$userID);
		
			$sth->execute();
		}
		catch (PDOException $e)
    {
     printf ("The statement failed.\n");
     printf ("getCode: ". $e->getCode () . "\n");
     printf ("getMessage: ". $e->getMessage () . "\n");
    }
	}
  
?>