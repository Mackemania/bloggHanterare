<?PHP
    //skickar loggin infomration till databasen och får ett svar.
    require_once("blog_db.php");
    $db = new DB();

    
    
    $dbCon= $db->getCon();

    $SQL = "SELECT userID, admin FROM user WHERE alias=? AND password=?";
    $statement = $dbCon->prepare($SQL);
    
    if($statement == false) {
        
        echo("Fel användarnamn/lösenord");

    } else {

        $statement->bind_param("ss", $user, $password);
        
        $user = $_REQUEST["username"];
        $user = utf8_decode($user);
        $user = strtolower($user);
        $user = utf8_encode($user);
        
        $password = $_REQUEST["password"];
        $statement->execute();
        $statement->bind_result($userID, $admin);
        
        $matrix = array();

        while($statement->fetch()) {
            $value[0] = $userID;
            $value[1] = $admin;

            array_push($matrix, $value);
        }

        if(count($matrix) == 1) {
            $userID = $matrix[0][0];
            $admin = $matrix[0][1];

            session_start();
            $_SESSION["userID"] = $userID;
            $_SESSION["user"] = $user;
            $_SESSION["admin"] = $admin;

            echo(true);

        } else {

            echo("Fel användarnamn/lösenord");
        }
    }

?>
