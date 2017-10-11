<?php
require_once("blog_db.php");
$db = new DB();

session_start();
$blogOwner = $_SESSION["userID"];
$blogTitle = $_POST["blogTitle"];
$blogDescription = $_POST["blogDescription"];

$sql = "INSERT INTO blog(blogTitle, blogDescription, css, userID) VALUES('$blogTitle', '$blogDescription', '1', '$blogOwner')";

$db->execute($sql);

$sql = "SELECT blogID FROM blog ORDER BY blogID DESC";

$matrix = $db->getData($sql);

$blogLocation = "blog_".$matrix[0][0];

mkdir("blog/".$blogLocation);

$blogphp = "<?php require_once('../../blog_postMaker.php');"." session_start(); $"."_SESSION"."['blogID'] = ".$matrix[0][0]."; require_once('../../blog_postLink.php'); ?>";

$blogSource = fopen("blog/".$blogLocation."/blog.php", "w");
fwrite($blogSource, $blogphp);
/*
$postfile = fopen("blogg/".$blogg."/".$post."/post.php", "w");
fwrite($postfile, $posttext);

$commentfile = fopen("blogg/".$blogg."/".$post."/comment_".$counter.".txt", "w");
fwrite($commentfile, $commenttext);
*/
header("location: index.php");
?>
