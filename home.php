
<?php
 	require_once('basicErrorHandling.php');
	require_once ('connectDB.php');
	
	session_start();

	 $dbh = db_connect();
?>


<html>

	<head>
		<title> CS Dept: The Game </title>
		<h1>CS Dept: The Game</h1>
	</head>

	<body>
		MIX OF PHP AND HTML
	</body>

</html>

<?php
	db_close($dbh);
?>