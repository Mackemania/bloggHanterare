<?php

require_once("blog_db.php");
session_start();
$db = new DB();
$userID = $_SESSION["userID"];

$getAboutMe = "SELECT aboutMe from user where userID=$userID";

$matrix = $db->getData($getAboutMe);

$printAboutMe = $matrix[0][0];

?>
<html>
	<head>
	    <meta charset="utf-8">
  	  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		  <title>Startsida | Bibliotekssystem</title>
		  <link href="blog_style.css" media="screen" type="text/css" rel="stylesheet"/>
      <script src="code.js"></script>
      <script src="ajaxlib.js"></script>
	</head>
	<body>
	    <h2>Om mig</h2>

		<form method="post" action="blog_sendAboutMeToDB.php">

		<textarea id="aboutMe" name="aboutMe" class="textarea" rows="15" cols="40" placeholder="Jag gillar..." autocomplete="off" maxlength="500" ><?php echo "$printAboutMe"?></textarea>
		<input type="submit" id="editButton" name="editButton" class="formButton" value="Spara information">

		</form>
	</body>
</html>
