<?php

require_once("blog_db.php");
session_start();
$db = new DB();
$blogID = $_REQUEST["blogID"];
$permissionStatus = $_REQUEST["accessBlog"];

$sql = "UPDATE blog SET permissionStatus='$permissionStatus' WHERE blogID=$blogID";
$db->execute($sql);

header("location: blog_userSettings.php?page=settings");
?>
