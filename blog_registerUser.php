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
			<div id="register" class="modal register form">
				<div class="modalContent">
					<div id="closeDiv">
                        <span onclick="document.getElementById('register').style.display='none'" class="close" title="Stäng">&times;</span>
                    </div>
					<h2>Register user</h2>
					<form method="post" onsubmit="return blog_passwordCheck();" action="javascript: blog_regUserToDB();">

						Username:</br>
						<input type="text"  id="regUsername" name="regUsername" class="formText" placeholder="Username" autocomplete="off" maxlength="30" required="required"/></br></br>

						E-mail:</br>
						<input type="email" id="eMail" name="eMail" class="formText" placeholder="tex: epost@mail.com" autocomplete="off" maxlength="50" required="required"/></br></br>
						
						Password:</br>
						<input type="password" id="regPassword" name="regPassword" class="formText" placeholder="Password" autocomplete="off" maxlength="100" required="required"/></br></br>
						
						Repeat password</br>
						<input type="password" id="regPassword2" name="regPassword2" class="formText" placeholder="Password" autocomplete="off" maxlength="100" required="required"/>
						<div id="info">
						</div></br></br>

						<input type="submit" id="registerUser" name="registerUser" class="formButton" value="Register"/>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
