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
  require_once('queryGetCharacterID.php');
  require_once('queryAddRoomItemsToInv.php');
  require_once('queryGetPlayerInv.php');

  if( !isset($_SESSION['VALID']) ||
	 $_SESSION['VALID'] != 1 )
	{
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
        $playerID = addUserPlayer($dbh, $userID, $characterName); 
      }
      
      $characterID = queryGetCharacterID($dbh, $userID, $characterName);
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
$(document).ready(function (){
  $('#selRooms').val(<?php echo $roomID; ?>);
  $('#selBuilding').val(<?php echo $buildingID; ?>);
  $('#selGive').hide();
  
  $('#selBuilding').change(function() {
    var newBldgID = $(this).val();
    $.ajax({
      url: 'changeBuilding.php',
      type: 'POST',
      data: {BldgID: newBldgID},
      success: function(results) {
        $('#lblCurrBldg').text('Current Building: ' + results);
        $('#selRooms').empty();
        $.ajax({
          url: 'getBuildingRooms.php',
          type: 'POST',
          data: {BldgID: newBldgID},
          success: function(result) {
            var rooms = JSON.parse(result);
            $.each(rooms, function(i, val) {
              if(i == 0 || newBldgID == <?php echo $buildingID ?>) {
               $('#selRooms').append('<option value=' + val.id + '>' + val.name + '</option>'); 
              } 
              else{
                $('#selRooms').append('<option disabled="disabled" value=' + val.id + '>' + val.name + '</option>'); 
              }
            });
            $('#selRooms').change();
            var characterID = <?php echo $characterID;?>;
            $.ajax({
              url: 'getUnlockedRooms.php',
              type: 'POST',
              data: {BldgID: newBldgID, PlayerID: characterID},
              success: function(result) {
                var unlockedRoomIDs = JSON.parse(result);
                $.each(unlockedRoomIDs, function(i, val) {
                  $('#selRooms > option').each(function() {
                    if(val.id == $(this).val()){
                      $(this).prop('disabled', false);
                    }
                  });
                });
              }
            });
          }
        });
      }
    });
  });
  
  $('#selRooms').change(function() {
    var peopleSelList = $('#selRoomPeople');
    peopleSelList.empty().append('<option selected="selected" value=-1>Talk...</option>');
    $('#selGive').empty().append('<option selected="selected" value=-1>Give...</option>');
    $('#ItemsToGive').empty().append('<option value=-1>Items To Give</option>');
    $('#peopleImgWrapper').empty();
    $('#itemImgWrapper').empty();  
    var newRoomID = $(this).val();
    $.ajax({
      url: 'checkEndGame.php',
      type: 'POST',
      data: {RoomID: newRoomID},
      success: function(result) {
        if(!$.isEmptyObject(result)) {
          $('#frmGameOver').submit();
        }
        else {
          $.ajax({
            url: 'changeRoom.php',
            type: 'POST',
            data: {RoomID: newRoomID},
            success: function(result) {
              $('#lblCurrRoom').text('Current Room: ' + result);
              $.ajax({
                url: 'changePeople.php',
                type: 'POST',
                data: {RoomID: newRoomID},
                success: function(result) {
                  var people = JSON.parse(result);
                  $.each(people, function(i, val) {
                    peopleSelList.append('<option value=' + val.id + '>' + val.FName + ' ' + val.LName +'</option>');
                    availablePersonRdo.append('<input type="radio" name="person" id="person' + val.id + '" value=' + val.id + ' >' + val.FName + ' ' + val.LName + '<br>' );
                  });
                  $.ajax({
                    url: 'changeItems.php',
                    type: 'POST',
                    data: {RoomID: newRoomID},
                    success: function(result) {
                      var items = JSON.parse(result);
                      $.each(items, function(i, val) {
                        $('#selGive').append('<option value=' + val.id + '>' + val.Name +'</option>');
                      });
                    }
                  });
                }
              });
            }
          });
        }
      }
    });
  });
  
  $('#clickLook').click(function() {
    $('#peopleImgWrapper').empty();
    $('#itemImgWrapper').empty();
		$('#taMain').empty();
    
    $('#selRoomPeople > option').each(function() {
      var personID = $(this).val();
      if(personID > 0) {
        $.ajax({
        url: 'queryGetPersonImage.php',
        type: 'POST',
        data: {PersonID: personID},
        success: function(result) {
          if(result !== 'undefined') {
            var htmlUpdate = '<img src="getData.php?id=' +result+ '">';
            $('#peopleImgWrapper').append(htmlUpdate);
          }
          else {
            alert('failed to set people images!');
          }
        }
      });
    
    $('#selGive > option').each(function() {
      var itemID = $(this).val();
      if(itemID > 0) {
        $.ajax({
          url: 'queryGetItemImage.php',
          type: 'POST',
          data: {ItemID: itemID},
          success: function(result) {
            if(result !== 'undefined') {
              var htmlUpdate = '<img src="getData.php?id=' +result+ '">';
              $('#itemImgWrapper').append(htmlUpdate);
            }
            else {
              alert('failed to set item images!');
            }
          }
        });
      }
    });
   }});
  });
  
	//ok good
  $('#btnTakeItems').click(function() {
		$('#itemImgWrapper').empty();    
    var roomID = $('#selRooms').val();
    var charID = <?php echo $characterID?>;
    $.ajax({
      url: 'queryAddRoomItemsToInv.php',
      type: 'POST',
      data: {RoomID: roomID, CharID: charID},
      success: function(result) {
        $('#taMain').append('You picked up all room items&#13;&#10;');
      }
    });
	
		// ok good
    $.ajax({
      url: 'queryGetPlayerInv.php',
      type: "POST",
      data: {CharacterID: charID},
      success: function(result) {
        $('#divPlayerInv').empty();
        var itemIDs = JSON.parse(result);
        $.each(itemIDs, function(i, val) {
          var htmlUpdate = '<img src="getData.php?id=' +val+ '">';
          $('#divPlayerInv').append(htmlUpdate);
        });
      }
    });
	});
		// ok good
  $('#selRoomPeople').change(function(){
    $('#ItemsToGive').empty().append('<option value=-1>Items To Give</option>');
		var person = $(this).val();
		var player = <?php echo $playerID?>;
		$.ajax({
      url: 'getDialogue.php',
      type: 'POST',
      data: {PersonID: person, PlayerID: player},
      success: function (result){
        var tb = $('#taMain');
        tb.append(result);
        tb.append("\n");
        $.ajax({
          url: 'getGiveItemDropDown.php',
          type: 'POST',
          data: {PersonID: person, PlayerID: player},
          success: function(result) {
            var itemIDs = JSON.parse(result);
            $.each(itemIDs, function(i, val) {
              var htmlUpdate = '<option value=' + val.id + '>' + val.name +'</option>';
              $('#ItemsToGive').append(htmlUpdate);
            });
          }
        });
        }
      });
		});
		//end good
    $('#btnGiveItem').click(function() {
      var player = <?php echo $playerID?>;
      var selectedItemID = $('#ItemsToGive').val();
      var person = $('#selRoomPeople').val();
      if(selectedItemID > 0) {
        $.ajax({
          url: 'giveItem.php',
          type: 'POST',
          data: {PlayerID: player, ItemID: selectedItemID, PersonID: person},
          success: function(results) {
            var tb = $('#taMain');
            tb.append(results);
            tb.append("\n");
                $.ajax({
                  url: 'queryGetPlayerInv.php',
                  type: "POST",
                  data: {CharacterID: player},
                  success: function(result) {
                    $('#divPlayerInv').empty();
                    var itemIDs = JSON.parse(result);
                    $.each(itemIDs, function(i, val) {
                      var htmlUpdate = '<img src="getData.php?id=' +val+ '">';
                      $('#divPlayerInv').append(htmlUpdate);
                    });
                  }
                });
          }
        });
      }
    });
});	



