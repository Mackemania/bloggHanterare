<?PHP
    //Hämtar alla ostidn för en specifik blogg från databasen
    
    session_start();
    $blogID = $_SESSION["blogID"];

    require_once("blog_db.php");
    $db=new DB();

    $postIDs = "§";
    $postIDsDates = "§";
    $postTitles = "§";
    $postSource = "§";

    $SQL = "SELECT postID, postTitle, source FROM post WHERE blogID=$blogID ORDER BY postID DESC";
    $matrix = $db->getData($SQL);

    for($i = 0; $i<count($matrix); $i++) {

        $oldID = $matrix[$i][0];
        $newID = $matrix[$i][0];
        
        $SQL = "SELECT newID FROM postversion WHERE oldID = ".$matrix[$i][0]."";
        //echo($SQL);
        $newIDCheck = $db->getData($SQL);
        if(!isset($newIDCheck[0][0]))
        {

            $SQL = "SELECT oldID FROM postversion WHERE newID = $newID";
            //echo($SQL);
            $oldIDMatrixCheck = $db->getData($SQL);
            //echo($oldIDMatrixCheck[0][0]);
            if(isset($oldIDMatrixCheck[0][0]))
            {
                $counter = 0;
                while($counter<2)
                {
                    $SQL = "SELECT oldID FROM postversion WHERE newID = $newID";
                    
                    $oldIDMatrix = $db->getData($SQL);
                    if(isset($oldIDMatrix[0][0]))
                    {
                        $newID = $oldIDMatrix[0][0];
                        $counter = 0;
                    }
                    $counter++;
                }
            }
            $finalIDDate = $newID;
        }
        else
        {
            $finalIDDate = null;
            $oldID = null;
        }
        if(isset($oldID))
        {
            $postIDs = $postIDs."&".$oldID;
            $postIDsDates = $postIDsDates."&".$finalIDDate;
        }
    }
    $postFirstIDsArray = explode("&", $postIDsDates);
    $postCurrentIDsArray = explode("&", $postIDs);
    
    
    $temp="";
    for($j = 0; $j<count($postFirstIDsArray); $j++) {
        for($k = 0; $k<(count($postFirstIDsArray)-($j+1)); $k++) {
            
            if($postFirstIDsArray[$k]<$postFirstIDsArray[$k+1]) {

                $temp = $postFirstIDsArray[$k+1];
                $postFirstIDsArray[$k+1] = $postFirstIDsArray[$k];
                $postFirstIDsArray[$k] = $temp;
                
                $temp = $postCurrentIDsArray[$k+1];
                $postCurrentIDsArray[$k+1] = $postCurrentIDsArray[$k];
                $postCurrentIDsArray[$k] = $temp;
                
                               
            }
           
        } 
    }
    
    $postIDs = "§";
    $postTitles = "§";
    $postSource = "§";

    for($i = 1; $i<count($postCurrentIDsArray); $i++)
    {
        //echo($postCurrentIDsArray[$i]."\n");
        $SQL = "SELECT postID, postTitle, source FROM post WHERE postID=".$postCurrentIDsArray[$i]."";
        //echo($SQL);
        $matrix = $db->getData($SQL);
        $postIDs = $postIDs."&".$matrix[0][0];
        $postTitles = $postTitles."&".$matrix[0][1];
        $postSource = $postSource."&".$matrix[0][2];
    }


    $data = $postIDs.$postTitles.$postSource;
    echo($data);

?>
