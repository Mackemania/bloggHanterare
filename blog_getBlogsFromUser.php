<?PHP
require_once("blog_db.php");

$db = new DB();

$SQL = "SELECT blogID, blogTitle, createDate FROM blog WHERE userID=".$_SESSION['userID'];
$matrix = $db->getData($SQL);
echo "<form action='document.getElementById('blogSettingsButton').style.display='none' method='post'>Vilken blogg vill du ändra? <select name='blogID' id='blogID' class='formText' required='required'>";
for($i = 0; $i<count($matrix); $i++)
{
    echo "<option value='".$matrix[$i][0]."'>".$matrix[$i][1];
    echo " [".$matrix[$i][2]."]";
    echo "</option>";
}
echo "</select><br />";
//echo "<br /><input type='submit' value='Välj en blogg'> </form>"
?>
