<?PHP
    //Hämtar alla commentidn för en specifik blogg från databasen
    
    session_start();
    $postID = $_SESSION["postID"];
    
    require_once("blog_db.php");
    $db=new DB();

    $commentIDs = "§";
    $commentSource = "§";
    $dates = "§";
    $users="§";
    $commentIDsDates = "§";

    $SQL = "SELECT commentID FROM comment WHERE postID=$postID ORDER BY commentID ASC";
    $matrix = $db->getData($SQL);

    for($i = 0; $i<count($matrix); $i++) {

        $oldID = $matrix[$i][0];
        $newID = $matrix[$i][0];
        
        $SQL = "SELECT newID FROM commentversion WHERE oldID = ".$matrix[$i][0]."";
        //echo($SQL);
        $newIDCheck = $db->getData($SQL);
        if(!isset($newIDCheck[0][0]))
        {

            $SQL = "SELECT oldID FROM commentversion WHERE newID = $newID";
            //echo($SQL);
            $oldIDMatrixCheck = $db->getData($SQL);
            //echo($oldIDMatrixCheck[0][0]);
            if(isset($oldIDMatrixCheck[0][0]))
            {
                $counter = 0;
                while($counter<2)
                {
                    $SQL = "SELECT oldID FROM commentversion WHERE newID = $newID";
                    
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
            $commentIDs = $commentIDs."&".$oldID;
            $commentIDsDates = $commentIDsDates."&".$finalIDDate;
        }
    }
    $commentFirstIDsArray = explode("&", $commentIDsDates);
    $commentCurrentIDsArray = explode("&", $commentIDs);
    
    
    $temp="";
    for($j = 0; $j<count($commentFirstIDsArray); $j++) {
        for($k = 0; $k<(count($commentFirstIDsArray)-($j+1)); $k++) {
            
            if($commentFirstIDsArray[$k]>$commentFirstIDsArray[$k+1]) {

                $temp = $commentFirstIDsArray[$k+1];
                $commentFirstIDsArray[$k+1] = $commentFirstIDsArray[$k];
                $commentFirstIDsArray[$k] = $temp;
                
                $temp = $commentCurrentIDsArray[$k+1];
                $commentCurrentIDsArray[$k+1] = $commentCurrentIDsArray[$k];
                $commentCurrentIDsArray[$k] = $temp;
                
                               
            }
           
        } 
    }
    
    $commentIDs = "§";
    $commentSource = "§";
    $dates = "§";
    $users="§";

    for($i = 0; $i<count($commentCurrentIDsArray)-1; $i++) {
        
        $SQL = "SELECT source, createDate, userID FROM comment WHERE commentID=".$commentCurrentIDsArray[$i];
        $matrix = $db->getData($SQL);

        $commentIDs = $commentIDs."&".$commentCurrentIDsArray[$i];
        $commentSource = $commentSource."&".$matrix[0][0];
        $dates = $dates."&".$matrix[0][1];
        
        $SQL = "SELECT alias FROM user WHERE userID=".$matrix[0][2];
        $mat = $db->getData($SQL);
        
        $users = $users."&".$mat[0][0];
    }

    $data = $commentIDs.$commentSource.$dates.$users;

    echo($data);


?>