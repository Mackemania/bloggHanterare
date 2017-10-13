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

        <div id ="comment" class="modal comment form">
            <div id="modalContent" class="postModalContent">
                <div id="closeDiv">
                    <span onclick="document.getElementById('comment').style.display='none'" class="postClose" title="Stäng">&times;</span>
                </div>
                <h2>Kommentera</h2></br>
                <form method="post" action="javascript: blog_loginToDB();">
                    <div id="commentContent">
                    </div>
                    </br>


                    Kommentar:</br>
                    <input type="text" class="formText" id="commentText" name="commentText" placeholder="Kommentar" required="required"/></br></br>

                    <input type="submit" class="formButton" value="Kommentar"/>
                </form>
            </div>
        </div>
        
    </body>

</html>
