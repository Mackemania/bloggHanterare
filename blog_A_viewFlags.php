<div id="adminTools" class="adminTools">
    <?PHP
        session_start();
        if($_SESSION["admin"]==1) 
        {
            require_once("blog_db.php");

            $db = new DB();

            $SQL = "SELECT reportID, reportDate, reason, userID, blogID, commentID, postID FROM flag WHERE checked<>1 ORDER BY reportDate ASC";
            $matrix = $db->getData($SQL);

            

            echo "<form action='blog_A_checkFlags.php' method='post'>";

            for($i = 0; $i<count($matrix); $i++) 
            {

                if(isset($matrix[$i][3])) {
                    $userID = $matrix[$i][3];
                    $SQL = "SELECT alias FROM user WHERE userID=$userID";
                    $temp = $db->getData($SQL);
                    $alias = $temp[0][0];
                
                } else {
                    $userID = 0;
                    $SQL = "SELECT alias FROM user WHERE userID=$userID";
                    $temp = $db->getData($SQL);
                    $alias = $temp[0][0];
                }
                echo "Flagid: [".$matrix[$i][0]."]<br />";
                if($matrix[$i][3]!=null)
                {
                    echo "Användare: ".$alias.".<br />";
                }
                if($matrix[$i][4]!=null)
                {
                    echo "BlogID: ".$matrix[$i][4].".<br />";
                    $blogID=$matrix[$i][4];
                }
                if($matrix[$i][6]!=null)
                {
                    echo "InläggID: ".$matrix[$i][6].".<br />";
                    $postID = $matrix[$i][6];
                }
                if($matrix[$i][5]!=null)
                {
                    echo "KommentarID: ".$matrix[$i][5].".<br />";
                    $commentID = $matrix[$i][5];
                    $SQL = "SELECT postID FROM comment WHERE commentID=$commentID";
                    $temp = $db->getData($SQL);

                    $postID = $temp[0][0];
                }
                echo "Datum: ".$matrix[$i][1].".<br />";
                echo "andledning: ".$matrix[$i][2].".<br />
                <a href='blog_blog.php?blogID=$blogID#$postID'>Länk till inlägget</a>
                <input type='checkbox' name='reportID[]' value='".$matrix[$i][0]."'><br /><br />";
            }

            echo "<input type='submit' value='Checka' class='button'>";
        }
    ?>
</div>
