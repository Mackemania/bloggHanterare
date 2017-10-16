<html>
	<head>

		<title>Admin_användarbloggar | Bloog</title>

	</head>
	<body>
        <?PHP
        require_once("blog_db.php");

        $db = new DB();

        $SQL = "SELECT blogID, blogTitle, createDate FROM blog WHERE userID=".$_POST['userID'];
        $matrix = $db->getData($SQL);
        echo $SQL;
        echo "<br/><form action='blog_A_removeBlog.php' method='post'>Vilken blog vill du ta bort?: <select name='blogID' id='blogID'>";
        for($i = 0; $i<count($matrix); $i++)
        {
            echo "<option value='".$matrix[$i][0]."'>".$matrix[$i][1];
            echo " [".$matrix[$i][2]."]";
            echo "</option>";
        }
        echo "</select><br/>";
        echo "<input type='submit' value='ta bort blog'> </form>"
        ?>
	</body>

</html>