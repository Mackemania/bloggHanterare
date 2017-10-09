<html>
	<head>
		<title>Homepage | Bloog</title>
		<link href="blog_style.css" media="screen" type="text/css" rel="stylesheet"/>
        <script src="code.js"></script>
        <script src="ajaxlib.js"></script>
	</head>
	<body>
		<?PHP
        	require_once("blog_menu.php");
        ?>

		<div id="container">

			<?php require_once("blog_blogMaker.php");?>
			<?php require_once("blog_postMaker.php");?>
			<?php require_once("blog_blogLink.php");?>
		</div>
	</body>

</html>
