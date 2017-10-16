<?php
require_once("blog_db.php");
$db = new DB();
session_start();

$userID = $_SESSION["userID"];

$blogID = $_SESSION["blogID"];
$postID = $_SESSION["postID"];

$commentID = 

$sql = "SELECT userID FROM user WHERE userID=$userID";

$matrix = $db->getData($sql);

$reportReason = $_REQUEST["reportReason"];

$reportFlag = "INSERT INTO flag(reason, userID, blogID, commentID, postID, OS, IP) VALUES ('reportReason', $userID, $blogID,  $postID, )"



/*if(isset($userID)){

}
*/



?>
