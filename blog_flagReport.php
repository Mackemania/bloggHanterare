<?PHP
    require_once("blog_db.php");
    $db = new DB();
    session_start();

    $reasons = array("Spam", "Förtal", "Pornografi", "Anstötligt uppförande", "Övrigt");

    $userID = $_SESSION["userID"];
    $blogID = $_SESSION["blogID"];

    if(isset($_SESSION["postID"])) {
        $postID = $_SESSION["postID"];
        $reason = $_REQUEST["flagReason"];
        $textReason = $reasons[$reason];
        $reportFlag = "INSERT INTO flag(userID, reason, blogID, postID) VALUES ($userID, '$textReason', $blogID, $postID)";
        $db->execute($reportFlag);
    }


    if(isset($_SESSION["commentID"])) {
        $commentID = $_SESSION["commentID"];
        $reason = $_REQUEST["flagReason"];
        $textReason = $reasons[$reason];
        $reportFlag = "INSERT INTO flag(userID, reason, blogID, commentID) VALUES ($userID, '$textReason', $blogID, $commentID)";
        $db->execute($reportFlag);
    }

    header("location: blog_blog.php?blogID=$blogID");

    //$sql = "SELECT userID FROM user WHERE userID=$userID";

    //$matrix = $db->getData($sql);



    /*if(isset($userID)){

    }
    */

?>
