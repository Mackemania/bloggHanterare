<?php
require_once("blog_db.php");
$db = new DB("localhost", "root", "", "bloggportal");

session_start();

$userID = $_SESSION["userID"];
$blogID = $_SESSION["blogID"];
$clientIP = $_SERVER['REMOTE_ADDR'];
$postTitle = $_POST["postTitle"];
$postText = $_POST["postText"];

$sql = "INSERT INTO blogg(title, textFile, IP, userID, bloggID) VALUES('$blogName', '$postLocation', '$clientIP', '$userID', '$blogID')";

$db->execute($sql);

$sql = "SELECT postID FROM post ORDER BY postID DESC";

$matrix = $db->getData($sql);

$postLocation = "post_".$matrix[0][0];

$postText = $postText."<?php require_once('".$blogLocation."/../blog_postMaker.php');"." $"."_SESSION"."['blogID'] = ".$matrix[0][0]." ?>";

mkdir($postLocation);

$postFile = fopen($postLocation."/post.php", "w");
fwrite($postFile, $postText);
/*
$postfile = fopen("blogg/".$blogg."/".$post."/post.php", "w");
fwrite($postfile, $posttext);

$commentfile = fopen("blogg/".$blogg."/".$post."/comment_".$counter.".txt", "w");
fwrite($commentfile, $commenttext);
*/
header($postLocation."/../blog.php");
?>
