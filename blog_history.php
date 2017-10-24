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
                
                $SQL = "SELECT blogID FROM post WHERE postID=$postID";
                $matrix = $db->getData($SQL);

                if(count($matrix) == 1) {
                
                    $blogID = $matrix[0][0];
                    
                    $SQL = "SELECT userID, permissionStatus FROM blog WHERE blogID=$blogID";
                    $matrix= $db->getData($SQL);

                    if(count($matrix)==1) {

                        $blogOwner = $matrix[0][0];
                        $permissionStatus =  $matrix[0][1];

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

                    if($permission>=$permissionStatus) {

                        $newID = $postID;
                        $IDArray= array();
                        array_push($IDArray, $postID);
                        $oldIDs = true;
                        while($oldIDs) {
                            
                            $SQL = "SELECT oldID FROM postversion WHERE newID = $newID";
                            $matrix = $db->getData($SQL);

                            $newID = $matrix[0][0];
                            if(isset($newID)) {
                                array_push($IDArray, $newID);
                            } else {
                                $oldIDs = false;
                            }

                        }

                        for($i = 0, $i<count($oldIDs); $i++) {
                            $oldID = $oldIDs[$i];
                            $SQL = "SELECT source FROM post WHERE postID=$oldID";

                        }
                    }
                    

                } else {

                }


                

            
            } else {
                echo("Du har inte gått in på sidan från ett inlägg!");
            }

        ?>

        <div id="container">
		</div>
	</body>

</html>
