<?PHP

    require_once("blog_db.php");
    $db = new DB();
    $blogID = $_REQUEST["blogID"];
    
    $SQL = "SELECT blogTitle FROM blog WHERE blogID=$blogID";
    $matrix = $db->getData($SQL);
    
    $name = $matrix[0][0];

?>
<html>
	<head>
        <?PHP

            echo("<title>$name | Bloog</title");

        ?>
    </head>
	<body onload="javascript: blog_getPostIDsFromDB();">
        <div id="container">
            <div id="blogContent">
                <?PHP
                    require_once("blog_menu.php");
                    $_SESSION["blogID"] = $blogID;
                    require_once("blog_postMaker.php");

                ?>

                <div id="postTexts">
                </div>
            </div>
        </div>
    </body>

</html>
