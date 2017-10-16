<?PHP
    //skickar loggin infomration till databasen och får ett svar.
    require_once("blog_db.php");
    $db = new DB();

    $user = $_REQUEST["username"];
    $user = strtolower($user);
    $password = $_REQUEST["password"];
    $SQL = "SELECT * FROM user WHERE alias='$user' AND password='$password' COLLATE latin1_bin";
    //echo($SQL);
    $matrix = $db->getData($SQL);
    if(count($matrix) == 1) {
        $userId = $matrix[0][0];
        $admin = $matrix[0][7];

        session_start();
        $_SESSION["userID"] = $userId;
        $_SESSION["user"] = $user;
        $_SESSION["admin"] = $admin;

        echo(true);

    } else {

        echo("Fel användarnamn/lösenord");
    }

?>
