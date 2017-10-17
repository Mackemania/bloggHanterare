<?PHP
    //skickar nya användare till databasen och kollar om det är korrekt.
    require_once("blog_db.php");
    $db = new DB();

    $username = $_REQUEST["username"];
    //echo($username);
    $username = mb_strtolower($username, "UTF-8");
    $eMail = $_REQUEST["eMail"];
    $password = $_REQUEST["password"];
    $SQL = "select * from user where alias='$username' or eMail='$eMail'";
    //echo($SQL);
    $matrix = $db->getData($SQL);

    if(count($matrix)==0) {
        
        $SQL = "insert into user(eMail, alias, password, admin) values('$eMail', '$username', '$password', 0)";
        $db->execute($SQL);
        echo(1);

    } else {

        echo("This username/email is in use");
    }

?>
