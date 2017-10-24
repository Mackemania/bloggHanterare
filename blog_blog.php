<?PHP

    require_once("blog_db.php");
    $db = new DB();

    $blogID = $_REQUEST["blogID"];
    $SQL = "SELECT blogTitle, userID FROM blog WHERE blogID=$blogID";
    //echo($SQL);
    $matrix = $db->getData($SQL);
    
    $name = $matrix[0][0];
    $owner = $matrix[0][1];

?>
<html>
	<head>
        <?PHP

            echo("<title>$name | Bloog</title");

        ?>
    </head>
	<body onload="javascript: blog_getPostIDsFromDB();">
        <div id="container">
            <div id="blogContent">
                <?PHP
                    require_once("blog_menu.php");
                    $_SESSION["blogID"] = $blogID;
                    
                    if(isset($_SESSION["userID"])) {

                        $userID = $_SESSION["userID"];

                        if($userID != $owner) {
                            $SQL = "SELECT level FROM permission WHERE userID=$userID AND blogID=$blogID";
                            //echo($SQL);
                            $matrix = $db->getData($SQL);

                            if(!isset($matrix[0][0])) {
                                $accessLevel = 0;
                            } else {
                                
                            $accessLevel = $matrix[0][0];
                            
                            }
                        } else {
                            $accessLevel = 10;
                        }
                    
                    } else {
                        
                        $accessLevel=0;
                    
                    }

                    if($accessLevel>=2) {
                    
                        require_once("blog_postMaker.php");
                    
                    } else if($accessLevel>=1) {
                        
                    }

                    echo("<h2>$name</h2></br>");

                ?>

                <div id="postTexts">
                </div>
            </div>
        </div>

        <div id ="editPost" class="modal editPost form">
            <div id="modalContent" class="postModalContent">
                <div id="closeDiv">
                    <span onclick="document.getElementById('editPost').style.display='none'" class="postClose" title="Stäng">&times;</span>
                </div>
                
                <div id="postContent">
                </div></br>
                <?PHP echo "<form method='post' action='blog_editPost.php'>";?>
                    <h3>Redigera inlägg</h3>
                    Inläggets titel:</br>
                    <input type="text" id="editPostTitle" name="editPostTitle" class="formTest" required="required"/>
                    </br></br>

                    Inlägget:</br>
                    <textarea id="editPostText" name="editPostText" class="textarea" rows="5" cols="40"></textarea>
                    </br></br>
                    <input type="submit" id="editPostButton" name="editPostButton" class="formButton" value="Redigera inlägg"/>
                </form>
                
            </div>
        </div>

        <div id ="comment" class="modal comment form">
            <div id="modalContent" class="postModalContent">
                <div id="closeDiv">
                    <span onclick="document.getElementById('comment').style.display='none'" class="postClose" title="Stäng">&times;</span>
                </div>

                <div id="commentContent">
                    </div>
                    </br>
                    
                    <div id="comments">

                </div></br>
                    
                <form method="post" action="blog_commentCreator.php">
                    
                    Kommentera:</br>
                    <textarea id="commentArea" name="commentArea" class="textarea" rows="5" cols="40"  placeholder="Kommentar" autocomplete="off" required="required"></textarea>

                    <input type="submit" class="formButton" value="Kommentera"/>
                </form>
                
            </div>
        </div>
        
        <div id ="editComment" class="modal editComment form">
            <div id="modalContent" class="postModalContent">
                <div id="closeDiv">
                    <span onclick="document.getElementById('editComment').style.display='none'" class="postClose" title="Stäng">&times;</span>
                </div>
                
                <div id="editCommentContent">
                </div></br>
                <form method="post" action="blog_editComment.php">
                    <h3>Redigera kommentar</h3>

                    Kommentar:</br>
                    <textarea id="editCommentText" name="editCommentText" class="textarea" rows="5" cols="40"></textarea>
                    </br></br>
                    
                    <input type="submit" id="editCommentButton" name="editCommentButton" class="formButton" value="Redigera kommentar"/>
                </form>
            </div>
        </div>

        <div id ="flagPost" class="modal flagPost form">
            <div id="modalContent" class="postModalContent">
                <div id="closeDiv">
                    <span onclick="document.getElementById('flagPost').style.display='none'" class="postClose" title="Stäng">&times;</span>
                </div>
                
                <div id="flagContent">
                </div><br />
                <?PHP echo "<form method='post' action='blog_flagReport.php'>";?>
                    <h3>Rapportera inlägg</h3><br /><br />
                    <select id="flagPost" name "flagPost" class="formText"  required="required">

                       <option value=''>Välj en...</option>
                       <option value='1'>Spam</option>
                       <option value='2'>Förtal</option>
                       <option value='3'>Pornografi</option>
                       <option value='4'>Anstötligt uppförande</option>

                    </select><br /><br />

                    Övrig andledning:</br>
                    <textarea id="flagPostText" name="flagPostText" class="textarea" rows="5" cols="40"></textarea>
                    </br></br>
                    <input type="submit" id="flagPostButton" name="flagPostButton" class="formButton" value="Rapportera problem"/>
                </form>
            </div>
        </div>
        <div id ="flagComment" class="modal flagComment form">
            <div id="modalContent" class="postModalContent">
                <div id="closeDiv">
                    <span onclick="document.getElementById('flagComment').style.display='none'" class="postClose" title="Stäng">&times;</span>
                </div>
                
                <div id="flagContent">
                </div><br />
                <?PHP echo "<form method='post' action='blog_flagReport.php'>";?>
                    <h3>Rapportera kommentar</h3><br /><br />
                    <select id="flagComment" name "flagComment" class="formText"  required="required">

                    <option value=''>Välj en...</option>
                    <option value='1'>Spam</option>
                    <option value='2'>Förtal</option>
                    <option value='3'>Pornografi</option>
                    <option value='4'>Anstötligt uppförande</option>

                    </select><br /><br />

                    Övrig andledning:</br>
                    <textarea id="flagCommentText" name="flagCommentText" class="textarea" rows="5" cols="40"></textarea>
                    </br></br>
                    <input type="submit" id="flagCommentButton" name="flagCommentButton" class="formButton" value="Rapportera problem"/>
                </form>
            </div>
        </div>
    </body>

</html>
