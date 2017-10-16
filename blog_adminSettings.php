<?PHP
//hemsidan där man börjar.
?>
<html>
	<head>

		<title>Startsida | Bloog</title>

	</head>
	<body>
		<?PHP
            require_once("blog_menu.php");
        ?>
		
        <div id="container">
            <?PHP
                if($_SESSION["admin"] == 1) {
                    require_once("blog_adminTools.php");
                } else {

                    echo("<h1>Du har inte rättigheter att visa den här sidan!</h1>");
                }
            ?>
		</div>
	</body>

</html>
