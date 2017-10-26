<?PHP
    require_once("blog_db.php");
    $db = new DB();
    session_start();

    $reasons = array("Spam", "Förtal", "Pornografi", "Anstötligt uppförande", "Övrigt");

    $userID = $_SESSION["userID"];
    $blogID = $_SESSION["blogID"];

    if(isset($_REQUEST["type"])) {
        $type = $_REQUEST["type"];
    }

    if($type == "post") {
        $postID = $_SESSION["postID"];
        $reason = $_REQUEST["flagReason"];
        $textReason = $reasons[$reason];
        $reportFlag = "INSERT INTO flag(userID, checked, reason, blogID, postID) VALUES ($userID, 0, '$textReason', $blogID, $postID)";
        $db->execute($reportFlag);
    }


    if($type == "comment") {
        $commentID = $_SESSION["commentID"];
        $reason = $_REQUEST["flagCommentReason"];
        $textReason = $reasons[$reason];
        echo($textReason);
        $reportFlag = "INSERT INTO flag(userID, checked, reason, blogID, commentID) VALUES ($userID, 0, '$textReason', $blogID, $commentID)";
        $db->execute($reportFlag);
    }

    header("location: blog_blog.php?blogID=$blogID");

    //$sql = "SELECT userID FROM user WHERE userID=$userID";

    //$matrix = $db->getData($sql);



    /*if(isset($userID)){

    }
    */

?>
