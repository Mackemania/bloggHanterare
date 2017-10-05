<html>
	<head>
		<title>Startsida | Bibliotekssystem</title>
		<link href="blog_style.css" media="screen" type="text/css" rel="stylesheet"/>
        <script src="code.js"></script>
        <script src="ajaxlib.js"></script>
	</head>
	<body>

		<div id="container">
<h2>Logga in</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Användaramn: <input type="text" placeholder="Användarnamn..." autocomplete="off" name="username" required="required">
  <br><br>
  E-mail: <input type="email" maxlength="50" placeholder="tex: epost@hemsida.se" autocomplete="off" name="email" required="required">
  <br><br>
  Lösenord <input type="password" autocomplete="off" name="password" required="required">
  <br><br>

  <input type="submit" name="Submit" value="Logga in">
</form>
				</div>
	</body>

</html>
