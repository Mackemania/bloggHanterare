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