<html>
	<head>
		<title>BloggNation</title>
		<link href="blog_style.css" media="screen" type="text/css" rel="stylesheet"/>
		<script src="code.js"></script>
		<script src="ajaxlib.js"></script>
	</head>
	<body>
		<?PHP
			require_once("blog_menu.php");
		?>
		<div id="container">
			<div id="form" class="modal">
				<h2>Register user</h2>
				<form method="post" action="">

					Username:</br>
					<input type="text"  id="username" name="username" class="formText" placeholder="Username" autocomplete="off" maxlength="30" required="required"/></br></br>

					E-mail:</br>
					<input type="email" id="email" name="email" class="formText" placeholder="tex: epost@mail.com" autocomplete="off" maxlength="50" required="required"/></br></br>
					
					Lösenord</br>
					<input type="password" id="password" name="password" class="formText" placeholder="Password" autocomplete="off" maxlength="100" required="required"/></br></br>
					
					<input type="submit" id="registerUser" name="registerUser" class="formButton" value="Register"/>
				</form>
			</div>
		</div>
	</body>
</html>
