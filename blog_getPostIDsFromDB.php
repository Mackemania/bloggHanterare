<?PHP
    //Hämtar alla ostidn för en specifik blogg från databasen
    
    session_start();
    $blogID = $_SESSION["blogID"];

    require_once("blog_db.php");
    $db=new DB();

    $SQL = "SELECT postID, postTitle, source FROM post WHERE blogID=8 ORDER BY postID DESC";
    //echo($SQL);
    $matrix = $db->getData($SQL);
    $postIDs = "§";
    $postTitles = "§";
    $postSource = "§";
    
    for($i = 0; $i<count($matrix); $i++) {
    
        $postIDs = $postIDs."&".$matrix[$i][0];
        $postTitles = $postTitles."&".$matrix[$i][1];
        $postSource = $postSource."&".$matrix[$i][2];
    
    }

    $data = $postIDs.$postTitles.$postSource;

    echo($data);


?>