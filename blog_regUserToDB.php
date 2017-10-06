<?PHP

    require_once("blog_db.php");
    $db = new DB("localhost", "root", "", "bloggportal");

    $username = $_REQUEST["username"];
    $eMail = $_REQUEST["eMail"];
    $password = $_REQUEST["password"];

    $SQL = "select * from user where alias='$username' or eMail='$eMail'";
    $matrix = $db->getData($SQL);

    if(count($matrix)==0) {
    
        $SQL = "insert into user(eMail, alias, password) values('$eMail', '$username', '$password')";
        $db->execute($SQL);
        echo("True");
    
    } else {

        echo("This username/email is in use");
    }
    

?>