<?PHP
    session_start();
    
    $userID = $_SESSION["userID"];

    require_once("blog_db.php");
    $db = new DB("localhost", "root", "", "bloggportal");

    $fName = $_REQUEST["firstName"];
    
    $lName = $_REQUEST["lastName"];
    
    $birthdate = $_REQUEST["birthdate"];
    
    $password = $_REQUEST["password"];
    
    if($password != null) {
        $SQL = "update user set fName='$fName', eName='$lName', password='$password, fDate='$birthdate' where userID=$userID";
        $db->execute($SQL);
        echo("true");
    
    } else {

        $SQL = "update user set fName='$fName', eName='$lName', fDate='$birthdate' where userID=$userID";
        $db->execute($SQL);
        echo("true");
    }

?>