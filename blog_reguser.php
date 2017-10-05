<html>
	<head>
		<title>BloggNation</title>
		<link href="blog_style.css" media="screen" type="text/css" rel="stylesheet"/>
        <script src="code.js"></script>
        <script src="ajaxlib.js"></script>
</head>
	<body>
		<div id="container">
<h2>Registrera dig</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Användaramn: <input type="text" autocomplete="off" name="username" maxlength="30" required="required">
  <br><br>
  E-mail: <input type="email" maxlength="50" placeholder="tex: epost@hemsida.se" autocomplete="off" name="email" required="required">
  <br><br>
  Lösenord <input type="password" maxlength="100" autocomplete="off" name="password" required="required">
  <br><br>

  <input type="submit" name="Submit" value="Registrera">
</form>
				</div>
	</body>

</html>
