<?PHP
require_once("blog_db.php");

$db = new DB();

session_start();

$blogID = $_SESSION['blogID'];
$oldPostID = $_SESSION['postID'];
$userID = $_SESSION['userID'];
$postTitle = $_POST['editPostTitle'];
$postText = $_POST['editPostText'];


$SQL = "SELECT postID FROM post ORDER BY postID DESC";
$matrix = $db->getData($SQL);

$postID = $matrix[0][0]+1;

$source = "blog/blog_$blogID/post_$postID/post.php";

$SQL = "INSERT INTO post(postTitle, source, userID, blogID) VALUES('$postTitle', '$source', $userID, $blogID)";
$db->execute($SQL);
echo $SQL;
$SQL = "INSERT INTO postversion(oldID, newID) VALUES($oldPostID, $postID)";
$db->execute($SQL);
echo $SQL;
$old = umask(0);

$source = str_replace("post.php", "", $source);
mkdir($source);

$postFile = fopen($source."/post.php", "w");
fwrite($postFile, $postText);

umask($old);

//header("location: blog_blog.php?blogID=$blogID");
?>