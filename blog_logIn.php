<html>
	<head>
		<title>Startsida | Bibliotekssystem</title>
		<link href="blog_style.css" media="screen" type="text/css" rel="stylesheet"/>
        <script src="code.js"></script>
        <script src="ajaxlib.js"></script>
	</head>
	<body>
        <?PHP
            require_once("blog_menu.php");
        ?>

		<div id="container">
            <div id ="form">
                <h2>Logga In</h2>
                <form method="post" action="login.php">
                    Username:</br>
                    <input type="text" class="formText" id="username" name="username" placeholder="Username" autocomplete="off" required="required"/></br></br>
                    
                    Password:</br>
                    <input type="password" class="formText" id="password" name="password" placeholder="Password" required="required"/></br></br>
                    
                    <input type="submit" class="formButton" value="Log in"/>
                </form>
            </div>
        </div>
	</body>

</html>
    


