<?PHP
    require_once("blog_db.php");

    $db = new DB();
    
    $SQL = "UPDATE user SET suspended='".$_POST['suspendedUntil']."' WHERE userID=".$_POST['userID'];

    $db->execute($SQL);
    
    $SQL = "INSERT INTO suspension(userID, reason) values(".$_POST['userID'].", '".$_POST['reason']."')";

    $db->execute($SQL);

    header("location: blog_adminSettings.php");
?>