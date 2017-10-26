<?PHP
    $reportIDs = $_POST['reportID'];
    require_once("blog_db.php");
    $db = new DB();

    for($i = 0; $i<count($reportIDs); $i++)
    {
        if($reportIDs == true)
        {
        $SQL = "UPDATE flag SET checked = 1 WHERE reportID='".$reportIDs[$i]."'";
        echo($SQL);
        $db->execute($SQL);
        }
    }
    header("location: blog_adminSettings.php");
?>