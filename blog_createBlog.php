
<?php
require_once("blog_db.php");
$db = new DB();

session_start();
$blogOwner = $_SESSION["userID"];
$blogTitle = $_POST["blogTitle"];
$blogDescription = $_POST["blogDescription"];

$sql = "INSERT INTO blog(blogTitle, blogDescription, css, userID, permissionStatus) VALUES('$blogTitle', '$blogDescription', '1', $blogOwner, 0)";

$db->execute($sql);

$sql = "SELECT blogID FROM blog ORDER BY blogID DESC";

$matrix = $db->getData($sql);

$blogLocation = "blog_".$matrix[0][0];

mkdir("blog/".$blogLocation);

header("location: index.php");
?>
