//skickar data till databasen vid skapning av nytt inlägg
<?php
require_once("blog_db.php");
$db = new DB();

session_start();

$userID = $_SESSION["userID"];
$blogID = $_SESSION["blogID"];
$postTitle = $_POST["postTitle"];
$postText = $_POST["postText"];

$sql = "SELECT postID FROM post ORDER BY postID DESC";

$matrix = $db->getData($sql);

$postLocationNR = ($matrix[0][0])+1;

$postLocation = "blog/blog_".$blogID."/post_".$postLocationNR;

$sql = "INSERT INTO post(postTitle, source, userID, blogID) VALUES('$postTitle', '$postLocation', '$userID', '$blogID')";

$db->execute($sql);


$postText = $postText."<? session_start(); $"."_SESSION"."['postID'] = ".$postLocationNR." ?>";

mkdir($postLocation);

$postFile = fopen($postLocation."/post.php", "w");
fwrite($postFile, $postText);

header('location: '.$postLocation."/../blog.php");
?>
