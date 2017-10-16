<?PHP
    //Hämtar alla commentidn för en specifik blogg från databasen
    
    session_start();

    $postID = $_SESSION["postID"];
    require_once("blog_db.php");
    $db=new DB();

    $SQL = "SELECT commentID, source, postID FROM comment WHERE postID=$postID ORDER BY commentID ASC";
    //echo($SQL);
    $matrix = $db->getData($SQL);
    $commentIDs = "§";
    $commentSource = "§";
    $postIDs = "§";
    
    for($i = 0; $i<count($matrix); $i++) {
    
        $commentIDs = $commentIDs."&".$matrix[$i][0];
        $commentSource = $commentSource."&".$matrix[$i][1];
        $postIDs = $postIDs."&".$matrix[$i][2];
    }

    $data = $commentIDs.$commentSource.$postIDs;

    echo($data);


?>