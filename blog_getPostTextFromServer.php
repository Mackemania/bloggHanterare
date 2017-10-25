<?PHP

    session_start();
    require_once("blog_db.php");
    $db = new DB();    

    if(isset($_SESSION["userID"])) {
    
        $userID = $_SESSION["userID"];
    
    } else {
      
        $userID = 0;
    
    }

    $data = $_REQUEST["source"];
    $type = $_REQUEST["type"];
    
    $sources = explode(",", $data);
    
    $post="";
    $isUserCreator = "";
    $alias = "";
    $createDate="";
    $edited = "";
    for($i = 1; $i<count($sources); $i++) {
        
        $src = $sources[$i];
        //echo($src);

        if ($type == "post") {
            
            $SQL = "SELECT userID, createDate, postID FROM post WHERE source='$src'";
            $matrix = $db->getData($SQL);

            $userID = $matrix[0][0];
            $createDate = $createDate."&".$matrix[0][1];
            $postID = $matrix[0][2];
            //echo($postID."\n");

            $SQL = "SELECT alias FROM user WHERE userID=$userID";
            $temp = $db->getData($SQL);
            $alias = $alias."&".$temp[0][0];

            $SQL = "SELECT oldID FROM postversion WHERE newID=$postID";
    
            $temp = $db->getData($SQL);

            if(count($temp)>0) {

                $edited = $edited."&1";
            } else {

                $edited = $edited."&0";
            }

        } else if( $type == "comment") {
           
            $SQL = "SELECT userID FROM comment WHERE source='$src'";
            $matrix = $db->getData($SQL);
        
        }
        
        $creator = $matrix[0][0];

        if($creator != 0 && $creator == $userID) {
            
            $isUserCreator = $isUserCreator."&1";
        
        } else {
            
            $isUserCreator = $isUserCreator."&0";
        
        }
        
        $postFile = fopen($src, "r");
        $post = $post."&".fread($postFile, filesize($src));
        fclose($postFile);
        
    }

    echo($post."§".$isUserCreator."§".$alias."§".$createDate."§".$edited);
    
?>