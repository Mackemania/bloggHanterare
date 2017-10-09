<?php
require_once("blog_db.php");
$db = new DB("localhost", "root", "", "bloggportal");

session_start();
$blogOwner = $_SESSION["userID"];
$clientIP = $_SERVER['REMOTE_ADDR'];
$blogName = $_POST["blogName"];
$blogDescription = $_POST["blogDescription"];

$sql = "INSERT INTO blogg(name, description, IP, userID) VALUES('$blogName', '$blogDescription', '$clientIP', '$blogOwner')";

$db->execute($sql);

$sql = "SELECT bloggID FROM blogg ORDER BY bloggID DESC";

$matrix = $db->getData($sql);

$blogLocation = "blog_".$matrix[0][0];

mkdir("blog/".$blogLocation);

$blogphp = "<?php require_once('../../blog_postMaker.php');"." session_start(); $"."_SESSION"."['blogID'] = ".$matrix[0][0]."; require_once('../../blog_postLink.php'); ?>";

$blogfile = fopen("blog/".$blogLocation."/blog.php", "w");
fwrite($blogfile, $blogphp);
/*
$postfile = fopen("blogg/".$blogg."/".$post."/post.php", "w");
fwrite($postfile, $posttext);

$commentfile = fopen("blogg/".$blogg."/".$post."/comment_".$counter.".txt", "w");
fwrite($commentfile, $commenttext);
*/
header("index.php");
?>
