<?PHP
    session_start();

    $userID = $_SESSION["userID"];

    require_once("blog_db.php");
    $db = new DB("localhost", "root", "", "blog");

    $firstName = $_REQUEST["firstName"];

    $lastName = $_REQUEST["lastName"];

    $birthDate = $_REQUEST["birthdate"];

    $password = $_REQUEST["password"];

    if($password != null) {
        $SQL = "update user set firstName='$firstName', lastName='$lastName', password='$password, birthDate='$birthDate' where userID=$userID";
        $db->execute($SQL);
        echo("true");

    } else {

        $SQL = "update user set firstName='$firstName', lastName='$lastName', birthDate='$birthDate' where userID=$userID";
        $db->execute($SQL);
        echo("true");
    }

?>
