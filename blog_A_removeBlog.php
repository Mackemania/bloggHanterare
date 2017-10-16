<?PHP
require_once("blog_db.php");

$db = new DB();

$SQL = "UPDATE blog SET permissionStatus="4" FROM blog WHERE blogID=".$_POST['blogID'];

$db->execute($SQL);
?>