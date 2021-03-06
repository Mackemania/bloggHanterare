<?PHP
    require_once("blog_db.php");

    $db = new DB();

    session_start();
    $blogID = $_SESSION["blogID"];
    $postID = $_SESSION["postID"];
    
    $oldCommentID = $_SESSION['commentID'];
    $userID = $_SESSION['userID'];
    $commentText = $_POST['editCommentText'];
    $commentEdited = false;

    if($commentText == "' '") {
        $commentText = " ";
        $commentEdited = true;
    } else {
        $commentText = $db->getCon()->real_escape_string($commentText);
    }


    $SQL = "SELECT commentID,postID FROM comment ORDER BY commentID DESC";
    $matrix = $db->getData($SQL);

    $commentID = $matrix[0][0]+1;
    $postID = $matrix[0][1];

    $source = "blog/blog_$blogID/post_$postID/comment_$commentID.txt";

    $SQL = "INSERT INTO comment(source, userID, postID) VALUES('$source', $userID, $postID)";
    $db->execute($SQL);
    echo $SQL;

    $SQL = "INSERT INTO commentversion(oldID, newID) VALUES($oldCommentID, $commentID)";
    $db->execute($SQL);
    echo $SQL;
    $old = umask(0);

    $source = str_replace("comment_$commentID.txt", "", $source);
    mkdir($source);

    $SQL = "SELECT commentID FROM comment WHERE $commentID = $oldCommentID";
    $matrix = $db->getData($SQL);

    $commentFile = fopen($source."/comment_$commentID.txt", "w");
    fwrite($commentFile, $commentText);

    umask($old);

    if(!$commentEdited) {
        header("location: blog_blog.php?blogID=$blogID");
    }

?>