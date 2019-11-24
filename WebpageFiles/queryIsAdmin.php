<?php

  require_once('basicErrorHandling.php');

  function queryIsAdmin($dbh, $user)
	{
		$retVal = FALSE;
		
		$sth = $dbh -> prepare("SELECT Admin FROM Users WHERE
				 	Username = :user");
		$sth -> bindValue(":user", $user);
		$sth -> execute();
		if (1 <= $sth -> rowCount())
		{
			$row = ($sth->fetch());
      if(1 == $row[0]){
        $retVal = TRUE;
      }
		}
		return $retVal;
		
	}
?>