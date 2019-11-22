<?php
	// Author: 			Thomas Robasciotti
  // File: 				mainGamePage.php
  // Date:				November 18 2019
  // Class:				CS 445
  // Project: 		Group DB Assignment
  // Description: The main gameplay screen
  
  session_start();
  
 	require_once('basicErrorHandling.php');
	require_once ('connDB.php');
  require_once('queryGetAllClasses.php');
  require_once('queryGetAllProfs.php');
  require_once('addUserPlayer.php');
  require_once('queryGetAssignmentByClassName.php');
  require_once('queryGetBuildingID.php');
  require_once('queryGetRoomsByBuildingID.php');
  require_once('queryGetAllBuildings.php');
  require_once('queryGetRoomID.php');
  require_once('queryGetBuildingName.php');
  require_once('queryGetRoomName.php');
	require_once ('queriesGetRoomInfo.php');
	require_once ('look.php');

  if( !isset($_SESSION['VALID']) ||
	 $_SESSION['VALID'] != 1 )
	{
   var_dump($_SESSION['VALID']);
	 header('Location: Login.html');
  }

	 $dbh = db_connect();
	if((isset($_SESSION['USERID'])) &&
    (isset($_POST['txtCharacter'])) &&
    (isset($_POST['ClassName'])) &&
    (isset($_POST['ProfID']))) 
    {
      $userID = $_SESSION['USERID'];
      $characterName = $_POST['txtCharacter'];
      $className = $_POST['ClassName'];
      $profID = $_POST['ProfID'];
      
      if('' === $characterName){
        print "Please enter a character name!";
        header('Location: playerOptions.php');
      }
      else if('-1' === $profID) {
        print "Please select a professor!";
        header('Location: playerOptions.php');
      }
      else {
        addUserPlayer($dbh, $userID, $characterName); 
      }
      
      $assignmentName = queryGetAssignmentByClassName($dbh, $className);
      $buildingID = queryGetBuildingID($dbh, 'Strain');
      $roomID = queryGetRoomID($dbh, 'Strain 222');
      
    } else {
      print "Something went wrong! Please try again.";
      header('Location: playerOptions.php');
    }
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>
<script type="text/javascript" src="file.js"></script>
<script type="text/javascript">
  $(document).ready(function() {    
    //look for a click of the Look button
		$('#clickLook').click(function() {
				$.ajax({
						type: "POST",
						url: "look.php",
						data: { RoomID: roomID }
				})
  });
});
                
		}
  });
</script>

<title>CS Dept | The Game</title>
</head>

<body>
<div id="container">
		<div id="header">
      <img src="images/Pacific_University_logo.svg.png" alt="Pacific University Logo" height="100%" />
      <h1>CS Dept : The Game</h1>
      <div id='top_right'>
        <form align='right' name='frmLogout' method='post' action='Logout.html'>
          <label class="logoutPos">
            <input name='Logout' value='Logout' type='submit' id='btnLogout' onclick='window.location.href=Logout.html'>
          </label>
        </form>
      </div>
    </div>   
    <div id="menu">
      <label class='menu_label' id='lblCharName'>Name: <?php print $characterName; ?></label>
      <label class='menu_label' id='lblAssignment'>Assignment: <?php print $assignmentName; ?></label>
      <label class='menu_label' id='lblCurrBldg'>Current Building: <?php print queryGetBuildingName($dbh, $buildingID);?></label>
      <label class='menu_label' id='lblCurrRoom'>Current Room: <?php print queryGetRoomName($dbh, $roomID);?></label>
    </div>
    <div id="content">
      <div id="content_top"></div>
      <div id="content_main">
         <textarea readonly='readonly' id='taMain' name='gameInfo' rows='20' cols='91'>
          You are in 
         </textarea>
				 <div id="roomthings">
						<button id="clickLook">Look</button>
				 </div>
         <div class="btn-group">
           <select>
             <option value='-1'>Give</option>
           </select>
           <select>
             <option value='-1'>Go To Bldg...</option>
             <?php 
                $rows = queryGetAllBuildings($dbh);
                foreach($rows as $data) {
                  print '<option disabled="disabled" VALUE=' . $data['BuildingID'] . '>';
                  print $data['Name'] . '</option>';
                }
              ?>
           </select>
         </div>
         <div class="btn-group">
           <button>Take Items</button>
           <select>
             <option value='-1'>Go To Room...</option>
             <?php 
                $rows = queryGetRoomsByBuildingID($dbh, $buildingID);
                foreach($rows as $data) {
                  print '<option VALUE=' . $data['RoomID'] . '>';
                  print $data['Name'] . '</option>';
                }
              ?>
           </select>
         </div>
         <div class="btn-group">
           <select>
             <option value='-1'>Talk...</option>
						 <?php
						 $rows = getRoomPeople($dbh, $roomID);
						  foreach ($rows as $data){
						    print '<option VALUE=' . $data['PersonID'] . '>'
							  print $data['FName'] . " " . $data['LName'] . '</option>'
						 }
						 ?>
           </select>
         </div>
      </div>
      <div id="content_bottom"></div>
      <div id="footer"><h3><a href="http://www.bryantsmith.com">florida web design</a></h3></div>
      </div>
   </div>
  </body>
</html>
<?php
	db_close($dbh);
?>