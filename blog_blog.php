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
	<body>
        <div id="container">
            <div id="blogContent">
                <?PHP
                    require_once("blog_menu.php");
                    
                    require_once("blog_postMaker.php");

                    $_SESSION["blogID"] = $blogID;
                    
                    $SQL = "SELECT postID, postTitle, source FROM post WHERE blogID=$blogID";
                    $matrix = $db->getData($SQL);

                    for($i = 0; $i<count($matrix); $i++) {
                        $postIDs[$i] = $matrix[$i][0];
                        $postTitles[$i] = $matrix[$i][1];
                        $postSource[$i] = $matrix[$i][2];

                    }

                ?>
            </div>
        <div id="container">
    </body>

</html>
