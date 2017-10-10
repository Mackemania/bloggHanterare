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

		<div id="container_aboutme">
		<h2>About me</h2>
					<form method="post" onsubmit="" action="">
						<textarea name="aboutme" id="aboutme" name="About Me" rows="15" cols="40" class="formText" placeholder="My name is..." autocomplete="off" required="required"/></textarea>

		</div>
	</body>

</html>