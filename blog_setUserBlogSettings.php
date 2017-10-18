<?PHP
require_once("blog_db.php");
$db = new DB();
session_start();

if(isset($_POST["permissionLevel"]))
{
    $blogID = $_POST["blogID"];
    $permissionLevel = $_POST["permissionLevel"];

    if($permissionLevel == "Open")
    $permissionLevel = 0;

    if($permissionLevel == "LoggedIn")
    $permissionLevel = 1;

    if($permissionLevel == "Private")
    $permissionLevel = 2;

    $SQL = "UPDATE blog SET permissionStatus=".$permissionLevel." WHERE blogID='".$blogID."'";
    $db->execute($SQL);
}
header("location: blog_userSettings.php?page=settings")
?>