<html>
	<head>

		<title>Admin_flaggor | Bloog</title>

	</head>
	<body>
        <?PHP
        session_start();
            if($_SESSION["admin"]==1) 
            {
                require_once("blog_db.php");

                $db = new DB();

                $SQL = "SELECT reportID, reportDate, reason, userID, blogID, commentID, postID FROM flag WHERE checked<>1 ORDER BY reportDate DESC";

                $matrix = $db->getData($SQL);

                echo "<form action='blog_A_checkFlags.php' method='post'>";

                for($i = 0; $i<count($matrix); $i++) 
                {
                    echo "Flagid: [".$matrix[$i][0]."]  ";
                    if($matrix[$i][3]!=null)
                    {
                        echo "AnvändarID: ".$matrix[$i][3].". ";
                    }
                    if($matrix[$i][4]!=null)
                    {
                        echo "BlogID: ".$matrix[$i][4].". ";
                    }
                    if($matrix[$i][6]!=null)
                    {
                        echo "InläggID: ".$matrix[$i][6].". ";
                    }
                    if($matrix[$i][5]!=null)
                    {
                        echo "KommentarID: ".$matrix[$i][5].". ";
                    }
                    echo "Datum: ".$matrix[$i][1].". ";
                    echo "andledning: ".$matrix[$i][2].". <input type='checkbox' name='reportID' value='".$matrix[$i][0]."'> <br />";
                }

                echo "<input type='submit' value='Checka'>";
            }
        ?>
	</body>

</html>