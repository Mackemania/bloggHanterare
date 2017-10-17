<?php
require_once("blog_db.php");
$db = new DB();
session_start();

$userID = $_SESSION["userID"];

$blogID = $_SESSION["blogID"];
$postID = $_REQUEST["postID"];


//$sql = "SELECT userID FROM user WHERE userID=$userID";

//$matrix = $db->getData($sql);

$reportFlag = "INSERT INTO `flag`(`userID`, `blogID`, `postID`) VALUES ($userID, $blogID, $postID)";

$db->execute($reportFlag);

/*if(isset($userID)){

}
*/



?>
