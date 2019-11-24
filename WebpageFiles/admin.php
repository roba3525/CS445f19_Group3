<?php
	// Author: 			Thomas Robasciotti
  // File: 				playerOptions.php
  // Date:				November 18 2019
  // Class:				CS 445
  // Project: 		Group DB Assignment
  // Description: Sets player options after signing in
  
  session_start();
    
 	require_once('basicErrorHandling.php');
	require_once ('connDB.php');
  require_once('queryGetAllClasses.php');
  require_once('queryGetAllProfs.php');
  require_once('queryGetUserID.php');
  
  // authentication
  if( !isset($_SESSION['VALID']) ||
	 $_SESSION['VALID'] != 1 || 
   $_SESSION['ADMIN'] != 1)
	{
	 header('Location: Login.html');
  }
  
  // db connection
  $dbh = db_connect();
  //get ID of active user
  $userID = queryGetUserID($dbh, $_SESSION['USERNAME']);
  //set it as a session variable
  $_SESSION['USERID'] = $userID;
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
    
  });
</script>

<title>CS Dept | The Game</title>
</head>

<body>
<div id="container">
		<div id="header">
      <img src="images/Pacific_University_logo.svg.png" alt="Pacific University Logo" height="100%" />
      <h1>CS Dept : The Game - Admin</h1>
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
           Here you can view/delete users and/or their characters. Be careful, actions on this page <strong>cannot be undone!</strong> 
         <br>
         </p>
         <br>
         <form method="post" name="frmAdmin" action=editUsers.php>
          
         </form>
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