

<?php
require_once("blog_db.php");

session_start();

$userID = $_SESSION["userID"];

$db = new DB("localhost", "root", "", "blog");

$sql = "SELECT description FROM user WHERE userID=".$userID;

$matrix = $db->getData($sql);

echo $matrix[0][0];
?>
