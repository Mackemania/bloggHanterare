<?PHP
    //gör om infomation om en användare i databasen.
    session_start();

    $userID = $_SESSION["userID"];

    require_once("blog_db.php");
    $db = new DB();

    $firstName = $_REQUEST["firstName"];

    $lastName = $_REQUEST["lastName"];

    $birthDate = $_REQUEST["birthdate"];

    $password = $_REQUEST["password"];

    $confirmPassword = $_REQUEST["confirmPassword"];


    $SQL = "SELECT userID FROM user WHERE userID=? AND password=?";
    $con = $db->getCon();

    $statement = $con->prepare($SQL);

    $statement->bind_param("is", $userID, $confirmPassword);
    $statement->execute();

    $statement->bind_result($userID);
    
    $matrix = array();

    while($statement->fetch()) {
        $value[0] = $userID;

        array_push($matrix, $value);
    }

    if(count($matrix) == 1) {

        if($password != null) {
            $SQL = "update user set firstName='$firstName', lastName='$lastName', password='$password', birthDate='$birthDate' where userID=$userID";
            $db->execute($SQL);
            echo("true");

        } else {

            $SQL = "update user set firstName='$firstName', lastName='$lastName', birthDate='$birthDate' where userID=$userID";
            $db->execute($SQL);
            echo("true");
        }

    } else {
        echo("Något gick snett");
    }

?>
