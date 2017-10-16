<?php
    /*gör en lista med alla bloggar.*/

    $blogLink = "";
    $blogName = "";

    require_once("blog_db.php");
    $db = new DB();

    $userID = $_SESSION["userID"];


    $sql = "SELECT blogID, blogTitle, blogDescription FROM blog WHERE userID=$userID";
    $matrix = $db->getData($sql);

    for($i = 0; $i<count($matrix); $i++) {

        echo("<div class='blogDiv'>
            <h3 class='postH3'><a href='blog_blog.php?blogID=".$matrix[$i][0]."'>".$matrix[$i][1]."</a></h3><hr>".$matrix[$i][2]."

        </div>");

    }
?>
