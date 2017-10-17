<?PHP
    //Hämtar alla commentidn för en specifik blogg från databasen
    
    session_start();

    $postID = $_SESSION["postID"];
    require_once("blog_db.php");
    $db=new DB();

    $SQL = "SELECT commentID, source, createDate, userID FROM comment WHERE postID=$postID ORDER BY commentID ASC";
    //echo($SQL);
    $matrix = $db->getData($SQL);
    $commentIDs = "§";
    $commentSource = "§";
    $dates = "§";
    $users="§";
    
    for($i = 0; $i<count($matrix); $i++) {
    
        $commentIDs = $commentIDs."&".$matrix[$i][0];
        $commentSource = $commentSource."&".$matrix[$i][1];
        $dates = $dates."&".$matrix[$i][2];
        
        $SQL = "SELECT alias FROM user WHERE userID=".$matrix[0][3];
        $mat = $db->getData($SQL);
        
        $users = $users."&".$mat[0][0];
    }

    $data = $commentIDs.$commentSource.$dates.$users;

    echo($data);


?>