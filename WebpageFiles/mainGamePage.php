<?php
	// Author: 			Thomas Robasciotti
  // File: 				mainGamePage.php
  // Date:				November 18 2019
  // Class:				CS 445
  // Project: 		Group DB Assignment
  // Description: The main gameplay screen
  
 	require_once('basicErrorHandling.php');
	require_once ('connDB.php');
  require_once('queryGetAllClasses.php');
  require_once('queryGetAllProfs.php');
  //require_once('authHelper.php');

	 $dbh = db_connect();
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
         <textarea readonly='readonly' id='taMain' name='gameInfo' rows='20' cols='91'>
          test
         </textarea>
         <div class="btn-group">
           <button>Look</button>
           <select>
             <option value='0'>Give</option>
             <option value='1'>&nbsp;</option>
           </select>
           <select>
             <option value='1'>Leave Bldg...</option>
           </select>
         </div>
         <div class="btn-group">
           <button>Take Items</button>
           <button>Next Room</button>
         </div>
         <div class="btn-group">
           <select>
             <option value='0'>Talk...</option>
           </select>
           <button>Prev Room</button>
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