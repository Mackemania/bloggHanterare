<?php
    require_once("blog_db.php");
    $db = new DB();

    session_start();

    $userID = $_SESSION["userID"];
    $blogID = $_SESSION["blogID"];
    $postTitle = $db->getCon()->real_escape_string($_POST["postTitle"]);
    $postText = $db->getCon()->real_escape_string($_POST["postText"]);

    
    if (preg_match("/[\\\*\/<>%]/", $postTitle)){

        header("location: blog_userBlogs.php?ogiltig=1");
    
    } else {
        
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
        
        $old = umask(0);

        $source = str_replace("post.php", "", $source);
        mkdir($source);
        echo($postText);
        $postFile = fopen($source."/post.php", "w");
        fwrite($postFile, $postText);
        
        umask($old);
        
        /*
        $postfile = fopen("blogg/".$blogg."/".$post."/post.php", "w");
        fwrite($postfile, $posttext);

        $commentfile = fopen("blogg/".$blogg."/".$post."/comment_".$counter.".txt", "w");
        fwrite($commentfile, $commenttext);
        */
        //header("location: blog_blog.php?blogID=$blogID");
    }
?>
