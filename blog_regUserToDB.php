<?PHP
    //skickar nya användare till databasen och kollar om det är korrekt.
    //ini_set("display_errors", "on");
    //error_reporting(-1);
    require_once("blog_db.php");
    $db = new DB();

    $username = $_REQUEST["username"];
    //echo($username);

    $username = utf8_decode($username);
    $username = strtolower($username);
    $username = utf8_encode($username);
    $eMail = $_REQUEST["eMail"];
    
    $password = $_REQUEST["password"];

    $SQL = "select * from user where alias='$username' or eMail='$eMail'";
    //echo($SQL);

    $matrix = $db->getData($SQL);

    if(count($matrix)==0) {
        
        $SQL = "insert into user(eMail, alias, password, admin) values(?, ?, ?, 0)";
        $dbCon= $db->getCon();
    
        
        $statement = $dbCon->prepare($SQL);
        
        if($statement == false) {
            echo("Something went wrong!");
        } else {
    
            $statement->bind_param("sss", $eMail, $username, $password);
            
            $statement->execute();
            echo(1);
        }

        

    } else {

        echo("This username/email is in use");
    }

?>
