//hämtar och skriver namn och födelsedatum på sig själv
<?PHP
    require_once("blog_db.php");
    session_start();
    $db = new DB();

    $data= "";
    $userID = $_SESSION["userID"];

    $SQL = "select firstName, lastName, birthDate FROM user WHERE userID=$userID";
    $matrix = $db->getData($SQL);

    $fName = $matrix[0][0];
    $lName = $matrix[0][1];
    $birthdate = $matrix[0][2];



        $data="$fName"."&$lName"."&$birthdate";


    echo($data);

?>
