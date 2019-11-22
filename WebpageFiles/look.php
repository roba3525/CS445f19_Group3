<?php
	// Author: 			Megan DeYoung
  // File: 				look.php
  // Date:				November 19 2019
  // Class:				CS 445
  // Project: 		Group DB Assignment
  // Description: when the user clicks on the "look" button it displays the images and items in the room
	
	require_once('basicErrorHandling.php');
  require_once('connDB.php');
	require_once ('queriesForImages.php');
  
  $dbh=db_connect();
  
	if(isset($_POST['RoomID'])){
    
    $encPeopleImages = array();
    $encItemImages = array();
    
		$room = $_POST['RoomID'];
			
    $peopleImages = getRoomPeopleImages($dbh, $room);
		$itemImages = getRoomItemImages($dbh, $room);
    
    foreach($peopleImages as $pImage) {
      $encPeopleImages[] = base64_encode($pImage['Image']);
    }
    
    foreach($itemImages as $iImage) {
      $encItemImages[] = base64_encode($iImage['Image']);
    }
    
    $plpImageArray = json_encode(array($encPeopleImages));
    
    echo json_encode($encPeopleImages);
    
    //echo json_encode(array('peopleImages' => $peopleImages, 'itemImages' => $itemImages)); 
  }
  
  /*echo '<table border=1 cellpadding=4>';
								echo '<tr>';
								foreach ($peopleImages as $data){
									echo '<td>';
									echo '<img src="data:image/jpeg;base64,'.base64_encode($data->load()) .'" />';
									echo '</td>';
								}
						echo '</tr>';
					
		echo '</table>';
		
	echo '<br>';

			echo '<table border=1 cellpadding=4>';
								echo '<tr>';
								foreach ($itemImages as $data){
									echo '<td>';
									echo '<img src="data:image/jpeg;base64,'.base64_encode($data->load()) .'" />';
									echo '</td>';
								}
							echo '</tr>';
						
		echo '</table>';*/

?>