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
    for($i = 1; $i<count($sources); $i++) {
        
        $src = $sources[$i];
        //echo($src);

        if ($type == "post") {
            
            $SQL = "SELECT userID FROM post WHERE source='$src'";
            $matrix = $db->getData($SQL);
        
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

    echo($post."§".$isUserCreator);
    
?>