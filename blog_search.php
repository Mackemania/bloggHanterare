<?php
    //session_start();
    require_once("blog_menu.php");
    require_once("blog_db.php");
    $db = new DB();

    $permission = 0;

    if(isset($_SESSION["userID"])) {
        $userID = $_SESSION["userID"];
        $permission = 1;

    }

    if(isset($_SESSION["admin"])) {
        if($_SESSION["admin"] == 1) {

            $permission = 10;

        }
    }

    
    if (isset($_POST['searchWord'])) {

        $searchWord = $_POST['searchWord'];
        $selectBlogTitle = "SELECT blogID, blogDescription, blogTitle FROM blog WHERE permissionStatus<=$permission AND blogTitle LIKE '%".$searchWord."%'";
        $selectBlogDescription = "SELECT blogID, blogDescription, blogTitle FROM blog WHERE permissionStatus<=$permission AND blogDescription LIKE '%".$searchWord."%'";
        
        $matrix = $db->getData($selectBlogTitle);
        $blogIDs = array();
        
        for ($i=0;$i<count($matrix);$i++)
        {
            array_push($blogIDs, $matrix[$i][0]);
            echo "<div class='randomBlog'>
                    <h3 class='postH3'>
                        <a href='blog_blog.php?blogID=".$matrix[$i][0]."'>".$matrix[$i][2]."</a>
                    </h3><hr>
                    ".$matrix[$i][1]."                    
                </div>";
        }
        
        for($j = 0; $j<count($blogIDs); $j++) {
            $selectBlogDescription = $selectBlogDescription." AND blogID <>".$blogIDs[$j];
        }

        $matrix = $db->getData($selectBlogDescription);

        for ($i=0;$i<count($matrix);$i++)
        {
            echo "<div class='randomBlog'>
            <h3 class='postH3'>
                <a href='blog_blog.php?blogID=".$matrix[$i][0]."'>".$matrix[$i][2]."</a>
            </h3><hr>
            ".$matrix[$i][1]."                    
        </div>";
        }  
                
    }

    $permSQL = "SELECT level, blogID FROM permission WHERE userID=$userID";
    $matrix = $db->getData($permSQL);

    for($i = 0; $i<count($matrix); $i++){
        if(isset($matrix[$i][0])){
            $permissionLevel = $matrix[$i][0];

            if($permissionLevel>0) {

                $blogID = $matrix[$i][1];
                if (isset($_POST['searchWord'])) {

                    $searchWord = $_POST['searchWord'];
                    $selectBlogTitle = "SELECT blogID, blogDescription, blogTitle FROM blog WHERE permissionStatus<=$permissionLevel AND blogTitle LIKE '%".$searchWord."%'";
                    $selectBlogDescription = "SELECT blogID, blogDescription, blogTitle FROM blog WHERE permissionStatus<=$permissionLevel AND blogDescription LIKE '%".$searchWord."%'";
                    
                    $matrix = $db->getData($selectBlogTitle);

                    for ($i=0;$i<count($matrix);$i++)
                    {
                        echo "<a href='blog_blog.php?blogID=".$matrix[$i][0]."'> ".$matrix[$i][1]."</a>";
                    }        


                    $matrix = $db->getData($selectBlogDescription);
                    
                            for ($i=0;$i<count($matrix);$i++)
                            {
                                echo "<a href='blog_blog.php?blogID=".$matrix[$i][0]."'> ".$matrix[$i][2]."</a>";
                            }    
                        }
            }

        }
    }



    /*
    if(isset($_SESSION["userID"])) {

        $permission = 1;
    }

    if ($permissionLevel==2) {
        $permission = 2;
    }

    if ($permissionLevel==3) {
        $permission = 3;
    }

    if (isset($_POST['searchWord'])) {

        $searchWord = $_POST['searchWord'];
        $selectBlogTitle = "SELECT blogID, blogDescription, blogTitle FROM blog WHERE permissionStatus<=$permission AND blogTitle LIKE '%".$searchWord."%'";
        $selectBlogDescription = "SELECT blogID, blogDescription, blogTitle FROM blog WHERE permissionStatus<=$permission AND blogDescription LIKE '%".$searchWord."%'";

        //$selectUser = "SELECT userID, alias FROM user WHERE alias LIKE '%".$searchWord."%'";
        //$selectPostTitle = "SELECT * FROM blog WHERE postTitle LIKE '%".$searchWord."%'";


        /*$matrix = $db->getData($selectUser);


        for ($i=0;$i<count($matrix);$i++)
        {
          $alias=$matrix[$i][1];
          echo "<a href='blog_logout.php'>$alias</a>";
        }
        */



      /*
        }

        $matrix = $db->getData($selectBlogTitle);


        for ($i=0;$i<count($matrix);$i++){
          echo $matrix[$i][1]."<br/>";


        }
        */

    /*    $sql = "SELECT blogID, blogTitle FROM blog WHERE blogTitle='$blogSearch'";
        $matrix = $db->getData($sql);



            echo("<a href='blog_blog.php?blogID=".$matrix[$i][0]."'>".$matrix[$i][1]."</a><br/>");


    }
    */
?>
