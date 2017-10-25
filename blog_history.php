<?PHP
    //Sida för att visa historik
?>
<html>
	<head>

		<title>Startsida | Bloog</title>

	</head>
	<body>
        <?PHP
            require_once("blog_menu.php");

            if(isset($_REQUEST["postID"])) {
                $postID = $_REQUEST["postID"];

                if(isset($_SESSION["userID"])) {
                    $userID = $_SESSION["userID"];
                    $permission = 1;
                    
                    if($_SESSION["admin"] == 1) {
                        $permission = 10;
                    }
                
                } else{
                    $userID = 0;
                    $permission = 0;
                
                }

                require_once("blog_db.php");
                $db = new DB();
                
                $SQL = "SELECT blogID FROM post WHERE postID=$postID";
                $matrix = $db->getData($SQL);

                if(count($matrix) == 1) {
                
                    $blogID = $matrix[0][0];
                    
                    $SQL = "SELECT userID, permissionStatus FROM blog WHERE blogID=$blogID";
                    $matrix= $db->getData($SQL);

                    if(count($matrix)==1) {

                        $blogOwner = $matrix[0][0];
                        $permissionStatus =  $matrix[0][1];


                        if($userID == $blogOwner) {

                            $permission = 3;
                        } else {
                            if($permissionStatus>1) {
                                
                                $SQL = "SELECT level FROM permission WHERE userID=$userID AND blogID = $blogID";
                                $matrix = $db->getData($SQL);

                                if(count($matrix) == 1) {

                                    $level = $matrix[0][0];
                                
                                }

                                if($level>=1) {
                                    $permission = 2;
                                }

                            }
                        }   

                    }

                    if($permission>=$permissionStatus) {

                        $newID = $postID;
                        $IDArray= array();
                        array_push($IDArray, $postID);
                        $oldIDs = true;
                        while($oldIDs) {
                            
                            $SQL = "SELECT oldID FROM postversion WHERE newID = $newID";
                            $matrix = $db->getData($SQL);

                                if(isset($matrix[0][0])) {
                                    $newID = $matrix[0][0];
                                    array_push($IDArray, $newID);
                                } else {
                                    $oldIDs = false;
                                }
                            

                        }


                        for($i = 0; $i<count($IDArray); $i++) {
                            $ID = $IDArray[$i];
                            $SQL = "SELECT source FROM post WHERE postID=$ID";
                            $matrix = $db->getData($SQL);

                            $src = $matrix[0][0];

                            $SQL = "SELECT userID, createDate, postID, postTitle FROM post WHERE source='$src'";
                            $matrix = $db->getData($SQL);

                            $userID = $matrix[0][0];
                            $createDate = $matrix[0][1];
                            $postID = $matrix[0][2];
                            $postTitle = $matrix[0][3];
                            //echo($postID."\n");

                            $SQL = "SELECT alias FROM user WHERE userID=$userID";
                            $temp = $db->getData($SQL);
                            $alias = $temp[0][0];

                            $postFile = fopen($src, "r");
                            $post = fread($postFile, filesize($src));
                            fclose($postFile);
                            
                            $post = str_replace("\\r\\n", "</br>", $post);
                            
                            echo("<div id='blogContent'>
                                <div id='postTexts'> 
                                    <div id='$postID' class='post'>
                                        <h3 class='postH3'>$postTitle</h3>
                                        <hr>
                                        $post
                                        <div class='CRAHr'>
                                            <hr>
                                        </div>
                                        <span class='commentName'>
                                        $alias</br>
                                        $createDate
                                        </span>
                                    </div>
                                </div>
                            </div>");

                        }

                        
                    }
                    

                } else {

                }


                

            
            } else {
                echo("Du har inte gått in på sidan från ett inlägg!");
            }

        ?>

        <div id="container">
            <div id="postTexts">
            </div>
		</div>
	</body>

</html>
