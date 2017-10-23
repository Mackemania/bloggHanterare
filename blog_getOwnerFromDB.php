<?PHP
    session_start();
    require_once("blog_db.php");
    $db = new DB();

    if(isset($_SESSION["userID"])) {
     
        $userID = $_SESSION["userID"];
    
    } else {
      
        $userID = 0;
    
    }
    
    if(isset($_REQUEST["postID"])) {
        
        $postID = $_REQUEST["postID"];

        $SQL = "SELECT userID FROM post WHERE postID=$postID";
        $matrix = $db->getData($SQL);

        $creator = $matrix[0][0];
        
        if($creator == $userID) {
            
            echo("1&".$postID);
        
        } else {
    
            echo(0);
        
        }
    
    } else if(isset($_REQUEST["commentID"])) {
        
        $commentID = $_REQUEST["commentID"];
        
        $SQL = "SELECT userID FROM comment WHERE commentID=$commentID";
        $matrix = $db->getData($SQL);

        $creator = $matrix[0][0];
        
        if($creator == $userID) {
            
            echo("1&".$commentID);
        
        } else {
    
            echo(0);
        
        }
    }


    
    

    
?>