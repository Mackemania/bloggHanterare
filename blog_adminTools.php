<?PHP

require_once("blog_db.php");
$db = new DB();

$date = date("Y-m-d");

$SQL = "SELECT userID, alias, suspended FROM user WHERE admin != 1";

$matrix = $db->getData($SQL);
echo "<br/><form action='blog_banUser.php' method='post'>Vem är det som ska bli bannad: <select name='userID' id='userID'>";
for($i = 0; $i<count($matrix); $i++)
{
    echo "<option value='".$matrix[$i][0]."'>".$matrix[$i][1];
    if(strtotime($matrix[$i][2])>time())
    {
        echo " [Banned Until: ".$matrix[$i][2]."]";
    }
    echo "</option>";
}
echo "</select><br/>";

echo "Hur långt bann?";

echo("<input type='date' id='suspendedUntil' name='suspendedUntil' class='formText' onkeyup='javascript: blog_enableEditButton();' onchange='javascript: blog_enableEditButton();' min='$date'/></br>");

echo "Andledning till bann:<input type='text' name='reason' required='required'> <input type='submit' value='suspend user'> </form>";

echo "<br/><form action='blog_unBanUser.php' method='post'>";
echo "<select name='userID' id='userID'>";
for($i = 0; $i<count($matrix); $i++)
{
    if(strtotime($matrix[$i][2])>time())
    {
    echo "<option value='".$matrix[$i][0]."'>".$matrix[$i][1];
    echo " [Banned Until: ".$matrix[$i][2]."]";
    echo "</option>";
    }
}
echo "</select><br/>";
echo "Andledning till borttagen bann:<input type='text' name='reason' required='required'><br/>";
echo "<input type='submit' value='ta bort bann'> </form>";

?>