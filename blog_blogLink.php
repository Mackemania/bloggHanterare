<?php
    /*gör en lista med alla bloggar.*/
    
    $blogLink = "";
    $blogName = "";

    require_once("blog_db.php");
    $db = new DB();


    $sql = "SELECT blogID, blogTitle FROM blog";
    $matrix = $db->getData($sql);

    for($i = 0; $i<count($matrix); $i++) {

        echo("<a href='blog_blog.php?blogID=".$matrix[$i][0]."'>".$matrix[$i][1]."</a><br/>");
    
    }
?>
