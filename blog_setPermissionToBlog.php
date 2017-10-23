<?PHP
require_once("blog_db.php");
$db = new DB();
session_start();

if(isset($_POST["alias"]))
{

    $SQL = "SELECT userID FROM user WHERE alias='".$_POST['alias']."'";

    $matrix = $db->getData($SQL);

    $permission = $_POST["permission"];

    if($permission == "Read")
    $permission = 0;

    if($permission == "Admin")
    $permission = 1;

    $SQL = "INSERT INTO permission(level, userID, blogID) values(".$permission.", ".$matrix[0][0].", ".$_POST['blogID'].")";
    $db->execute($SQL);
}
header("location: blog_userSettings.php?page=settings")
?>
