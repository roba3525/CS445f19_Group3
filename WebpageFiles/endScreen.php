<?php
	// Author: 			Thomas Robasciotti
  // File: 				playerOptions.php
  // Date:				November 18 2019
  // Class:				CS 445
  // Project: 		Group DB Assignment
  // Description: Sets player options after signing in
  
  session_start();
    
 	require_once('basicErrorHandling.php');
	require_once('connDB.php');
  require_once('queryGetAllClasses.php');
  require_once('queryGetAllProfs.php');
  require_once('queryGetUserID.php');
	require_once('queryGetScore.php');
	require_once('addUserPlayer.php');
	require_once('queryGetFriendImages.php');
	require_once('getData.php');
  
  // authentication
  if( !isset($_SESSION['VALID']) ||
	 $_SESSION['VALID'] != 1 )
	{
	 header('Location: Login.html');
  }
  
  // db connection
  $dbh = db_connect();
	//if ('' == $userID)
	{
		//get ID of active user
		$userID = queryGetUserID($dbh, $_SESSION['USERNAME']);
	}
		//set it as a session variable
		$_SESSION['USERID'] = $userID;
	$playerID = $_SESSION['PLAYERID'];
	
	//$playerID = addUserPlayer($dbh, )
	//$_SESSION['PLAYERID'] = $playerID;
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>
<script type="text/javascript" src="file.js"></script>
<script type="text/javascript">

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
      &nbsp;
    </div>
    <div id="content">
      <div id="content_top"></div>
      <div id="content_main">
         <p>
           Congratulations! You did it! 
         <br>
					<span>
					 Your score was: 
					 <?php 
						$rows = queryGetScore($dbh, $userID);
						print $rows;
						?>
					</span>
					<br> <br>
					Look at all the friends you made!
					<br>
					
					<?php 
						//print $userID;
						$rows = queryGetFriendImages($dbh, $playerID, $userID);
						foreach ($rows as $data){
							 print ('<img src="getData.php?id=' . $data['ImageID'] . '">');
						 }
						 
						?>
						
				 </p>
         <br>
      </div>
      <div id="content_bottom"></div>
      <div id="footer"><h3><a href="http://www.bryantsmith.com">florida web design</a></h3></div>
      </div>
      <div id="leftmenu">
        <div id="leftmenu_top"></div>
        <div id="leftmenu_main"></div>
        <div id="leftmenu_bottom"></div>
      </div>
   </div>
  </body>
</html>
<?php
	db_close($dbh);
?>