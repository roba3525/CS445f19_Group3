<?php

  require_once('basicErrorHandling.php');
  require_once('connDB.php');
  
  $dbh=db_connect();
  
  if(isset($_POST['ClassName']) && isset($_POST['ProfID'])){
    
    $className = $_POST['ClassName'];
    $profID = $_POST['ProfID'];
    
    $retVal = FALSE;
	
		$sth = $dbh -> prepare("SELECT ProfID, Name FROM Classes WHERE ProfID = :profID AND Classes.Name = :className");
		$sth -> bindValue(":profID", $profID);
		$sth -> bindValue(":className", $className);
		$sth -> execute();
    
		if (1 <= $sth -> rowCount())
		{
			echo json_encode(array('match' => 1)); 
		}
		else
		{
			echo json_encode(array('match' => 0));
		}
  }
?>