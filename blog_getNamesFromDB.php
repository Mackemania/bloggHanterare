<?PHP
    require_once("blog_db.php");
    session_start();
    $db = new DB("localhost", "root", "", "bloggportal");

    $data= "";
    $userID = $_SESSION["userID"];

    $SQL = "select fName, eName from user where userID=$userID";
    $matrix = $db->getData($SQL);

    $fName = $matrix[0][0];
    $lName = $matrix[0][1];

    if(isset($fName)) {

        $data="$fName";

    }

    if(isset($lName)) {
        
        $data=$data."&$lName";
    
    }

    echo($data);

?>