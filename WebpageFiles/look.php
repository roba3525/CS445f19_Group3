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
  
	if isset($if(isset($_POST['RoomID'])){
		$room = $_POST['RoomID'])){
			
			$peopleImages = getRoomPeopleImages ($dbh, $room);
			$itemImages = getRoomItemImages ($dbh, $room);
			
			$peopleCount = count($peopleImages);
			$itemCount = count($itemImages);

			echo '<table border=1 cellpadding=4>';
								echo '<tr>';
								foreach ($peopleImages as $data){
									echo '<td>';
									echo '<img src="data:image/jpeg;base64,'.base64_encode($data->load()) .'" />';
									echo '</td>';
								}
							}
						echo '</tr>';
						}
		echo '</table>';
		}
	}

}

?>