<?PHP
    require_once("blog_db.php");
    $db = new DB("localhost", "root", "", "bloggportal");

    $user = $_REQUEST["username"];
    $user = strtolower($user);
    $password = $_REQUEST["password"];
    $SQL = "select * from user where alias='$user' and password='$password'";
    $matrix = $db->getData($SQL);
    if(count($matrix) == 1) {
        $userId = $matrix[0][0];

        session_start();
        $_SESSION["userID"] = $userId;
        $_SESSION["user"] = $user;

        echo(true);

    } else {

        echo("False");
    }

?>
