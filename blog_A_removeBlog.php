<?PHP
require_once("blog_db.php");
require_once("blog_menu.php");
$db = new DB();

$SQL = "UPDATE blog SET permissionStatus=4 WHERE blogID=".$_POST['blogID'];
$db->execute($SQL);

echo("Blogg borttagen");
?>