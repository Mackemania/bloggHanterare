<html>
	<head>
		<title>Logga in | Bloog</title>
		<link href="blog_style.css" media="screen" type="text/css" rel="stylesheet"/>
        <script src="code.js"></script>
        <script src="ajaxlib.js"></script>
	</head>
	<body>
        <?PHP
            require_once("blog_menu.php");
        ?>

		<div id="container">
            <div id ="login" class="modal login form">
                <div id="modalContent" class="modalContent">
                    <div id="closeDiv">
                        <span onclick="document.getElementById('login').style.display='none'" class="close" title="Stäng">&times;</span>
                    </div>
                    <h2>Logga In</h2></br>
                    <form method="post" action="javascript: blog_loginToDB();">
                        Användarnamn:</br>
                        <input type="text" class="formText" id="loginUsername" name="loginUsername" placeholder="Användarnamn" autocomplete="off" required="required"/>
                        <div id="info" name="info">
                        </div></br>
                        Lösenord:</br>
                        <input type="password" class="formText" id="loginPassword" name="loginPassword" placeholder="Lösenord" required="required"/></br></br>
                        
                        <input type="submit" class="formButton" value="Logga in"/>
                    </form>
                </div>
            </div>
        </div>
	</body>

</html>