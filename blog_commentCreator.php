<?php
    require_once("blog_db.php");
    $db = new DB();

    session_start();
    $blogID = $_SESSION["blogID"];
    $userID = $_SESSION["userID"];
    $postID = $_SESSION["postID"];
    $commentText = $_POST["commentArea"];

    $SQL = "SELECT commentID FROM comment ORDER BY commentID DESC";
    $matrix = $db->getData($SQL);
 

    if(isset($matrix[0][0])) {
        $commentID = $matrix[0][0]+1;
    } else {

        $commentID = 1;
    }

    $source = "blog/blog_$blogID/post_$postID/comment_$commentID.txt";

    $SQL = "INSERT INTO comment(source, userID, postID) VALUES('$source', $userID, $postID)";
    $db->execute($SQL);
 
    $old = umask(0);
    
    $commentFile = fopen($source, "w");
    fwrite($commentFile, $commentText);
    
    umask($old);
    
    /*
    $postfile = fopen("blogg/".$blogg."/".$post."/post.php", "w");
    fwrite($postfile, $posttext);

    $commentfile = fopen("blogg/".$blogg."/".$post."/comment_".$counter.".txt", "w");
    fwrite($commentfile, $commenttext);
    */
    header("location: blog_blog.php?blogID=$blogID");
?>
