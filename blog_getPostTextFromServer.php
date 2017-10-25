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
            
            $SQL = "SELECT userID, createDate, postID, blogID FROM post WHERE source='$src'";
            $matrix = $db->getData($SQL);

            $creator = $matrix[0][0];
            $createDate = $createDate."&".$matrix[0][1];
            $postID = $matrix[0][2];
            $blogID = $matrix[0][3];
            //echo($postID."\n");

            $SQL = "SELECT userID FROM blog WHERE blogID=$blogID";
            $matrix = $db->getData($SQL);
    
            $owner = $matrix[0][0];
            
            $SQL = "SELECT alias FROM user WHERE userID=$creator";
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

            $SQL = "SELECT userID, postID, commentID FROM comment WHERE source='$src'";
            $matrix = $db->getData($SQL);
            $creator = $matrix[0][0];
            $postID = $matrix[0][1];
            $commentID = $matrix[0][2];
            
            $SQL = "SELECT blogID FROM post WHERE postID=$postID";
            //echo($SQL);
            $matrix = $db->getData($SQL);
    
            $blogID = $matrix[0][0];
    
            $SQL = "SELECT userID FROM blog WHERE blogID=$blogID";
            $matrix = $db->getData($SQL);
    
            $owner = $matrix[0][0];

            $SQL = "SELECT oldID FROM commentversion WHERE newID=$commentID";
            
            $temp = $db->getData($SQL);

            if(count($temp)>0) {

                $edited = $edited."&1";
            
            } else {

                $edited = $edited."&0";
            }
        
        }
        //echo("userID: ".$userID."\n");
        //echo("creator:".$creator."\n");
        if($creator != 0 && $userID == $creator || $owner == $userID) {
            
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