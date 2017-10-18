<?php

require_once("blog_db.php");
$db = new DB();
session_start();

$userID = $_SESSION["userID"];
$sendAboutMe = $_POST["aboutMe"];


$aboutMe = "UPDATE user SET aboutMe='$sendAboutMe' WHERE userID=$userID";
$db->execute($aboutMe);

header("location: blog_userSettings.php");
?>