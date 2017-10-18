<?php
require_once("blog_db.php");
$db = new DB();
session_start();

$userID = $_SESSION["userID"];

$blogID = $_SESSION["blogID"];

if(isset($_REQUEST["postID"])) {
    $postID = $_REQUEST["postID"];
    $reportFlag = "INSERT INTO flag(userID, blogID, postID) VALUES ($userID, $blogID, $postID)";
    $db->execute($reportFlag);
}



if(isset($_REQUEST["commentID"])) {
    $commentID = $_REQUEST["commentID"];
    $reportFlag = "INSERT INTO flag(userID, blogID, commentID) VALUES ($userID, $blogID, $commentID)";
    $db->execute($reportFlag);
}

//$sql = "SELECT userID FROM user WHERE userID=$userID";

//$matrix = $db->getData($sql);



/*if(isset($userID)){

}
*/

?>
