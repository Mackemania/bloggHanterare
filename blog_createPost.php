<?php
require_once("blog_db.php");
$db = new DB("localhost", "root", "", "bloggportal");

session_start();

$userID = $_SESSION["userID"];
$blogID = $_SESSION["blogID"];
$clientIP = $_SERVER['REMOTE_ADDR'];
$postTitle = $_POST["postTitle"];
$postText = $_POST["postText"];

$sql = "SELECT postID FROM post ORDER BY postID DESC";

$matrix = $db->getData($sql);

$postLocationNR = ($matrix[0][0])+1;

$postLocation = "blog/blog_".$blogID."/post_".$postLocationNR;

$sql = "INSERT INTO post(title, textFile, IP, userID, bloggID) VALUES('$postTitle', '$postLocation', '$clientIP', '$userID', '$blogID')";

$db->execute($sql);


$postText = $postText."<? session_start(); $"."_SESSION"."['postID'] = ".$postLocationNR." ?>";

mkdir($postLocation);

$postFile = fopen($postLocation."/post.php", "w");
fwrite($postFile, $postText);
/*
$postfile = fopen("blogg/".$blogg."/".$post."/post.php", "w");
fwrite($postfile, $posttext);

$commentfile = fopen("blogg/".$blogg."/".$post."/comment_".$counter.".txt", "w");
fwrite($commentfile, $commenttext);
*/
header($postLocation."../blog_+".$blogID.".php");
?>
