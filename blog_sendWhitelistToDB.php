<?php

require_once("blog_db.php");
session_start();
$db = new DB();
$blogID = $_REQUEST["blogID"];
$permissionLevel = $_REQUEST["userAccess"];
$permissionUser = $_POST['permissionName'];

$SQL = "SELECT userID FROM user WHERE alias='$permissionUser'";
echo($SQL);
$matrix = $db->getData($SQL);

$permissionUserID = $matrix[0][0];

$SQL="SELECT * FROM permission WHERE userID=$permissionUserID AND blogID=$blogID";
$matrix = $db->getData($SQL);

if(count($matrix)>0) {

    $permissionID = $matrix[0][0];
    $SQL = "UPDATE permission SET level='$permissionLevel' WHERE permissionID=$permissionID";
    $db->execute($SQL);

} else {
    $SQL = "INSERT INTO permission(level, userID, blogID) VALUES ($permissionLevel, $permissionUserID, $blogID)";
    $db->execute($SQL);
}

header("location: blog_userSettings.php?page=settings");
?>
