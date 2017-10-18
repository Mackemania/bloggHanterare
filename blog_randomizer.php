<?php

    require_once("blog_db.php");
    $db = new DB();

    $permission = 0;

    if(isset($_SESSION["userID"])) {

        $permission = 1;

    }

    if(isset($_SESSION["admin"])) {
        if($_SESSION["admin"] == 1) {

            $permission = 10;
        
        }
    }

    $blogGet = "SELECT blogID, blogTitle, blogDescription FROM blog WHERE permissionStatus<=$permission";

    $matrix = $db->getData($blogGet);


    for ($i=0;$i<count($matrix);$i++){
    $randomizer=$matrix[$i][1];
    }

    //$i = rand(0,count($matrix)-1);
    $i=0;
    shuffle($matrix);
    if(count($matrix)<6) {
        while ($i<count($matrix)) {
            echo ("<div class='randomBlog'>
                        <h3 class='postH3'>
                            <a href='blog_blog.php?blogID=".$matrix[$i][0]."'>".$matrix[$i][1]."</a>
                        </h3><hr>
                    ".$matrix[$i][2]."
                </div>");

            $i++;
        }
    } else {
        while ($i<6) {
            echo ("<div class='randomBlog'>
                        <h3 class='postH3'>
                            <a href='blog_blog.php?blogID=".$matrix[$i][0]."'>".$matrix[$i][1]."</a>
                        </h3><hr>
                    ".$matrix[$i][2]."
                </div>");
            $i++;
        }
    }

?>