</script>

<title>CS Dept | The Game</title>
</head>

<body>
<div id="container">
		<div id="header">
      <img src="images/Pacific_University_logo.svg.png" alt="Pacific University Logo" height="100%" />
      <h1>CS Dept : The Game</h1>
		<p>	<h2><i>The fastest growing game this department has ever seen. 500 users and growing!</i></h2> </p>
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
    <div id='leftmenu'>
      <div id='leftmenu_top'></div>
      <div id='leftmenu_main'>
        <h3>Player Inventory</h3>
        <div id='divPlayerInv' class='playerInv'>
        </div>
      </div>
      <div id='leftmenu_bottom'></div>
    </div>
    <div id="content">
      <div id="content_top"></div>
      <div id="content_main">
         <textarea readonly='readonly' id='taMain' name='gameInfo' rows='20' cols='91'>
         </textarea>
         <div id="peopleImgWrapper"></div>
         <div class="btn-group">
         <button id="clickLook">Look</button>
           <select id='selGive'>
             <option value='-1'>Give...</option>
             <?php 
                $rows = getRoomItems($dbh, $roomID, $playerID);
                foreach($rows as $data) {
                  print '<option disabled="disabled" VALUE=' . $data['ItemID'] . '>';
                  print $data['Name'] . '</option>';
                }
              ?>
           </select>
           <select id='selBuilding'>
             <?php 
                $rows = queryGetAllBuildings($dbh);
                foreach($rows as $data) {
                  print '<option VALUE=' . $data['BuildingID'] . '>';
                  print $data['Name'] . '</option>';
                }
              ?>
           </select>
         </div>
         <div class="btn-group">
           <button id=btnTakeItems>Take Items</button>
           <select id='selRooms'>
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
           <select id='selRoomPeople'>
             <option value='-1'>Talk...</option>
						 <?php
						 $rows = getRoomPeople($dbh, $roomID);
						  foreach ($rows as $data){
						    print '<option VALUE=' . $data['PersonID'] . '>';
							  print $data['FName'] . " " . $data['LName'] . '</option>';
						 }
						 ?>
           </select>
         </div>
				 <div class = "btn-group">
					<select id="ItemsToGive">
					<option VALUE='-1'>Items To Give</option>
					</select>
          <button type='button' id='btnGiveItem'>Give</button>
				 </div>
         <div id="itemImgWrapper"></div>
         <form id='frmGameOver' method='POST' action='endScreen.php'>
          <input type='hidden' id='userID' name='UserID' value='<?php echo $userID; ?>'>
          <input type='hidden' id='charID' name='CharID' value='<?php echo $characterID; ?>'>
         </form>
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
