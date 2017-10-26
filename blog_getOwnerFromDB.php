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
        $_SESSION["postID"] = $postID;
        
        $SQL = "SELECT userID, blogID FROM post WHERE postID=$postID";
        $matrix = $db->getData($SQL);
        $creator = $matrix[0][0];
        $blogID = $matrix[0][1];
        
        $SQL = "SELECT userID FROM blog WHERE blogID=$blogID";
        $matrix = $db->getData($SQL);

        $owner = $matrix[0][0];

        $SQL = "SELECT admin FROM user WHERE userID=$userID";
        $matrix = $db->getData($SQL);
        $admin = $matrix[0][0];
        
        if($creator == $userID || $owner == $userID || $admin==1) {
            
            echo("1&".$postID);
        
        } else {
    
            echo(0);
        
        }
    
    } else if(isset($_REQUEST["commentID"])) {
        
        $commentID = $_REQUEST["commentID"];
        $_SESSION["commentID"] = $commentID;

        $SQL = "SELECT userID, postID FROM comment WHERE commentID=$commentID";
        $matrix = $db->getData($SQL);
        $creator = $matrix[0][0];
        $postID = $matrix[0][1];
        
        $SQL = "SELECT blogID FROM post WHERE postID=$postID";
        $matrix = $db->getData($SQL);

        $blogID = $matrix[0][0];

        $SQL = "SELECT userID FROM blog WHERE blogID=$blogID";
        $matrix = $db->getData($SQL);

        $owner = $matrix[0][0];
        
        $SQL = "SELECT admin FROM user WHERE userID=$userID";
        $matrix = $db->getData($SQL);
        $admin = $matrix[0][0];
        
        if($userID == $creator || $userID == $owner || $admin == 1) {
            
            echo("1&".$commentID);
        
        } else {
    
            echo(0);
        
        }
    }
    
?>