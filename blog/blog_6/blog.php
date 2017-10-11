<?PHP
    $root = $_SERVER["DOCUMENT_ROOT"];
    require_once("../../blog_menu.php");
    require_once("../../blog_db.php");
    $db = new DB();
    $SQL = "SELECT blogTitle FROM blog WHERE";

?>
<html>
	<head>

		<link href="../../blog_style.css" media="screen" type="text/css" rel="stylesheet"/>
        <script src="../../code.js"></script>
        <script src="../../ajaxlib.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	</head>
	<body>

    </body>

</html>
