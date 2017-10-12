<?php
    require_once("blog_db.php");
    $db = new DB("localhost", "root", "", "bloggportal");

    session_start();

    $userID = $_SESSION["userID"];
    $blogID = $_SESSION["blogID"];
    $postTitle = $_POST["postTitle"];
    $postText = $_POST["postText"];

    $SQL = "SELECT postID FROM post ORDER BY postID DESC";
    $matrix = $db->getData($SQL);

    if(isset($matrix[0][0])) {
        $postID = $matrix[0][0]+1;
    } else {

        $postID = 1;
    }

    $source = "blog/blog_$blogID/post_$postID/post.php";

    $SQL = "INSERT INTO post(postTitle, source, userID, blogID) VALUES('$postTitle', '$source', $userID, $blogID)";
    $db->execute($SQL);

    $source = str_replace("post.php", "", $source);
    mkdir($source);

    $postFile = fopen($source."/post.php", "w");
    fwrite($postFile, $postText);
    /*
    $postfile = fopen("blogg/".$blogg."/".$post."/post.php", "w");
    fwrite($postfile, $posttext);

    $commentfile = fopen("blogg/".$blogg."/".$post."/comment_".$counter.".txt", "w");
    fwrite($commentfile, $commenttext);
    */
    header("location: blog_blog.php?blogID=$blogID");
?>
